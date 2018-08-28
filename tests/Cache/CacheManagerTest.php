<?php

namespace Kaperys\Financial\Tests\Cache;

use Kaperys\Financial\Cache\CacheManager;
use PHPUnit\Framework\TestCase;

class CacheManagerTest extends TestCase
{
    /** @test */
    public function configureCacheDirectory()
    {
        $cacheManager = new CacheManager([
            'cacheDirectory' => '/test/cache/dir',
        ]);

        $reflection = new \ReflectionClass($cacheManager);
        $method = $reflection->getMethod('getConfiguration');
        $method->setAccessible(true);

        $this->assertEquals('/test/cache/dir', $method->invoke($cacheManager, 'cacheDirectory'));
    }

}
