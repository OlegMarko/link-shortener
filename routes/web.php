<?php

use App\Http\Controllers\LinkController;
use App\Http\Controllers\RedirectController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LinkController::class, 'create'])->name('links.create');
Route::post('/shorten', [LinkController::class, 'store'])->name('links.store');
Route::delete('/shorten/{link}', [LinkController::class, 'destroy'])->name('links.destroy');
Route::get('/{token}', RedirectController::class)->name('links.redirect');
