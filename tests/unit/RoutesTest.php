<?php

namespace Delivery\Test;

use Delivery\Routes;
use PHPUnit\Framework\TestCase;

class RoutesTest extends TestCase
{
    /**
     * @param mixed $subject
     */
    public function assertIsCallable($subject)
    {
        $type = gettype($subject);

        self::assertThat(
            is_callable($subject),
            self::isTrue(),
            "Failed asserting that subject of type $type can be called/invoked as a function/method."
        );
    }

    public function testRideRoute()
    {
        $routes = Routes::ride();

        $this->assertObjectHasAttribute('ride', $routes);
        $this->assertIsCallable($routes->base);
    }
}
