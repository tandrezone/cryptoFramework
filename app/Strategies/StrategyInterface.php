<?php

namespace App\Strategies;

interface StrategyInterface
{
    public function run();
    public function buy($amount,$price);
    public function sell($amount,$price);
}
