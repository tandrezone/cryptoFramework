<?php

namespace App\Strategies;

use App\Brokers\Broker;
use App\Models\Account;

class ExampleStrategy extends Strategy
{
    /**
     * Coin in which this strategy is related to
     * @var string
     */
    public string $symbol = "BTC";

    /**
     * Time between each run
     * @var int
     */
    public int $runtime = 60;

    public function __construct(Broker $broker, Account $account, $signals = array()) {
        parent::__construct($broker, $account, $signals);
    }

    /**
     * Code that run the strategy
     */
    public function run() {
        //if($broker->price < 60 && $account->balance > 1) {
        //    $this->buy(coinsValue(1),$data->price);
        //}
        parent::run();
    }
}

