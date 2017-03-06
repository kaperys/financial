<?php

namespace Kaperys\Financial;

use Kaperys\Financial\Message\Packer\MessagePacker;
use Kaperys\Financial\Message\Schema\SchemaManager;
use Kaperys\Financial\Message\Unpacker\MessageUnpacker;

/**
 * Class Financial
 *
 * @package Kaperys\Financial
 *
 * @author  Mike Kaperys <mike@kaperys.io>
 */
class Financial
{

    /**
     * Returns an instance of the message packer
     *
     * @param SchemaManager $schemaManager
     *
     * @return MessagePacker
     */
    public function pack(SchemaManager $schemaManager)
    {
        return new MessagePacker($schemaManager);
    }

    /**
     * Returns an instance of the message unpacker
     *
     * @param SchemaManager $schemaManager
     *
     * @return MessageUnpacker
     */
    public function unpack(SchemaManager $schemaManager)
    {
        return new MessageUnpacker($schemaManager);
    }
}
