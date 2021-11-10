<?php

namespace App\Brokers;

interface BrokerInterface
{
    public function getBalance();
    public function getTicker($symbol);
    public function getTickers($symbol,$timeframe,$since,$limit);
    public function getOpenOrders();
    public function createOrder($symbol, $type, $side, $amount, $price );


}
