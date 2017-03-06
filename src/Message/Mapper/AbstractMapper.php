<?php

namespace Kaperys\Financial\Message\Mapper;

use Kaperys\Financial\Container\PropertyAnnotationContainer;
use Kaperys\Financial\Message\Mapper\Exception\MapperValidationException;

/**
 * Class AbstractMapper
 *
 * @package Kaperys\Financial\Message\Mapper
 *
 * @author Mike Kaperys <mike@kapeyrs.io>
 */
abstract class AbstractMapper implements MapperInterface
{

    /** @var PropertyAnnotationContainer $propertyAnnotationContainer the property annotation data container */
    protected $propertyAnnotationContainer;

    /**
     * @inheritdoc
     */
    public function validate(array $arguments): bool
    {
        return true;
//        if ($this->propertyAnnotationContainer->getDisplay() == 'n') {
//            throw new MapperValidationException('test');
//        }

        // Check length, type, etc etc
    }
}
