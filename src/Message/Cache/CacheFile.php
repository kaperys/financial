<?php

namespace Kaperys\Financial\Message\Cache;

class CacheFile
{

    protected $schemaCache;

    public function __construct(array $schemaCache)
    {
        $this->schemaCache = $schemaCache;
    }
}