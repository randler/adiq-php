<?php

namespace Adiq\Endpoints;

use Adiq\Client;

abstract class Endpoint
{
    /**
     * @var string
     */
    const POST = 'POST';
    /**
     * @var string
     */
    const GET = 'GET';
    /**
     * @var string
     */
    const PUT = 'PUT';
    /**
     * @var string
     */
    const DELETE = 'DELETE';

    /**
     * @var \Adiq\Client
     */
    protected $client;

    /**
     * @param \Adiq\Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }
}
