<?php

namespace Adiq;

use Adiq\Endpoints\Auth;
use Adiq\Endpoints\Payment;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\ClientException as ClientException;
use Adiq\Exceptions\InvalidJsonException;
use Exception;

class Key
{

    /**
     * @var string
     */
    private $client_id;

    /**
     * @var string
     */
    private $client_secret;

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
    public function getKeyBase64()
    {
        if(isset($this->client_id) && !empty($this->client_id) &&
            isset($this->client_secret) && !empty($this->client_secret) ) {
            return "Basic " . base64_encode($this->client_id . ':' . $this->client_secret);
        }
        throw new Exception('Chaves inválidas e/ou vazias.');
    }

    public function setClientId($client_id)
    {
        $this->client_id = $client_id;
    }

    public function getClientId($client_id)
    {
        return $this->client_id;
    }

    public function setClientSecret($client_secret)
    {
        $this->client_secret = $client_secret;
    }

    public function getClientSecret($client_secret)
    {
        return $this->client_secret;
    }
}
