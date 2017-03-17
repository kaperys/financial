<?php

namespace Kaperys\Financial\Tests\Message\Schema;

use Kaperys\Financial\Message\Schema\Exception\MessageTypeIndicator\ClassNotFoundException;
use Kaperys\Financial\Message\Schema\Exception\MessageTypeIndicator\CommunicatorNotFoundException;
use Kaperys\Financial\Message\Schema\MessageTypeIndicator;
use PHPUnit\Framework\TestCase;

/**
 * Class MessageTypeIndicatorTest
 *
 * @package Kaperys\Financial\Tests\Message\Schema
 *
 * @author  Mike Kaperys <mike@kaperys.io>
 */
class MessageTypeIndicatorTest extends TestCase
{

    /** @test */
    public function getVersion()
    {
        $this->assertEquals(
            MessageTypeIndicator::MTI_VERSION_MAP[0],
            (new MessageTypeIndicator('0420'))->getVersion()
        );
    }

    /** @test */
    public function getClass()
    {
        $this->assertEquals(
            MessageTypeIndicator::MTI_CLASS_MAP[4],
            (new MessageTypeIndicator('0420'))->getClass()
        );
    }

    /** @test */
    public function getFunction()
    {
        $this->assertEquals(
            MessageTypeIndicator::MTI_FUNCTION_MAP[2],
            (new MessageTypeIndicator('0420'))->getFunction()
        );
    }

    /** @test */
    public function getCommunicator()
    {
        $this->assertEquals(
            MessageTypeIndicator::MTI_COMMUNICATOR_MAP[0],
            (new MessageTypeIndicator('0420'))->getCommunicator()
        );
    }

    /** @test */
    public function getClassException()
    {
        $this->expectException(ClassNotFoundException::class);

        (new MessageTypeIndicator('9099'))->getClass();
    }

    /** @test */
    public function getCommunicatorException()
    {
        $this->expectException(CommunicatorNotFoundException::class);

        (new MessageTypeIndicator('9099'))->getCommunicator();
    }

    /** @test */
    public function toString()
    {
        $result = (string) (new MessageTypeIndicator('0420'));

        $this->assertEquals('0420', $result);
    }
}
