<?php

namespace Kaperys\Financial\Message\Packer;

use Kaperys\Financial\Message\Schema\SchemaManager;

/**
 * Class MessagePacker
 *
 * @package Kaperys\Financial\Message\Packer
 *
 * @author Mike Kaperys <mike@kaperys.io>
 *
 * @property SchemaManager $schemaManager
 */
class MessagePacker
{

    protected $headerLength;

    protected $mti;

    public $schemaManager;

    public function __construct(SchemaManager $schemaManager)
    {
        $this->schemaManager = $schemaManager;
    }

    public function setHeaderLength(int $headerLength): MessagePacker
    {
        $this->headerLength = $headerLength;

        return $this;
    }

    public function getHeaderLength(): int
    {
        return $this->headerLength;
    }

    public function setMti(string $mti): MessagePacker
    {
        $this->mti = $mti;

        return $this;
    }

    public function getMti(): string
    {
        return $this->mti;
    }

    public function generate(): string
    {
        return 'packed message';
    }
}