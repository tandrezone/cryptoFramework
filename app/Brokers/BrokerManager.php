<?php

namespace App\Brokers;

class BrokerManager
{
    public function getBroker($broker) {
        return new $broker;
    }
}
