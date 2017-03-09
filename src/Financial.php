<?php

namespace Kaperys\Financial;

use Kaperys\Financial\Cache\CacheManager;
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

    /** @var CacheManager $cacheManager */
    protected $cacheManager;

    /**
     * Financial constructor.
     *
     * @param CacheManager $cacheManager
     */
    public function __construct(CacheManager $cacheManager)
    {
        $this->cacheManager = $cacheManager;
    }

    /**
     * Returns an instance of the message packer
     *
     * @param SchemaManager $schemaManager
     *
     * @return MessagePacker
     */
    public function pack(SchemaManager $schemaManager): MessagePacker
    {
        return new MessagePacker($this->cacheManager, $schemaManager);
    }

    /**
     * Returns an instance of the message unpacker
     *
     * @param SchemaManager $schemaManager
     *
     * @return MessageUnpacker
     */
    public function unpack(SchemaManager $schemaManager): MessageUnpacker
    {
        return new MessageUnpacker($this->cacheManager, $schemaManager);
    }
}
