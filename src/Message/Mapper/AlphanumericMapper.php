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
        $packed = bin2hex($data);

        if (!$this->propertyAnnotationContainer->isFixedLength()) {
            $lengthIndicator = $this->propertyAnnotationContainer->getLengthIndicator();

            $variableDataLength = (string) strlen($data);

            if (!($variableDataLength % 2)) {
                // Since we're using hex2bin, the $variableDataLength must be of even length
                $variableDataLength = '0' . $variableDataLength;
            }

            $packed = str_pad(hex2bin($variableDataLength), $lengthIndicator * 2, 0, STR_PAD_LEFT) . $packed;
        }

        return $packed;
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
