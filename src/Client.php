<?php

namespace Adiq;

use Adiq\Endpoints\Auth;
use Adiq\Endpoints\Card;
use Adiq\Endpoints\Marketplace;
use Adiq\Endpoints\Payment;
use Adiq\RequestHandler;
use Adiq\Endpoints\Ride;
use Adiq\Endpoints\Store;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\ClientException as ClientException;
use Adiq\Exceptions\InvalidJsonException;

class Client
{
    /**
     * @var string
     */
    const VERSION_API = "v1/";
    const LATEST_VERSION_API = "v2/";
    const BASE_URI          = 'https://ecommerce.adiq.io/';
    const BASE_URI_SANDBOX  = 'https://ecommerce-hml.adiq.io/';

    /**
     * @var string header used to identify application's requests
     */
    const DELIVERY_USER_AGENT_HEADER = 'X-Adiq-User-Agent';

    /**
     * @var \GuzzleHttp\Client
     */
    private $http;

    /**
     * @var \Adiq\Endpoints\Payment
     */
    private $payment;

    /**
     * @var \Adiq\Endpoints\Card
     */
    private $card;

    /**
     * @var \Adiq\Endpoints\Card
     */
    private $marketplace;

    /**
     * @var \Adiq\Endpoints\Auth
     */
    private $auth;

    /**
     * @var string
     */
    private $accessToken;

    /**
     * @var string
     */
    private $tokenType;

    /**
     * @var string
     */
    private $expiresIn;

    /**
     * @var string
     */
    private $scope;

    /**
     * @var bool
     */
    private $sandbox = false;

    /**
     * @param string $apiKey
     * @param array|null $extras
     * @param boolean|false $test
     */
    public function __construct(array $extras = null, bool $sandbox = false)
    {
        if ($sandbox) {
            $base_url = self::BASE_URI_SANDBOX;
        } else {
            $base_url = self::BASE_URI;
        }

        $this->sandbox = $sandbox;

        $options = ['base_uri' => $base_url];

        if (!is_null($extras)) {
            $options = array_merge($options, $extras);
        }

        $userAgent = isset($options['headers']['User-Agent']) ?
            $options['headers']['User-Agent'] :
            '';
        $authorization = isset($extras['Authorization']) ?
            $extras['Authorization'] :
            '';

        $options['headers'] = $this->addUserAgentHeaders($userAgent, $authorization);

        $this->http = new HttpClient($options);

        $this->payment = new Payment($this);
        $this->card = new Card($this);
        $this->marketplace = new Marketplace($this);
        $this->auth = new Auth($this);
    }

    /**
     * Updates the current access token to be used.
     *
     * @param string $accessToken
     * @param string $tokenType
     * @param int $expiresIn
     * @param string $scope
     * @return void
     */
    public function setAccessToken($accessToken, $tokenType, $expiresIn, $scope)
    {
        $this->accessToken = $accessToken;
        $this->tokenType = $tokenType;
        $this->expiresIn = $expiresIn;
        $this->scope = $scope;
    }

    /**
     * @param string $method
     * @param string $uri
     * @param array $options
     *
     * @throws \Adiq\Exceptions\AdiqException
     * @return \ArrayObject
     *
     * @psalm-suppress InvalidNullableReturnType
     */
    public function request($method, $uri, $options = [], $header = [])
    {
        try {

            $userAgent = isset($header['headers']['User-Agent']) ?
                $header['headers']['User-Agent'] :
                '';
            if (isset($header) && !empty($header)) {
                if ($this->sandbox) {
                    $base_url = self::BASE_URI_SANDBOX;
                } else {
                    $base_url = self::BASE_URI;
                }

                $options = array_merge($options, ['base_uri' => $base_url]);

                $authorization = isset($header['Authorization']) ?
                    $header['Authorization'] :
                    '';

                $options['headers'] = $this->addUserAgentHeaders($userAgent, $authorization);

                $this->http = new HttpClient($options);
            }

            $response = $this->http->request(
                $method,
                $uri,
                $options
            );

            $body = ResponseHandler::success((string)$response->getBody());

            if (isset($body->accessToken) && !empty($body->accessToken)) {
                $this->setAccessToken($body->accessToken, $body->tokenType, $body->expiresIn, $body->scope);
            }

            return $body;
        } catch (InvalidJsonException $exception) {
            throw $exception;
        } catch (ClientException $exception) {
            ResponseHandler::failure($exception);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Build an user-agent string to be informed on requests
     *
     * @param string $customUserAgent
     *
     * @return string
     */
    private function buildUserAgent($customUserAgent = '')
    {
        return trim(sprintf(
            '%s PHP/%s',
            $customUserAgent,
            phpversion()
        ));
    }

    /**
     * Append new keys (the default and delivery) related to user-agent
     *
     * @param string $customUserAgent
     * @return array
     */
    private function addUserAgentHeaders($customUserAgent = '', $authorization = null)
    {
        return [
            'User-Agent' => $this->buildUserAgent($customUserAgent),
            'Content-Type' => "application/json",
            'Authorization' => $authorization,
            self::DELIVERY_USER_AGENT_HEADER => $this->buildUserAgent(
                $customUserAgent
            )
        ];
    }

    /**
     * @return \Adiq\Endpoints\Payment
     */
    public function payment()
    {
        return $this->payment;
    }

    /**
     * @return \Adiq\Endpoints\Card
     */
    public function card()
    {
        return $this->card;
    }

    /**
     * @return \Adiq\Endpoints\Marketplace
     */
    public function marketplace()
    {
        return $this->marketplace;
    }

    /**
     * @return \Adiq\Endpoints\Auth
     */
    public function auth()
    {
        return $this->auth;
    }

    /**
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @return string
     */
    public function getTokenType()
    {
        return $this->tokenType;
    }

    /**
     * @return string
     */
    public function getExpiresIn()
    {
        return $this->expiresIn;
    }

    /**
     * @return string
     */
    public function getScope()
    {
        return $this->scope;
    }
}
