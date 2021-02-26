<?php

namespace Adiq\Endpoints;

use Adiq\Client;
use Adiq\Routes;
use Adiq\Endpoints\Endpoint;

class Auth extends Endpoint
{

    /**
     * @param array $payload
     *
     * @return \ArrayObject
     */
    public function token(array $payload)
    {
        return $this->client->request(
            self::POST,
            Routes::auth()->token(),
            ['json' => $payload]
        );
    }
}

