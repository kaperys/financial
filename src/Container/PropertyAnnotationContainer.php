<?php

namespace Kaperys\Financial\Container;
use Kaperys\Financial\Message\Mapper\AlphanumericMapper;
use Kaperys\Financial\Message\Mapper\MapperInterface;
use Kaperys\Financial\Message\Schema\Helpers\AnnotationNameFormatter;

/**
 * Class PropertyAnnotationContainer
 *
 * @package Kaperys\Financial\Container
 *
 * @author  Mike Kaperys <mike@kaperys.io>
 */
class PropertyAnnotationContainer
{

    use AnnotationNameFormatter;

    /** @var array $data the property annotation data */
    protected $data;

    /**
     * PropertyAnnotationContainer constructor.
     *
     * @param array $data the property annotation data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Gets the property data type
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->data['var'];
    }

    /**
     * Gets the property bit index
     *
     * @return string
     */
    public function getBit(): string
    {
        return $this->data['bit'];
    }

    /**
     * Gets the property display (or type)
     *
     * @return string
     */
    public function getDisplay(): string
    {
        return $this->data['display'];
    }

    /**
     * Gets the property minimum length
     *
     * @return string
     */
    public function getMinLength(): string
    {
        return $this->data['minlength'];
    }

    /**
     * Gets the property maximum length
     *
     * @return string
     */
    public function getMaxLength(): string
    {
        return $this->data['maxlength'];
    }

    /**
     * Gets the property description
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->data['description'];
    }

    /**
     * Gets the property format
     *
     * @return string
     */
    public function getFormat(): string
    {
        return $this->data['format'];
    }

    /**
     * Gets the property name
     *
     * @return string
     */
    public function getProperty(): string
    {
        return $this->data['property'];
    }

    public function getGetterName(): string
    {
        return $this->addPrefix($this->getProperty(), 'get');
    }

    public function getSetterName(): string
    {
        return $this->addPrefix($this->getProperty(), 'set');
    }

    /**
     * Gets the appropriate mapper
     *
     * @return MapperInterface
     */
    public function getMapper(): MapperInterface
    {
        switch ($this->getDisplay()) {
            case 'a':
                return new AlphanumericMapper($this);
            break;
        }
    }
}
