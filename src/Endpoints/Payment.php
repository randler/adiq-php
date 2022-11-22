<?php

namespace Adiq\Endpoints;

use Adiq\Routes;
use Adiq\Endpoints\Endpoint;

class Payment extends Endpoint
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
            Routes::payment()->create(),
            ['json' => $payload],
            [
                'Content-Type' => 'application/json',
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
    public function details(array $payload)
    {
        return $this->client->request(
            self::GET,
            Routes::payment()->details($payload['id'], $payload['date'] ?? null),
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
    public function cancel(array $payload)
    {
        return $this->client->request(
            self::PUT,
            Routes::payment()->cancel($payload['id']),
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
    public function capture(array $payload)
    {
        return $this->client->request(
            self::PUT,
            Routes::payment()->capture($payload['id']),
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
    public function validate(array $payload)
    {
        return $this->client->request(
            self::POST,
            Routes::payment()->validate(),
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
