<?php

namespace Kaperys\Financial\Cache;

use Kaperys\Financial\Cache\Exception\CacheConfigurationException;
use Kaperys\Financial\Message\Schema\MessageSchemaInterface;
use Kaperys\Financial\Cache\Exception\CacheFileNotFoundException;
use ReflectionClass;

/**
 *  Class CacheManager
 *
 * @package Kaperys\Financial\Cache
 *
 * @author  Mike Kaperys <mike@kaperys.io>
 */
class CacheManager
{

    // The message schema cache file name
    const CACHED_SCHEMA_FILE_NAME = 'schema.json';

    // The message annotations cache file name
    const CACHED_METHOD_MAP_FILE_NAME = 'annotations.php';

    /** @var array $config the cache manager default configuration */
    protected $config = [
        'cacheDirectory' => __DIR__ . '/../../cache/',
    ];

    /**
     * CacheManager constructor
     *
     * @param array $configuration the cache manager configuration
     */
    public function __construct($configuration = [])
    {
        $this->setConfiguration($configuration);
    }

    /**
     *  Generates the schema cache
     *
     * @param MessageSchemaInterface $schemaClass the class to generate schema for
     *
     * @return bool has the cache file been successfully generated?
     */
    public function generateSchemaCache(MessageSchemaInterface $schemaClass)
    {
        $reflectedSchema = new ReflectionClass($schemaClass);

        $propertyAnnotations = [];
        foreach ($reflectedSchema->getProperties() as $annotation) {
            $propertyAnnotations[] = $annotation->getDocComment();
        }

        var_dump($propertyAnnotations);
    }

    /**
     * Gets the message schema
     *
     * @param MessageSchemaInterface $schemaClass the schema cache
     *
     * @return CacheFile|false CacheFile, or false if not found
     *
     * @throws CacheFileNotFoundException if the cache file cannot be found
     */
    public function getSchemaCache(MessageSchemaInterface $schemaClass)
    {
        $cacheFilePath = $this->getConfiguration('cacheDirectory') .
            $schemaClass->getName() . self::CACHED_SCHEMA_FILE_NAME;

        if (file_exists($cacheFilePath) && is_readable($cacheFilePath)) {
            return new CacheFile($cacheFilePath);
        }

        throw new CacheFileNotFoundException('Cache file not found for ' . $schemaClass->getName());
    }

    /**
     * Sets the cache manager configuration
     *
     * @param $configuration array the cache manager configuration
     */
    protected function setConfiguration(array $configuration)
    {
        $this->config = array_merge($configuration, $this->config);
    }

    /**
     * Gets a configuration item
     *
     * @param string $key the configuration key
     *
     * @return mixed the configuration item
     *
     * @throws CacheConfigurationException if the configuration item cannot be found
     */
    protected function getConfiguration($key)
    {
        if (array_key_exists($key, $this->config)) {
            return $this->config[$key];
        }

        throw new CacheConfigurationException('Configuration key ' . $key . 'doesn\'t exist');
    }
}
