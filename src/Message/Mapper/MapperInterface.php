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
     * @return mixed the unpacked data
     */
    public function unpack(string $data);
}
