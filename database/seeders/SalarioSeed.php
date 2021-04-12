<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalarioSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('salarios')->insert([

            'nombre' => '0 - 500 USD',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);

        DB::table('salarios')->insert([

            'nombre' => '500 - 1000 USD',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);

        DB::table('salarios')->insert([

            'nombre' => '1000 - 1500 USD',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);

        DB::table('salarios')->insert([

            'nombre' => '1500 - 2000 USD',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);

        DB::table('salarios')->insert([

            'nombre' => '2000 - 3000 USD',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);

        DB::table('salarios')->insert([

            'nombre' => '+3000 USD',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);

        DB::table('salarios')->insert([

            'nombre' => 'A convenir',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);
    }
}
