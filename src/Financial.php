<?php

namespace Kaperys\Financial;

use Kaperys\Financial\Message\Packer\MessagePacker;
use Kaperys\Financial\Message\Schema\SchemaManager;
use Kaperys\Financial\Message\Unpacker\MessageUnpacker;

class Financial
{

    public function pack(SchemaManager $schemaManager)
    {
        return new MessagePacker($schemaManager);
    }

    public function unpack()
    {
        return new MessageUnpacker();
    }
}