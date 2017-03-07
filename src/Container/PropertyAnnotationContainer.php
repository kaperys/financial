<?php

namespace Kaperys\Financial\Container;

use Kaperys\Financial\Message\Mapper\AlphanumericMapper;
use Kaperys\Financial\Message\Mapper\BinaryMapper;
use Kaperys\Financial\Message\Mapper\Exception\MapperNotFoundException;
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
     * @return string|bool
     */
    public function getType(): string
    {
        return $this->data['var'] ?: false;
    }

    /**
     * Gets the property bit index
     *
     * @return string|bool
     */
    public function getBit(): string
    {
        return $this->data['bit'] ?: false;
    }

    /**
     * Gets the property display (or type)
     *
     * @return string|bool
     */
    public function getDisplay(): string
    {
        return $this->data['display'] ?: false;
    }

    /**
     * Gets the property length
     *
     * @return string|bool
     */
    public function getLength(): string
    {
        return $this->data['length'] ?: false;
    }

    /**
     * Gets the property minimum length
     *
     * @return string|bool
     */
    public function getMinLength(): string
    {
        return $this->data['minlength'] ?: false;
    }

    /**
     * Gets the property maximum length
     *
     * @return string|bool
     */
    public function getMaxLength(): string
    {
        return $this->data['maxlength'] ?: false;
    }

    /**
     * Gets the property description
     *
     * @return string|bool
     */
    public function getDescription(): string
    {
        return $this->data['description'] ?: false;
    }

    /**
     * Gets the property format
     *
     * @return string|bool
     */
    public function getFormat(): string
    {
        return $this->data['format'] ?: false;
    }

    /**
     * Gets the property name
     *
     * @return string|bool
     */
    public function getProperty(): string
    {
        return $this->data['property'] ?: false;
    }

    /**
     * Gets the property getter name
     *
     * @return string
     */
    public function getGetterName(): string
    {
        return $this->addPrefix($this->getProperty(), 'get');
    }

    /**
     * Gets the property setter name
     *
     * @return string
     */
    public function getSetterName(): string
    {
        return $this->addPrefix($this->getProperty(), 'set');
    }

    /**
     * Is the field fixed length?
     *
     * @return bool
     */
    public function isFixedLength(): bool
    {
        return (bool) $this->getLength();
    }

    /**
     * Gets the appropriate mapper
     *
     * @return MapperInterface
     *
     * @throws MapperNotFoundException if a mapper is not found for the display type
     */
    public function getMapper(): MapperInterface
    {
        switch ($this->getDisplay()) {
            case 'a':
            case 'an':
            case 'ans':
            case 'z':
                return new AlphanumericMapper($this);
                break;
            case 'b':
                return new BinaryMapper($this);
                break;
            default:
                throw new MapperNotFoundException('Mapper not found for display ' . $this->getDisplay());
        }
    }
}
