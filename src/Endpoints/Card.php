<?php

namespace Adiq\Endpoints;

use Adiq\Routes;
use Adiq\Endpoints\Endpoint;

class Card extends Endpoint
{

    /**
     * @param array $payload
     *
     * @return \ArrayObject
     */
    public function create(array $payload)
    {
        return $this->client->request(
            self::POST,
            Routes::card()->tokens(),
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
    public function vaults(array $payload)
    {
        return $this->client->request(
            self::POST,
            Routes::card()->vaults(),
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

