<?php

namespace Kaperys\Financial\Message\Cache;

/**
 * Class CacheFile
 *
 * @package Kaperys\Financial\Message\Cache
 *
 * @author  Mike Kaperys <mike@kaperys.io>
 */
class CacheFile
{

    /** @var string $schemaCache the cached file contents */
    protected $schemaCache;

    /**
     * CacheFile constructor.
     *
     * @param string $schemaCache the cached file contents
     */
    public function __construct($schemaCache)
    {
        $this->schemaCache = $schemaCache;
    }
}
