<?php

namespace Delivery\Test;

use Delivery\RequestHandler;
use PHPUnit\Framework\TestCase;

class RequestHandlerTest extends TestCase
{
    public function testBindApiKey()
    {
        $this->assertEquals(
            ['query' => ['api_key' => 'katiau']],
            RequestHandler::bindApiKeyToQueryString([], 'katiau')
        );
    }
}
