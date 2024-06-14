<?php

use App\Livewire\FormNoticia;
use Illuminate\Support\Facades\Route;
use App\Livewire\Home;

Route::get('/', Home::class)->name('home');
Route::get('noticias', FormNoticia::class)->middleware(['auth'])->name('noticias');
Route::get('noticias/{noticia}', FormNoticia::class)->middleware(['auth'])->name('editar noticias');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');





require __DIR__.'/auth.php';
