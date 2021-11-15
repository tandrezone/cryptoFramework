<?php

namespace App\Console\Commands;

use App\Brokers\Bitstamp;
use App\Brokers\BrokerManager;
use App\Brokers\Simulator;
use App\Models\Account;
use App\Strategies\ExampleStrategy;
use Illuminate\Console\Command;

class testStrategy extends testCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:strategy';

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
        $broker = $this->broker->getBroker(Bitstamp::class);
        $account = $this->account->createAccount($broker);
        $strategy = new ExampleStrategy($broker, $account);
        while(1) {
            $strategy->run();
        }
    }
}
