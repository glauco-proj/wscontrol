<?php

use Illuminate\Database\Seeder;
use App\LogPerson;
use Carbon\Carbon;

class LogPersonSeed extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        App\LogPerson::create([
           'name' => str_random(10)
          ,'birthday' => Carbon::now()->format('Y-m-d H:i:s')
          ,'sex'      => 'M'
          ,'log_at'   => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
