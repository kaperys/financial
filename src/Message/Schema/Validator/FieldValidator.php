<?php

namespace Kaperys\Financial\Message\Schema\Validator;

use DateTime;
use Kaperys\Financial\Container\PropertyAnnotationContainer;

/**
 * Class FieldValidator
 *
 * @package Kaperys\Financial\Message\Schema\Validator
 *
 * @author  Mike Kaperys <mike@kaperys.io>
 */
class FieldValidator
{

    /**
     * Validates the given data
     *
     * @param PropertyAnnotationContainer $propertyAnnotationContainer
     * @param mixed                       $data
     *
     * @return bool
     */
    public function validate(PropertyAnnotationContainer $propertyAnnotationContainer, $data): bool
    {
        return ($propertyAnnotationContainer->isFixedLength() ?
                $this->validateFixedLengthField($propertyAnnotationContainer, $data)
                : $this->validateVariableLengthField($propertyAnnotationContainer, $data))
            && $this->validateType($propertyAnnotationContainer, $data);
    }

    /**
     * Validates the data type
     *
     * @param PropertyAnnotationContainer $propertyAnnotationContainer
     * @param mixed                       $data
     *
     * @return bool
     */
    protected function validateType(PropertyAnnotationContainer $propertyAnnotationContainer, $data): bool
    {
        if ($propertyAnnotationContainer->getType() == 'DateTime') {
            return $data instanceof DateTime;
        }

        if ($propertyAnnotationContainer->getType() == 'string') {
            return ctype_alpha($data);
        }

        if ($propertyAnnotationContainer->getType() == 'int') {
            return ctype_digit($data);
        }

        return false;
    }

    /**
     * Validates a fixed-length field
     *
     * @param PropertyAnnotationContainer $propertyAnnotationContainer
     * @param mixed                       $data
     *
     * @return bool
     */
    protected function validateFixedLengthField(PropertyAnnotationContainer $propertyAnnotationContainer, $data): bool
    {
        return $propertyAnnotationContainer->getLength() == strlen($data);
    }

    /**
     * Validates a variable-length field
     *
     * @param PropertyAnnotationContainer $propertyAnnotationContainer
     * @param mixed                       $data
     *
     * @return bool
     */
    protected function validateVariableLengthField(
        PropertyAnnotationContainer $propertyAnnotationContainer,
        $data
    ): bool {
        return strlen($data) < $propertyAnnotationContainer->getMaxLength() &&
            strlen($data) > $propertyAnnotationContainer->getMinLength();
    }
}
