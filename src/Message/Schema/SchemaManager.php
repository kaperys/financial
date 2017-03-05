<?php

namespace Kaperys\Financial\Message\Schema;

use Kaperys\Financial\Message\Schema\Helpers\AnnotationNameFormatter;

abstract class AbstractSchema implements MessageSchemaInterface
{

    use AnnotationNameFormatter;

    protected $setFields = [];

    public function __call($method, $arguments)
    {
        $this->formatSetterName($method);
    }

    public function getSetFields(): array
    {
        return $this->setFields;
    }
}