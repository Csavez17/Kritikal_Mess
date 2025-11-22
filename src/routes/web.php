<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\VotesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;

Route::post('/questions/{question}/vote', [VotesController::class, 'store'])->name('vote');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
})->name('index');

// Gabi kódjához illeszkedő útvonalak
//Route::get('/login', function () { 
//    return view('sign.login'); 
//})->name('sign.login');

Route::get('/login', [LoginController::class, 'show']);

Route::get('/register', function () { 
    return view('sign.register'); 
})->name('sign.register');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('questions', QuestionsController::class);
Route::resource('categories', CategoriesController::class);

require __DIR__.'/auth.php';