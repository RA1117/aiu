<x-app-layout>
    <x-slot name="header">
        Quiz
    </x-slot>
    <h1>詳細画面</h1>
    <div>
        <p>問題：{{$quiz->question}}</p>
        <p>答え：{{$quiz->answer}}</p>
    </div>
</x-app-layout>