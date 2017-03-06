<?php

namespace Kaperys\Financial\Message\Schema\Helpers;

/**
 * Class AnnotationNameFormatter
 *
 * @package Kaperys\Financial\Message\Schema\Helpers
 *
 * @author  Mike Kaperys <mike@kaperys.io>
 */
trait AnnotationNameFormatter
{

    /**
     * Formats the method name as a setter
     *
     * @param string $setter the method name
     *
     * @return string
     */
    public function formatSetterName($setter)
    {
        return ($this->isPrefixed($setter)) ? $this->removePrefix($setter) : $this->addPrefix($setter, 'set');
    }

    /**
     * Formats the method name as getter
     *
     * @param string $getter the method name
     *
     * @return string
     */
    public function formatGetterName($getter)
    {
        return ($this->isPrefixed($getter)) ? $this->removePrefix($getter) : $this->addPrefix($getter, 'get');
    }

    /**
     * Gets the method function (is this a getter or setter method?)
     *
     * @param string $methodName the method name
     *
     * @return string
     */
    public function getMethodFunction($methodName)
    {
        if ($this->isPrefixed($methodName)) {
            return substr($methodName, 0, 3);
        }

        return false;
    }

    /**
     * Is the method name prefixed?
     *
     * @param string $methodName the method name
     *
     * @return bool
     */
    protected function isPrefixed($methodName)
    {
        return (in_array(substr($methodName, 0, 3), ['get', 'set']));
    }

    /**
     * Removes a method prefix
     *
     * @param string $methodName the method name
     *
     * @return string
     */
    protected function removePrefix($methodName)
    {
        return lcfirst(substr($methodName, 3));
    }

    /**
     * Adds a method prefix
     *
     * @param string $methodName the method name
     * @param string $prefix     the prefix to add
     *
     * @return string
     */
    protected function addPrefix($methodName, $prefix)
    {
        return $prefix . ucfirst($methodName);
    }
}
