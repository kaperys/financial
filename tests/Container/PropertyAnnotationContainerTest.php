<?php

namespace Kaperys\Financial\Tests\Container;

use Kaperys\Financial\Container\PropertyAnnotationContainer;
use Kaperys\Financial\Message\Mapper\AlphanumericMapper;
use Kaperys\Financial\Message\Mapper\BinaryMapper;
use Kaperys\Financial\Message\Mapper\Exception\MapperNotFoundException;
use PHPUnit\Framework\TestCase;

/**
 * Class PropertyAnnotationContainerTest
 *
 * @package Kaperys\Financial\Tests\Container
 *
 * @author Mike Kaperys <mike@kaperys.io>
 */
class PropertyAnnotationContainerTest extends TestCase
{

    /** @test */
    public function getType()
    {
        $this->assertEquals('DateTime', $this->construct(['var' => 'DateTime'])->getType());
    }

    /** @test */
    public function getBit()
    {
        $this->assertEquals(2, $this->construct(['bit' => 2])->getBit());
    }

    /** @test */
    public function getDisplay()
    {
        $this->assertEquals('n', $this->construct(['display' => 'n'])->getDisplay());
    }

    /** @test */
    public function getLength()
    {
        $this->assertEquals(19, $this->construct(['length' => 19])->getLength());
    }

    /** @test */
    public function getMinLength()
    {
        $this->assertEquals(15, $this->construct(['minlength' => 15])->getMinLength());
    }

    /** @test */
    public function getMaxLength()
    {
        $this->assertEquals(19, $this->construct(['maxlength' => 19])->getMaxLength());
    }

    /** @test */
    public function getLengthIndicator()
    {
        $this->assertEquals(2, $this->construct(['lengthindicator' => 2])->getLengthIndicator());
    }

    /** @test */
    public function getDescription()
    {
        $this->assertEquals(
            'Primary account number (PAN)',
            $this->construct(['description' => 'Primary account number (PAN)'])->getDescription()
        );
    }

    /** @test */
    public function getFormat()
    {
        $this->assertEquals('His', $this->construct(['format' => 'His'])->getFormat());
    }

    /** @test */
    public function getProperty()
    {
        $this->assertEquals('pan', $this->construct(['property' => 'pan'])->getProperty());
    }

    /** @test */
    public function getGetterName()
    {
        $this->assertEquals('getPan', $this->construct(['property' => 'pan'])->getGetterName());
    }

    /** @test */
    public function getSetterName()
    {
        $this->assertEquals('setPan', $this->construct(['property' => 'pan'])->getSetterName());
    }

    /** @test */
    public function isFixedLength()
    {
        $this->assertTrue($this->construct(['length' => 12])->isFixedLength());
    }

    /** @test */
    public function getMapper()
    {
        $this->assertInstanceOf(
            AlphanumericMapper::class,
            $this->construct(['display' => 'ans'])->getMapper()
        );

        $this->assertInstanceOf(
            BinaryMapper::class,
            $this->construct(['display' => 'b'])->getMapper()
        );

        $this->expectException(MapperNotFoundException::class);
        $this->construct(['display' => 'display-that-doesnt-exist'])->getMapper();
    }

    /**
     * @param array $testData the test data
     *
     * @return PropertyAnnotationContainer constructed test subject
     */
    private function construct($testData)
    {
        return new PropertyAnnotationContainer($testData);
    }
}
