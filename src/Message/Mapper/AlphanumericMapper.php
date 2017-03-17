<?php

namespace Kaperys\Financial\Message\Mapper;

use DateTime;
use Kaperys\Financial\Container\PropertyAnnotationContainer;

/**
 * Class AlphanumericMapper
 *
 * @package Kaperys\Financial\Message\Mapper
 *
 * @author  Mike Kaperys <mike@kaperys.io>
 */
class AlphanumericMapper implements MapperInterface
{

    /** @var PropertyAnnotationContainer $propertyAnnotationContainer the property annotation data container */
    protected $propertyAnnotationContainer;

    /**
     * AlphanumericMapper constructor.
     *
     * @param PropertyAnnotationContainer $propertyAnnotationContainer the property annotation container
     */
    public function __construct(PropertyAnnotationContainer $propertyAnnotationContainer)
    {
        $this->propertyAnnotationContainer = $propertyAnnotationContainer;
    }

    /**
     * @inheritdoc
     */
    public function pack(string $data): string
    {
        $packedField = bin2hex($data);

        if (!$this->propertyAnnotationContainer->isFixedLength()) {
            $variableFieldHeaderLength = bin2hex(
                sprintf(
                    '%0' . $this->propertyAnnotationContainer->getLengthIndicator() . 'd',
                    strlen($packedField) / 2
                )
            );

            return $variableFieldHeaderLength . $packedField;
        }

        return $packedField;
    }

    /**
     * @inheritdoc
     */
    public function unpack(string $data)
    {
        $parsedData = hex2bin($data);

        if ('DateTime' == $this->propertyAnnotationContainer->getType()) {
            $parsedData = DateTime::createFromFormat($this->propertyAnnotationContainer->getFormat(), $parsedData);
        }

        return $parsedData;
    }
}
