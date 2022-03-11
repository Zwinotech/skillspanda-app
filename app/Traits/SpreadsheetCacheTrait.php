<?php

namespace App\Traits;

use Cache\Adapter\Redis\RedisCachePool;
use Cache\Bridge\SimpleCache\SimpleCacheBridge;
use PhpOffice\PhpSpreadsheet\Settings;
use Redis;

trait SpreadsheetCacheTrait
{
    function spreadsheetCacheWithRedis() {
        $redis = new Redis();
        $redis->connect(config('database.redis.cache.host'), config('database.redis.cache.port') );
        $pool = new RedisCachePool($redis);
        $simpleCache = new SimpleCacheBridge($pool);
        Settings::setCache($simpleCache);
    }
}
