<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;


class RecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('records')->insert([
            'user_id' => 1,
            'height' => '身長',
            'weight' => '体重',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);

    }
}
