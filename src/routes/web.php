<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\VotesController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
})->name('index');

Route::resource('questions', QuestionsController::class);
Route::resource('categories', CategoriesController::class);

Route::post('/vote/{question_id}/{type}', [VotesController::class, 'vote'])->name('vote');

Route::get('/login', function () { 
    return view('sign.login'); 
})->name('sign.login');

Route::get('/register', function () { 
    return view('sign.register'); 
})->name('sign.register');