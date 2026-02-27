<?php

use App\Livewire\ContactPage;
use App\Livewire\EventDetail;
use App\Livewire\EventPage;
use App\Livewire\GalleryDetail;
use App\Livewire\GalleryPage;
use App\Livewire\Home;
use App\Livewire\LeaderboardPage;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::get('/', Home::class)
    ->name('home');

Route::get('/leaderboard-page', LeaderboardPage::class)
    ->name('leaderboard-page');

Route::get('/gallery-page', GalleryPage::class)
    ->name('gallery-page');

Route::get('/gallery/{slug}', GalleryDetail::class)
    ->name('gallery.detail');

Route::get('/event-page', EventPage::class)
    ->name('event-page');

Route::get('/event/{slug}', EventDetail::class)
    ->name('event.detail');

Route::get('/contact-page', ContactPage::class)
    ->name('contact-page');
