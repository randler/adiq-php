<?php

namespace Adiq;

use Adiq\Endpoints\Auth;
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
     * @param string $apiKey
     * @param array|null $extras
     * @param boolean|false $test
     */
    public function __construct($sandbox = false, array $extras = null)
    {
        if(empty($sandbox) || !$sandbox) {
            $base_url = self::BASE_URI_SANDBOX;
        } else {
            $base_url = self::BASE_URI;
        }

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
        $this->auth = new Auth($this);
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
    public function request($method, $uri, $options = [])
    {
        try {
            $response = $this->http->request(
                $method,
                $uri,
                $options
            );

            return ResponseHandler::success((string)$response->getBody());
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
}
