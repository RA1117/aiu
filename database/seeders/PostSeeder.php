<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => '記録・投稿をしよう！',
            'body' => '記録・投稿をして、思い出を残そう！',
            'user_id' => 1,
            'category_id' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);

    }
}
