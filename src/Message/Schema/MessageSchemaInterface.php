<?php

namespace Kaperys\Financial\Message\Schema;

/**
 * Interface MessageSchemaInterface
 *
 * @package Kaperys\Financial\Message\Schema
 *
 * @author  Mike Kaperys <mike@kaperys.io>
 */
interface MessageSchemaInterface
{

    /**
     * Gets the schema name
     *
     * @return string
     */
    public function getName(): string;
}
