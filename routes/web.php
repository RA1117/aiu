<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\CategoryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/quiz/index', [QuizController::class, 'index'])->name('quiz');
    Route::get('/quiz/show', [QuizController::class, 'show'])->name('quiz.show');
    Route::get('/quiz/create', [QuizController::class, 'create'])->name('quiz.create');
    Route::post('/quiz/index', [QuizController::class, 'store'])->name('quiz.store');
    
    Route::get('/calendar', [EventController::class, 'show'])->name('calendar');
    Route::post('/calendar/create', [EventController::class, 'create'])->name('calendar_create');
    Route::post('/calendar/get',  [EventController::class, 'get'])->name("calendar_get"); // DBに登録した予定を取得
    Route::put('/calendar/update', [EventController::class, 'update'])->name("calendar_update"); // 予定の更新Copy
    Route::delete('/calendar/delete', [EventController::class, 'delete'])->name("calendar_delete"); // 予定の削除
    });
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/categories/{category}', [CategoryController::class,'index'])->middleware("auth");

Route::middleware('auth')->group(function () { 
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});   

Route::controller(PostController::class)->middleware(['auth'])->group(function(){
    Route::get('/family', 'family')->name('family');
    Route::get('/', 'index')->name('index');
    Route::post('/posts', 'store')->name('store');
    Route::get('/posts/create', 'create')->name('create');
    Route::get('/posts/{post}', 'show')->name('show');
    Route::put('/posts/{post}', 'update')->name('update');
    Route::delete('/posts/{post}', 'delete')->name('delete');
    Route::get('/posts/{post}/edit', 'edit')->name('edit');
    Route::get('/family_create', 'family_create')->name('family_create');
    Route::post('/family_ceate/family_register', 'family_register')->name('family_register');
});

require __DIR__.'/auth.php';
