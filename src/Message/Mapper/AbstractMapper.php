<?php

namespace Kaperys\Financial\Message\Mapper;

use Kaperys\Financial\Container\PropertyAnnotationContainer;
use Kaperys\Financial\Message\Mapper\Exception\MapperValidationException;
use Kaperys\Financial\Message\Schema\Validator\FieldValidator;

/**
 * Class AbstractMapper
 *
 * @package Kaperys\Financial\Message\Mapper
 *
 * @author  Mike Kaperys <mike@kapeyrs.io>
 */
abstract class AbstractMapper implements MapperInterface
{

    /** @var PropertyAnnotationContainer $propertyAnnotationContainer the property annotation data container */
    protected $propertyAnnotationContainer;

    /**
     * @inheritdoc
     */
    public function validate(array $arguments)
    {
        if (!(new FieldValidator())->validate($this->propertyAnnotationContainer, $arguments[0])) {
            throw new MapperValidationException(
                'Field validation failed for bit ' . $this->propertyAnnotationContainer->getBit()
            );
        }
    }
}
