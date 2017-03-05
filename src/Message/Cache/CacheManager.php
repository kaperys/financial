<?php

namespace Kaperys\Message\Cache;

/**
 *  Class CacheManager
 *
 *  @package Kaperys\Message\Cache
 *
 *  @author Mike Kaperys <mike@kaperys.io>
 */
class CacheManager
{
  /** @var string $cacheDirectory the current cache file directory */
  protected $cacheDirectory = __DIR__ . '/cache/';

  /**
   *  Generates the schema cache
   *
   *  ..
   */
  public function generateSchemaCache()
  {

  }

  /**
   *  Sets the cache directory
   *
   *  @param string $cacheDirectory the new cache file directory
   */
  public function setCacheDirectory(string $cacheDirectory)
  {
    $this->cacheDirectory = $cacheDirectory;
  }

  /*
   *  Gets the cache directory
   *
   *  @return string the cache file directory
   */
  public function getCacheDirectory(): string
  {
    return $this->cacheDirectory;
  }
}
