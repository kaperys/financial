<?php

namespace Kaperys\Financial\Message\Schema\Validator;

use DateTime;
use Kaperys\Financial\Container\PropertyAnnotationContainer;
use Kaperys\Financial\Message\Constants\Display;
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

            return true;
        }

        // @todo: Implement this validation

        if (Display::ALPHA == $propertyAnnotationContainer->getDisplay()) {
            // Regex, throw
        }

        if (Display::NUMERIC == $propertyAnnotationContainer->getDisplay()) {
            // Regex, throw
        }

        if (Display::SPECIAL == $propertyAnnotationContainer->getDisplay()) {
            // Regex, throw
        }

        if (Display::ALPHA_NUMERIC == $propertyAnnotationContainer->getDisplay()) {
            // Regex, throw
        }

        if (Display::ALPHA_SPECIAL == $propertyAnnotationContainer->getDisplay()) {
            // Regex, throw
        }

        if (Display::NUMERIC_SPECIAL == $propertyAnnotationContainer->getDisplay()) {
            // Regex, throw
        }

        if (Display::ALPHA_NUMERIC_SPECIAL == $propertyAnnotationContainer->getDisplay()) {
            // Regex, throw
        }

        if (Display::BINARY == $propertyAnnotationContainer->getDisplay()) {
            // Regex, throw
        }

        if (Display::TRACK_DATA == $propertyAnnotationContainer->getDisplay()) {
            // Regex, throw
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
        if ('DateTime' == $propertyAnnotationContainer->getType()) {
            return true;
        }

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
        if ('DateTime' == $propertyAnnotationContainer->getType()) {
            return true;
        }

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
