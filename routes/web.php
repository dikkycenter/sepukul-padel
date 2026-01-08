<?php

use App\Livewire\LeaderboardPage;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/leaderboard', LeaderboardPage::class)
    ->name('leaderboard');
