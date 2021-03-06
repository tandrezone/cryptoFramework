<?php

namespace App\Console\Commands;

use App\Brokers\Simulator;
use App\Brokers\BrokerManager;
use App\Models\Account;
use Illuminate\Console\Command;

class testBroker extends testCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:broker';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(BrokerManager $broker, Account $account)
    {
        parent::__construct($broker, $account);
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $broker = $this->broker->getBroker(Simulator::class);
        print_r(json_encode($broker->createOrder('UMA', 'trade', 'sell', '1', '14444' )));
        print_r(json_encode($broker->getOpenOrders()));
        return Command::SUCCESS;
    }
}
