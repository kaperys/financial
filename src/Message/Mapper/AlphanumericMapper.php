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
        // By this point we know the data is correct and valid, so just pack

        if ($this->propertyAnnotationContainer->isFixedLength()) {
            $length = $this->propertyAnnotationContainer->getLength();
        } else {
            $length = $this->propertyAnnotationContainer->getMaxLength();
        }

        return $data;
    }

    /**
     * @inheritdoc
     */
    public function unpack(string $data)
    {
        $parsedData = hex2bin($data);

//        if ('DateTime' == $this->propertyAnnotationContainer->getType()) {
//            $parsedData = DateTime::createFromFormat($this->propertyAnnotationContainer->getFormat(), $data);
//        }

        return $parsedData;
    }
}
