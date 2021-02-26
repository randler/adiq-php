<?php

namespace Adiq\Endpoints;

use Adiq\Client;
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
            Routes::card()->token(),
            ['json' => $payload]
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
            ['json' => $payload]
        );
    }
}

