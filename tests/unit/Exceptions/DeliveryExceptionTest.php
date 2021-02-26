<?php

namespace Delivery\Test;

use Delivery\Exceptions\DeliveryException;
use PHPUnit\Framework\TestCase;

final class DeliveryExceptionTest extends TestCase
{
    /**
     * @test
     */
    public function buildExceptionMessage()
    {
        $exception = new DeliveryException(
            'InvalidType',
            'items',
            'value must be array'
        );
        $errorType = 'InvalidType';
        $parameter = 'items';
        $message = 'value must be array';

        $expectedMessage = sprintf(
            'ERROR TYPE: %s. PARAMETER: %s. MESSAGE: %s',
            $errorType,
            $parameter,
            $message
        );
        $this->assertEquals($expectedMessage, $exception->getMessage());
    }
}
