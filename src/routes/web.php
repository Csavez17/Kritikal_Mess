<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\VotesController;
use Illuminate\Support\Facades\Route;

Route::post('/questions/{question}/vote', [VotesController::class, 'store'])->name('vote');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'show']);

Route::get('/index', function () {
    return view('index');
})->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin', [AdminDashboardController::class, 'show'])->middleware('can:admin-access');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('questions', QuestionsController::class);
Route::resource('categories', CategoriesController::class);