<?php

namespace Kaperys\Financial\Cache;

/**
 * Class CacheFile
 *
 * @package Kaperys\Financial\Cache
 *
 * @author  Mike Kaperys <mike@kaperys.io>
 */
class CacheFile
{

    /** @var array $schemaCache the cached file contents */
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
     * @return array
     */
    public function getDataForBit($bit)
    {

    }

    /**
     * Gets the data for a property
     *
     * @param string $property
     *
     * @return array
     */
    public function getDataForProperty($property)
    {

    }

    /**
     * Parses the cache file data to an array
     *
     * @param string $schemaData the raw cache files contents
     *
     * @return array
     */
    protected function parseSchemaData(string $schemaData): array
    {
        return [];
    }
}
