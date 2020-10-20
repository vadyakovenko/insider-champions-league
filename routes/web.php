<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MatchController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('matches/play', [MatchController::class, 'play'])->name('matches.play');
Route::delete('matches', [MatchController::class, 'destroy'])->name('matches.destroy');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
