<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\VotesController;
//use App\Http\Controllers\CategoriesController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
})->name('index');

Route::resource('questions', QuestionsController::class);
//Route::resource('categories', CategoriesController::class);

Route::post('/vote/{question_id}/{type}', [VotesController::class, 'vote'])->name('vote');

Route::get('/votes', [QuestionsController::class, 'index'])->name('votes');

Route::get('/login', function () { return view('sign.login'); })->name('sign.login');

Route::get('/register', function () { return view('sign.register'); })->name('sign.register');
