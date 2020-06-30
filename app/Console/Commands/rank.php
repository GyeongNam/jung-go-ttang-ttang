<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class rank extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'item:rank';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command item_rank update';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        
    }
}
