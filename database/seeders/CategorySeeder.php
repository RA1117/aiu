<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => '犬',
         
        ]);

        DB::table('categories')->insert([
            'name' => '猫',
       
        ]);

        DB::table('categories')->insert([
            'name' => '鼬',
       
        ]);

        DB::table('categories')->insert([
            'name' => '龍',
     
        ]);

        DB::table('categories')->insert([
            'name' => '虎',
       
        ]);
    }
}
