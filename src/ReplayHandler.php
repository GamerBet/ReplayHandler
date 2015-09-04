<?php

namespace ReplayHandler;

use EloGank\Component\Configuration\Config;

class ReplayHandler
{

    public $redisClient;

    public function __constructor()
    {

        $this->redisClient = $client = new Predis\Client(array(
            'scheme'   => Config::get('redis.scheme'),
            'host'     => Config::get('redis.host'),
            'password' => Config::get('redis.password'),
            'port'     => Config::get('redis.port')
        ));

    }
}