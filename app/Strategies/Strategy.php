<?php

namespace App\Strategies;

use App\Brokers\Broker;

class Strategy
{
    private $symbol;
    public function __construct(Broker $broker) {

    }

    public function run() {

    }

    /**
     * @return bool
     */
    public function buy($amount,$price) {
        return $this->broker->createOrder($this->symbol, "trade", "buy", $amount, $price );
    }
    public function sell($amount,$price) {
        return $this->broker->createOrder($this->symbol, "trade", "sell", $amount, $price );
    }
}
