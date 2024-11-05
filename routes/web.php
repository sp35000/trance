<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('demo', function () {
    return view('demo');
});

Route::resource('worklogs', 'App\Http\Controllers\WorklogController');
Route::resource('worklogs/{date}', 'App\Http\Controllers\WorklogController@show');

require __DIR__.'/auth.php';
