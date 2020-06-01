<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Item;
class auction_update extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'item:success_update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command item_success update';

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
        Item::where('item_deadline','<=', date('Y-m-d'))->update([
          'item_success' => 0
        ]);
    }
}
