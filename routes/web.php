<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::delete('/users/{user}/destroy', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::put('/users/{user}', [UserController::class,  'update'])->name('users.update');
Route::get('/users/{user}/edit', [UserController::class,  'edit'])->name('users.edit'); //rota que estava sendo usada somente para exemplo 
Route::get('/users', [UserController::class, 'index'])->name('users.index'); //utilizando o método name, vai ser fixado a url e a action, sem se preocupar em mudar a url futuramente
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dash', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
