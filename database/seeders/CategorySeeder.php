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
            'name' => '趣味',
         
        ]);

        DB::table('categories')->insert([
            'name' => '旅行',
       
        ]);

        DB::table('categories')->insert([
            'name' => 'お出かけ',
       
        ]);

        DB::table('categories')->insert([
            'name' => '思い出',
     
        ]);

        DB::table('categories')->insert([
            'name' => '重要',
       
        ]);
    }
}
