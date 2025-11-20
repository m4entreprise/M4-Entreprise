<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('/services/developpement-web', function () {
    return Inertia::render('services/DeveloppementWeb');
})->name('services.developpement-web');

Route::get('/services/consulting-it', function () {
    return Inertia::render('services/ConsultingIT');
})->name('services.consulting-it');

Route::get('/services/production-media', function () {
    return Inertia::render('services/ProductionMedia');
})->name('services.production-media');

Route::get('/portfolio', function () {
    return Inertia::render('Portfolio');
})->name('portfolio');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
