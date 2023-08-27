<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;


class QuizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('quizzes')->insert([
            'user_id' => 1,
            'question' => '質問1',
            'answer' => '解答1',
        ]);
        
        DB::table('quizzes')->insert([
            'user_id' => 1,
            'question' => '質問2',
            'answer' => '解答2',
        ]);
    }
}
