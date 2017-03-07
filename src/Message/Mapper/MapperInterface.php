<?php

namespace Kaperys\Financial\Message\Mapper;

/**
 * Interface MapperInterface
 *
 * @package Kaperys\Financial\Message\Mapper
 *
 * @author  Mike Kaperys <mike@kaperys.io>
 */
interface MapperInterface
{

    /**
     * Packs the given property data
     *
     * @param string $data the property data
     *
     * @return string the packed data
     */
    public function pack(string $data): string;

    /**
     * Unpacks the given property data
     *
     * @param string $data the property data
     *
     * @return string the unpacked data
     */
    public function unpack(string $data): string;

    /**
     * Validates the given data against the schema
     *
     * @param array $arguments the data
     */
    public function validate(array $arguments);
}
