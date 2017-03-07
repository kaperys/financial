<?php

namespace Kaperys\Financial\Message\Mapper;

use DateTime;
use Kaperys\Financial\Container\PropertyAnnotationContainer;
use Kaperys\Financial\Message\Mapper\Exception\MapperValidationException;

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
        // Check data types
        if ($this->propertyAnnotationContainer->getType() == 'DateTime') {
            if (!$arguments[0] instanceof DateTime) {
                throw new MapperValidationException(
                    'Field ' . $this->propertyAnnotationContainer->getBit() . ' should be an instance of DateTime'
                );
            }
        }

        // Check length
        if ($this->propertyAnnotationContainer->isFixedLength()) {
            if ($this->propertyAnnotationContainer->getLength() != strlen($arguments[0])) {
                throw new MapperValidationException(
                    'Field ' . $this->propertyAnnotationContainer->getBit() . ' should be length ' .
                    $this->propertyAnnotationContainer->getLength() . ', but ' . strlen($arguments[0]) . ' was found'
                );
            }
        } else {
            if (strlen($arguments[0]) > $this->propertyAnnotationContainer->getMaxLength() ||
                strlen($arguments[0]) < $this->propertyAnnotationContainer->getMinLength()) {
                throw new MapperValidationException(
                    'Field ' . $this->propertyAnnotationContainer->getBit() . ' should be between lengths ' .
                    $this->propertyAnnotationContainer->getMinLength() . ' and ' .
                    $this->propertyAnnotationContainer->getMinLength() . ', but ' . strlen($arguments[0]) . ' was found'
                );
            }
        }

        // Check length, type, etc etc
    }
}
