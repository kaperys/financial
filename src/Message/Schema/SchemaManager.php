<?php

namespace Kaperys\Financial\Message\Schema;

use Kaperys\Financial\Cache\CacheManager;
use Kaperys\Financial\Message\Schema\Helpers\AnnotationNameFormatter;
use ReflectionClass;

/**
 * Class SchemaManager
 *
 * @package Kaperys\Financial\Message\Schema
 *
 * @author  Mike Kaperys <mike@kaperys.io>
 */
class SchemaManager
{

    use AnnotationNameFormatter;

    /** @var array $setFields the set fields on $schema */
    protected $setFields = [];

    /** @var MessageSchemaInterface $schema the message schema */
    protected $schema;

    /** @var CacheManager $cacheManager the schema cache manager */
    protected $cacheManager;

    /**
     * SchemaManager constructor.
     *
     * @param MessageSchemaInterface $schemaClass  the message schema class
     * @param CacheManager           $cacheManager the schema cache manager
     */
    public function __construct(MessageSchemaInterface $schemaClass, CacheManager $cacheManager)
    {
        $this->schema       = $schemaClass;
        $this->cacheManager = $cacheManager;
    }

    /**
     * The method responsible for logging set fields calling the schema
     *
     * @param string $method    the method name
     * @param array  $arguments the method arguments
     *
     * @return mixed the schema method result
     */
    public function __call($method, $arguments)
    {
        if ('set' == $this->getMethodFunction($method)) {
            $propertyName = $this->formatSetterName($method);

            // @todo: Make an annotation data class which can validate the setter data
            $this->cacheManager->getSchemaCache($this->schema)->getDataForProperty($propertyName);

            $this->setFields[] = $propertyName;
        }

        $reflectedMessageSchemaClass = new ReflectionClass($this->schema);
        return $reflectedMessageSchemaClass->getMethod($method)->invokeArgs($this->schema, $arguments);
    }

    /**
     * Returns an array of the fields set on $this->schema
     *
     * @return array
     */
    public function getSetFields(): array
    {
        return $this->setFields;
    }
}
