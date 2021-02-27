<?php

namespace Adiq\Endpoints;

use Adiq\Client;
use Adiq\Routes;
use Adiq\Endpoints\Endpoint;

class Marketplace extends Endpoint
{
    /**
     * @param array $payload
     *
     * @return \ArrayObject
     */
    public function unlock(array $payload)
    {
        return $this->client->request(
            self::GET,
            Routes::marketplace()->unlock($payload['id']),
            ['json' => $payload],
            [
                'Content-Type' => "application/json",
                'Authorization' => 
                    $this->client->getTokenType() . 
                    ' ' . 
                    $this->client->getAccessToken()
            ]
        );
    }
    /**
     * @param array $payload
     *
     * @return \ArrayObject
     */
    public function update(array $payload)
    {
        return $this->client->request(
            self::PUT,
            Routes::marketplace()->unlock($payload['id']),
            ['json' => $payload],
            [
                'Content-Type' => "application/json",
                'Authorization' => 
                    $this->client->getTokenType() . 
                    ' ' . 
                    $this->client->getAccessToken()
            ]
        );
    }
}

