<?php

namespace Adiq\Endpoints;

use Adiq\Client;
use Adiq\Routes;
use Adiq\Endpoints\Endpoint;

class Payment extends Endpoint
{

    /**
     * @param array $payload
     *
     * @return \ArrayObject
     */
    public function request(array $payload)
    {
        return $this->client->request(
            self::POST,
            Routes::payment()->request(),
            ['json' => $payload]
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
            Routes::payment()->details($payload['id']),
            ['json' => $payload]
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
            ['json' => $payload]
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
            ['json' => $payload]
        );
    }
}

