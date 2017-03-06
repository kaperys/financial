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
class AlphanumericMapper extends AbstractMapper
{

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

        return 'packed data - alnum mapper';
    }

    /**
     * @inheritdoc
     */
    public function unpack(string $data): string
    {
        // TODO: Implement unpack() method.
    }
}
