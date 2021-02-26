<?php

namespace Delivery\Endpoints\Test;

use Delivery\Client;
use Delivery\Endpoints\Cards;
use Delivery\Test\Endpoints\DeliveryTestCase;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;

class CardsTest extends DeliveryTestCase
{
    public function cardMockProvider()
    {
        return [[[
            'ride' => new MockHandler([
                new Response(200, [], self::jsonMock('RideMock'))
            ])
        ]]];
    }

    /**
     * @dataProvider cardRide
     */
    public function testRide($mock)
    {
        $container = [];
        $client = self::buildClient($container, $mock['ride']);

        $response = $client->ride();
        
        $this->assertEquals(
            Cards::GET,
            self::getRequestMethod($container[0])
        );

        $response = $client->cards([
            'user_id' => '35',
            'token' => '2y10b3Zb8X03lI3qA0q3B170zuJDpQMOSJcykgrv2qK62OFsp3nIjYNee',
        ]);

        $query = self::getQueryString($container[1]);

        $this->assertContains('user_id=35', $query);
        $this->assertContains('token=2y10b3Zb8X03lI3qA0q3B170zuJDpQMOSJcykgrv2qK62OFsp3nIjYNee', $query);
        $this->assertEquals(
            json_decode('[]'),
            $response
        );
    }
}
