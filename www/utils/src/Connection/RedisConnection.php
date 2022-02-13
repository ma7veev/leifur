<?php

namespace Leifur\Utils\Connection;

use Redis;

class RedisConnection
{
    public function connect(): Redis
    {
        //ToDo integrate config injeciton
        $redis = new Redis();
        $redis->connect('cache', 6379);

        return $redis;
    }
}