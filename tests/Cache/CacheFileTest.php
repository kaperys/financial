<?php

namespace Kaperys\Financial\Tests\Cache;

use Illuminate\Support\Collection;
use Kaperys\Financial\Cache\CacheFile;
use Kaperys\Financial\Container\PropertyAnnotationContainer;
use PHPUnit\Framework\TestCase;

/**
 * Class CacheFileTest
 *
 * @package Kaperys\Financial\Tests\Cache
 *
 * @author Mike Kaperys <mike@kaperys.io>
 */
class CacheFileTest extends TestCase
{

    /** @test */
    public function getSchemaData()
    {
        $schemaData = $this->construct()->getSchemaData();

        $parsedSchema = [
            'var'             => 'string',
            'bit'             => 2,
            'display'         => 'n',
            'minlength'       => 15,
            'maxlength'       => 19,
            'description'     => 'Primary account number (PAN)',
            'format'          => 'LLVAR',
            'property'        => 'pan',
        ];

        $this->assertInstanceOf(Collection::class, $schemaData);
        $this->assertEquals($parsedSchema, $schemaData->toArray()[0]);
    }

    /** @test */
    public function getDataForBit()
    {
        $schemaData = $this->construct()->getDataForBit(2);

        $parsedSchema = [
            'var'             => 'string',
            'bit'             => 2,
            'display'         => 'n',
            'minlength'       => 15,
            'maxlength'       => 19,
            'description'     => 'Primary account number (PAN)',
            'format'          => 'LLVAR',
            'property'        => 'pan',
        ];

        $this->assertInstanceOf(PropertyAnnotationContainer::class, $schemaData);
        $this->assertEquals($parsedSchema['description'], $schemaData->getDescription());
    }

    /** @test */
    public function getDataForProperty()
    {
        $schemaData = $this->construct()->getDataForProperty('pan');

        $parsedSchema = [
            'var'             => 'string',
            'bit'             => 2,
            'display'         => 'n',
            'minlength'       => 15,
            'maxlength'       => 19,
            'description'     => 'Primary account number (PAN)',
            'format'          => 'LLVAR',
            'property'        => 'pan',
        ];

        $this->assertInstanceOf(PropertyAnnotationContainer::class, $schemaData);
        $this->assertEquals($parsedSchema['description'], $schemaData->getDescription());
    }

    /**
     * @return CacheFile constructed test subject
     */
    private function construct()
    {
        $schemaData = file_get_contents(__DIR__ . '/../fixtures/schema.json');

        return new CacheFile($schemaData);
    }
}
