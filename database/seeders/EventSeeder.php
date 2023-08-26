<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;


class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('events')->insert([
            'event_title' => 'イベントのタイトル',
            'event_body' => 'イベントの本文',
            'event_end' => 'イベント終了日',
            'event_color' => 'イベントの色',
            'event_boder_color' => 'イベントの線の色',
        ]);
    }
}
