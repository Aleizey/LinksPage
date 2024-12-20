<?php

use App\Http\Controllers\CommunityLinkController;
use App\Http\Controllers\CommunityLinkUserController;
// use App\Http\Controllers\Api\v1\CommunityLinkController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [CommunityLinkController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::post('/dashboard', [CommunityLinkController::class, 'store'])
    ->middleware(['auth', 'verified']);

Route::get('dashboard/{channel:slug}', [CommunityLinkController::class, 'index']);

Route::get('/contact', function () {
    return view('contact');
})->middleware(['auth', 'verified'])->name('contact');

Route::get('/mylinks', [CommunityLinkController::class, 'myLinks'])
    ->middleware(['auth', 'verified'])->name('mylinks');

Route::post('/votes/{link}', [CommunityLinkUserController::class, 'store'])
    ->middleware(['auth', 'verified'])->name('votes');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('users', UserController::class)
->middleware('can:administrate,App\Models\User');

require __DIR__ . '/auth.php';

// ¿Qué es el implicit model binding?
// El implicit model binding en Laravel es una característica que permite enlazar automáticamente los modelos
//  de la base de datos a las rutas y controladores, utilizando el identificador (ID) proporcionado en la URL.