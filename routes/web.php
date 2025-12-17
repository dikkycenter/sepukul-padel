<?php

use App\Livewire\LeaderboardPage;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', LeaderboardPage::class);
