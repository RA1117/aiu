<x-app-layout>
    <x-slot name="header">
        Quiz
    </x-slot>
    <h1>Quiz</h1>
    <form action="/quiz/index" method="POST">
        @csrf
        <div class='question'>
            <h2>Question</h2>
            <input type='text' name='quiz[question]' placeholder='問題文'/>
        </div>
        <div class='answer'>
            <h2>Answer</h2>
            <input type='text' name='quiz[answer]' placeholder='答え'/>
        </div>
        <input type='submit' value='作成する'/>
    </form>
</x-app-layout>