<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home;

Route::get('/', Home::class)->name('home');
Route::get('noticias', Home::class)->name('noticias');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');





require __DIR__.'/auth.php';
