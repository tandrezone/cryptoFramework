<?php

namespace App\Brokers;

use App\Utils\Structs\Ticker;
use ccxt\bitstamp as ccxtBitstamp;

class Bitstamp extends Broker implements BrokerInterface
{
    private $exchange;

    public function __construct()
    {
        $this->exchange = new ccxtBitstamp(array(
            'apiKey' => env("BITSTAMP_API_KEY"),
            'secret' => env('BITSTAMP_API_SECRET'),
        ));
    }

    public function getBalance() {
        return $this->exchange->fetch_balance();
    }
    public function getTicker($symbol) {
        return $this->exchange->fetch_ticker($symbol."/USD");
    }
    public function getOpenOrders() {
        return $this->exchange->fetch_open_orders();
    }

    public function createOrder($symbol, $type, $side, $amount, $price ) {
        //print_r($this->exchange->sell($crypto['coin'], 'trade', 'sell', $crypto['value'], $ticker['last']));
        return $this->exchange->create_order($symbol."/USD", $type, $side, $amount, $price);
    }
    public function getTickers($symbol,$timeframe,$since,$limit)
    {
        $ohlcvs = $this->exchange->fetch_ohlcv($symbol . "/USD", $timeframe, $since, $limit);
        $candles = [];
        foreach ($ohlcvs as $ohlcv) {
            $ticker = new Ticker([
                "symbol" => $symbol."/USD",
                "timestamp" => $ohlcv[0],
                "open" => $ohlcv[1],
                "high" => $ohlcv[2],
                "low" => $ohlcv[3],
                "close" => $ohlcv[4],
            ]);
            $candles[] = json_decode($ticker->getData(),true);
        }
        return $candles;
    }

}
