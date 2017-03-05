<?php

namespace Kaperys\Financial\Message\Schema;

use Kaperys\Financial\Message\Schema\Helpers\AnnotationNameFormatter;
use ReflectionClass;

class SchemaManager
{

    use AnnotationNameFormatter;

    protected $setFields = [];

    protected $schema;

    private $reflectedSchema;

    public function __construct(MessageSchemaInterface $schemaClass)
    {
        $this->schema = $schemaClass;
        $this->reflectedSchema = new ReflectionClass($this->schema);
    }

    public function __call($method, $arguments)
    {
        if ('set' == $this->getMethodFunction($method)) {
            $this->setFields[] = $this->formatSetterName($method);
        }

        return $this->reflectedSchema->getMethod($method)->invokeArgs($this->schema, $arguments);
    }

    public function getSetFields(): array
    {
        return $this->setFields;
    }
}