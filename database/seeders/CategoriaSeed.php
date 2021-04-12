<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([

            'nombre' => 'FrontEnd',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);

        DB::table('categorias')->insert([

            'nombre' => 'BackEnd',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);
        
        DB::table('categorias')->insert([

            'nombre' => 'FullStack',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);

        DB::table('categorias')->insert([

            'nombre' => 'UX/UI',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);

        DB::table('categorias')->insert([

            'nombre' => 'FullStack',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);

        DB::table('categorias')->insert([

            'nombre' => 'DevOps',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);

        DB::table('categorias')->insert([

            'nombre' => 'QA',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);

    }
}
