<?php

namespace Kaperys\Financial\Message\Schema\Helpers;

trait AnnotationNameFormatter
{

    public function formatSetterName($setter)
    {
        return ($this->isPrefixed($setter)) ? $this->removePrefix($setter) : $this->addPrefix($setter, 'set');
    }

    public function formatGetterName($getter)
    {
        return ($this->isPrefixed($getter)) ? $this->removePrefix($getter) : $this->addPrefix($getter, 'get');
    }

    public function getMethodFunction($methodName)
    {
        if ($this->isPrefixed($methodName)) {
            return substr($methodName, 0, 3);
        }

        return false;
    }

    protected function isPrefixed($methodName)
    {
        return (in_array(substr($methodName, 0, 3), ['get', 'set']));
    }

    protected function removePrefix($methodName)
    {
        return lcfirst(substr($methodName, 3));
    }

    protected function addPrefix($methodName, $prefix)
    {
        return $prefix . ucfirst($methodName);
    }
}