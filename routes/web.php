<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MatchController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('/matches')
    ->name('matches.')
    ->group(function () {
        Route::post('/play', [MatchController::class, 'play'])->name('play');
        Route::post('/init', [MatchController::class, 'init'])->name('init');
        Route::delete('/', [MatchController::class, 'destroy'])->name('destroy');
        Route::get('/edit', [MatchController::class, 'edit'])->name('edit');
        Route::put('/{match}/teams/{team}', [MatchController::class, 'update'])->name('update');
    });

