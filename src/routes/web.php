<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\VotesController;
use Illuminate\Support\Facades\Route;


/*Route::get('/', function () {                //Felfüggetve! 2 in 1 logout index oldalra mutat!  
    return view('welcome');
});


Route::get('/index', function () {
    return view('index');
})->name('index');*/                           //Felfüggetve! 2 in 1 logout index oldalra mutat!


// 2 in 1 kód:
Route::get('/', function () {
    return view('index');
})->name('index');


Route::get('/questions', [QuestionsController::class, 'index'])->name('questions.index');


Route::post('/questions/{question}/vote', [VotesController::class, 'store'])->name('vote');


Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['verified'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/questions/create', [QuestionsController::class, 'create'])->name('questions.create');
    Route::post('/questions', [QuestionsController::class, 'store'])->name('questions.store');

});

Route::get('/questions/{question}', [QuestionsController::class, 'show'])->name('questions.show');


require __DIR__.'/auth.php';


Route::middleware(['auth', 'checkadmin'])->group(function () {

    Route::get('/admin', [AdminDashboardController::class, 'show'])->name('admin.dashboard');

    Route::delete('/questions/{question}', [QuestionsController::class, 'destroy'])->name('questions.destroy');

});

