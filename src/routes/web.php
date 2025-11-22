<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\VotesController;

Route::post('/questions/{question}/vote', [VotesController::class, 'store'])->name('vote');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
})->name('index');

Route::get('/login', function () { 
    return view('sign.login'); 
})->name('sign.login');

Route::get('/register', function () { 
    return view('sign.register'); 
})->name('sign.register');

Route::resource('questions', QuestionsController::class);
Route::resource('categories', CategoriesController::class);