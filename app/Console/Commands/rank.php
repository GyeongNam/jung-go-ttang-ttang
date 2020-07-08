<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Item;
use DB;

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
      $date_de = DB::table('bantime')->get();

      foreach ($date_de as $key =>$value) {
        $rede =  strtotime(date("Y-m-d"));
          if ( strtotime($value->ban_enddate) < $rede) {
             DB::table('bantime')->where(['user_id'=> $value->user_id])->delete();
             $delete = DB::table('banlog')->where([
              'user_id' => $value->user_id ])->delete();
           }
      }
      $item = Item::select('*')->get();
      foreach ($item as $key => $value) {
        if ( date("Y-m-d H:i:s",strtotime($value->created_at."+1 years")) <= date("Y-m-d H:i:s")) {
          Item::where(['item_number'=>$value->item_number])->delete();
          }
        }
      }
    }
