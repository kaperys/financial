<?php

namespace Kaperys\Financial\Message\Unpacker;

use Kaperys\Financial\Message\Schema\SchemaManager;

/**
 * Class MessageUnpacker
 *
 * @package Kaperys\Financial\Message\Unpacker
 *
 * @auhtor  Mike Kaperys <mike@kaperys.io>
 */
class MessageUnpacker
{

    /** @var SchemaManager $schemaManager the message schema manager */
    public $schemaManager;

    /**
     * MessageUnpacker constructor.
     *
     * @param SchemaManager $schemaManager the schema manager class
     */
    public function __construct(SchemaManager $schemaManager)
    {
        $this->schemaManager = $schemaManager;
    }
}
