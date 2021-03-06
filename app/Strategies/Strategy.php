<?php

namespace App\Strategies;

use App\Brokers\Broker;
use App\Models\Account;

class Strategy
{
    /**
     * Coin to which this strategy should work (BTC,ETH..)
     * @var string
     */
    protected string $symbol;

    /**
     * Broker in which this strategy should run (Bitstamp, Coinbase, Simulator)
     * @var Broker
     */
    protected Broker $broker;

    /**
     * The Account
     * @var Account
     */
    protected Account $account;

    /**
     * The Currency used to the trades (EUR,USD,BTC,..)
     * @var string
     */
    protected string $currency;

    /**
     * The time between each runs
     * @var int
     */
    protected int $runtime = 60;

    public function __construct(Broker $broker, Account $account, $signals = array()) {
        $this->broker = $broker;
        $this->account = $account;
        $this->signals = $signals;
    }


    public function run() {
        sleep($this->runtime);
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
