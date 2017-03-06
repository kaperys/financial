<?php

namespace Kaperys\Financial\Cache;
use Illuminate\Support\Collection;
use Kaperys\Financial\Container\PropertyAnnotationContainer;

/**
 * Class CacheFile
 *
 * @package Kaperys\Financial\Cache
 *
 * @author  Mike Kaperys <mike@kaperys.io>
 */
class CacheFile
{

    /** @var Collection $schemaCache the cached file contents */
    protected $schemaCache;

    /**
     * CacheFile constructor.
     *
     * @param string $schemaCache the cached file contents
     */
    public function __construct($schemaCache)
    {
        $this->schemaCache = $this->parseSchemaData($schemaCache);
    }

    /**
     * Returns the schema data
     *
     * @return array
     */
    public function getSchemaData(): array
    {
        return $this->schemaCache;
    }

    /**
     * Gets the data for a bit
     *
     * @param int $bit
     *
     * @return PropertyAnnotationContainer
     */
    public function getDataForBit($bit)
    {
        return new PropertyAnnotationContainer($this->schemaCache->keyBy('bit')[$bit]);
    }

    /**
     * Gets the data for a property
     *
     * @param string $property
     *
     * @return PropertyAnnotationContainer
     */
    public function getDataForProperty($property)
    {
        return new PropertyAnnotationContainer($this->schemaCache->keyBy('property')[$property]);
    }

    /**
     * Parses the cache file data to an array
     *
     * @param string $schemaData the raw cache files contents
     *
     * @return Collection
     */
    protected function parseSchemaData(string $schemaData): Collection
    {
        return new Collection(json_decode($schemaData, true));
    }
}
