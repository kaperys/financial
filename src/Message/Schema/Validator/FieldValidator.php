<?php

namespace Kaperys\Financial\Message\Schema\Validator;

use DateTime;
use Kaperys\Financial\Container\PropertyAnnotationContainer;
use Kaperys\Financial\Message\Schema\Validator\Exception\FieldValidationException;

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
     *
     * @throws FieldValidationException if the validation criteria is not met
     */
    protected function validateType(PropertyAnnotationContainer $propertyAnnotationContainer, $data): bool
    {
        if ($propertyAnnotationContainer->getType() == 'DateTime') {
            if (!$data instanceof DateTime) {
                throw new FieldValidationException(
                    'Bit ' . $propertyAnnotationContainer->getBit() . ' should be an instance of DateTime'
                );
            }
        }

        /** @todo: Change ->getType() to ->getDisplay() and validate based on this type - https://en.wikipedia.org/wiki/ISO_8583#Data_elements */

        if ($propertyAnnotationContainer->getType() == 'string') {
            if (!ctype_alpha($data)) {
                throw new FieldValidationException(
                    'Bit ' . $propertyAnnotationContainer->getBit() . ' should be a string'
                );
            }
        }

        if ($propertyAnnotationContainer->getType() == 'int') {
            if (!ctype_digit($data)) {
                throw new FieldValidationException(
                    'Bit ' . $propertyAnnotationContainer->getBit() . ' should be an integer'
                );
            }
        }

        return true;
    }

    /**
     * Validates a fixed-length field
     *
     * @param PropertyAnnotationContainer $propertyAnnotationContainer
     * @param mixed                       $data
     *
     * @return bool
     *
     * @throws FieldValidationException if the validation criteria is not met
     */
    protected function validateFixedLengthField(PropertyAnnotationContainer $propertyAnnotationContainer, $data): bool
    {
        if ($propertyAnnotationContainer->getLength() != strlen($data)) {
            throw new FieldValidationException(
                'Bit ' . $propertyAnnotationContainer->getBit() . ' should be length ' .
                $propertyAnnotationContainer->getLength() . ', but length ' . strlen($data) . ' was found'
            );
        }

        return true;
    }

    /**
     * Validates a variable-length field
     *
     * @param PropertyAnnotationContainer $propertyAnnotationContainer
     * @param mixed                       $data
     *
     * @return bool
     *
     * @throws FieldValidationException if the validation criteria is not met
     */
    protected function validateVariableLengthField(
        PropertyAnnotationContainer $propertyAnnotationContainer,
        $data
    ): bool {
        if (strlen($data) > $propertyAnnotationContainer->getMaxLength() ||
            strlen($data) < $propertyAnnotationContainer->getMinLength()
        ) {
            throw new FieldValidationException(
                'Bit ' . $propertyAnnotationContainer->getBit() . ' should be between lengths ' .
                $propertyAnnotationContainer->getMinLength() . ' and ' . $propertyAnnotationContainer->getMaxLength() .
                ', but length ' . strlen($data) . ' was found'
            );
        }

        return true;
    }
}
