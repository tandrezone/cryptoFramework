<?php

namespace App\Console\Commands;

use App\Brokers\Bitstamp;
use App\Brokers\Simulator;
use App\Brokers\BrokerManager;
use App\Brokers\BrokersApi;
use Illuminate\Console\Command;

class testBroker extends Command
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
     * @var BrokerManager
     */
    public BrokerManager $manager;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(BrokerManager $manager)
    {
        $this->manager = $manager;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $broker = $this->manager->getBroker(Simulator::class);
        print_r(json_encode($broker->createOrder('UMA', 'trade', 'sell', '1', '14444' )));
        print_r(json_encode($broker->getOpenOrders()));
        return Command::SUCCESS;
    }
}
