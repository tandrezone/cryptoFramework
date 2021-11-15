<?php

namespace App\Console\Commands;

use App\Brokers\BrokerManager;
use App\Models\Account;
use Illuminate\Console\Command;

class testCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public $broker;
    public $account;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(BrokerManager $broker, Account $account)
    {
        $this->broker = $broker;
        $this->account = $account;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return Command::SUCCESS;
    }
}
