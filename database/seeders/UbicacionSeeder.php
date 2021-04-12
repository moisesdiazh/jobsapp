<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UbicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('ubicacions')->insert([

            'nombre' => 'Remoto',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);

        DB::table('ubicacions')->insert([

            'nombre' => 'Chile',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);

        DB::table('ubicacions')->insert([

            'nombre' => 'Argentina',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);

        DB::table('ubicacions')->insert([

            'nombre' => 'Brasil',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);


        DB::table('ubicacions')->insert([

            'nombre' => 'Australia',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);

        DB::table('ubicacions')->insert([

            'nombre' => 'Colombia',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);


        DB::table('ubicacions')->insert([

            'nombre' => 'Panama',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);

        DB::table('ubicacions')->insert([

            'nombre' => 'USA',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);

        DB::table('ubicacions')->insert([

            'nombre' => 'España',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);
    }
}
