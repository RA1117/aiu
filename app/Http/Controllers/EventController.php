<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function show(){
        return view('calendars.calendar');
    }
    // 予定の追加
    public function create(Request $request, Event $event){
        // バリデーション（eventsテーブルの中でNULLを許容していないものをrequired）
        $request->validate([
            'event_title' => 'required',
            'event_start' => 'required',
            'event_end' => 'required',
            'event_color' => 'required',
        ]);

        // 登録処理
        $event->event_title = $request->input('event_title');
        $event->event_body = $request->input('event_body');
        $event->event_start = $request->input('event_start');
        $event->event_end = date("Y-m-d", strtotime("{$request->input('event_end')} +1 day")); // FullCalendarが登録する終了日は仕様で1日ずれるので、その修正を行っている
        $event->event_color = $request->input('event_color');
        $event->event_border_color = $request->input('event_color');
        $event->save();

        // カレンダー表示画面にリダイレクトする
        return redirect(route("show"));
    }
     // DBから予定取得
    public function get(Request $request, Event $event){
        // バリデーション
        $request->validate([
            'event_start' => 'required|integer',
            'event_end' => 'required|integer'
        ]);

        // 現在カレンダーが表示している日付の期間
        $start_date = date('Y-m-d', $request->input('event_start') / 1000); // 日付変換（JSのタイムスタンプはミリ秒なので秒に変換）
        $end_date = date('Y-m-d', $request->input('event_end') / 1000);

        // 予定取得処理（これがaxiosのresponse.dataに入る）
        return $event->query()
            // DBから取得する際にFullCalendarの形式にカラム名を変更する
            ->select(
                'id',
                'event_title as title',
                'event_body as description',
                'event_start as start',
                'event_end as end',
                'event_color as backgroundColor',
                'event_border_color as borderColor'
            )
            // 表示されているカレンダーのeventのみをDBから検索して表示
            ->where('event_start', '>', $start_date)
            ->where('event_end', '<', $end_date) // AND条件
            ->get();
    }
    // 予定の編集
    public function update(Request $request, Event $event){
        $input = new Event();

        $input->event_title = $request->input('event_title');
        $input->event_body = $request->input('event_body');
        $input->event_start = $request->input('event_start');
        $input->event_end = date("Y-m-d", strtotime("{$request->input('event_end')} +1 day"));
        $input->event_color = $request->input('event_color');
        $input->event_border_color = $request->input('event_color');

        // 更新する予定をDBから探し（find）、内容が変更していたらupdated_timeを変更（fill）して、DBに保存する（save）
        $event->find($request->input('id'))->fill($input->attributesToArray())->save(); // fill()の中身はArray型が必要だが、$inputのままではコレクションが返ってきてしまうため、Array型に変換

        // カレンダー表示画面にリダイレクトする
        return redirect(route("show"));
    }
    // 予定の削除
    public function delete(Request $request, Event $event){
        // 削除する予定をDBから探し（find）、DBから物理削除する（delete）
        $event->find($request->input('id'))->delete();

        // カレンダー表示画面にリダイレクトする
        return redirect(route("show"));
    }
}
