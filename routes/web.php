<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/jobs', [JobController::class, 'index']);

Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth');
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
Route::get('/jobs/{job}', [JobController::class, 'show']);

Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'job');

Route::patch('/jobs/{job}', [JobController::class, 'update']);

Route::delete('/jobs/{job}', [JobController::class, 'destroy'])
    ->middleware('auth');

Route::get('/search', SearchController::class);
Route::get('tags/{tag:name}', TagController::class);

Route::middleware('guest')->group(function (){
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);
    Route::get('/login', [SessionController::class,'create'])->name('login');
    Route::post('/login', [SessionController::class,'store']);
});


Route::get('/applications', [ApplicationController::class, 'index'])->middleware('auth');

Route::post('/jobs/{job}/applications', [ApplicationController::class, 'store'])
    ->middleware('auth')
    ->can('apply', 'job');

Route::get('/jobs/{job}/applications', [ApplicationController::class, 'show']);


Route::delete('/logout', [SessionController::class, 'destroy']);