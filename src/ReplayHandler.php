<?php

namespace ReplayHandler;

use EloGank\Component\Configuration\Config;

class ReplayHandler
{

    public $redisClient;
    public $statsdClient;

    public function __construct()
    {

        $this->redisClient = new \Predis\Client(array(
            'scheme'   => Config::get('redis.scheme'),
            'host'     => Config::get('redis.host'),
            'password' => Config::get('redis.password'),
            'port'     => Config::get('redis.port')
        ));

        $connection = new \Domnikl\Statsd\Connection\UdpSocket(Config::get('statsd.host'), Config::get('statsd.port'));
        $this->statsdClient = new \Domnikl\Statsd\Client($connection, Config::get('statsd.namespace'));


    }
}