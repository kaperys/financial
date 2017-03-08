<?php

namespace Kaperys\Financial\Message\Mapper;

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
            // Fixed length..
            $this->propertyAnnotationContainer->getLength();
        } else {
            // Variable length
            $this->propertyAnnotationContainer->getMaxLength();
        }

        return $data;
    }

    /**
     * @inheritdoc
     */
    public function unpack(string $data): string
    {
        // TODO: Implement unpack() method.
    }
}
