<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Quiz;

use Illuminate\Support\Facades\Auth;



class QuizController extends Controller
{
    public function show(Quiz $quiz)
    {
        $question=Quiz::inRandomOrder()->first();
        return view('quiz.show')->with(['quiz'=>$question]);
    }
    
    public function index()
    {
        return view('quiz.index');
    }
    
    public function create()
    {
        return view('quiz.create');
    }
    
    public function store(Request $request, Quiz $quiz)
    {
        $input = $request['quiz'];
        $quiz->user_id = Auth::id();
        $quiz->fill($input)->save();
        return redirect('/quiz/index/');
    }
    
}
