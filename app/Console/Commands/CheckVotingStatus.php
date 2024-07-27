<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CheckVotingStatus extends Command
{
     /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-voting-status';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if voting should be disabled and update the setting accordingly';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        checkAndDisableVoting();
        $this->info('Voting status checked and updated.');
    }
}