<?php

namespace Kaperys\Financial\Message\Schema;

/**
 * Class ISO8583
 *
 * @package Kaperys\Financial\Message
 *
 * @author  Mike Kaperys <mike@kaperys.io>
 */
class ISO8583 implements MessageSchemaInterface
{

    // The schema name
    const SCHEMA_NAME = 'ISO8583';

    /**
     * @var string $pan
     *
     * @bit 2
     * @format n
     * @minLength 15
     * @maxLength 19
     */
    protected $pan;

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return self::SCHEMA_NAME;
    }

    public function setPan(string $pan): ISO8583
    {
        $this->pan = $pan;

        return $this;
    }

    public function getPan(): string
    {
        return $this->pan;
    }
}