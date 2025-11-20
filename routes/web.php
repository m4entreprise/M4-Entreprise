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

Route::get('/services/site-vitrine', function () {
    return Inertia::render('services/SiteVitrine');
})->name('services.site-vitrine');

Route::get('/services/ecommerce', function () {
    return Inertia::render('services/Ecommerce');
})->name('services.ecommerce');

Route::get('/services/sur-mesure', function () {
    return Inertia::render('services/SurMesure');
})->name('services.sur-mesure');

Route::get('/services/consulting-it', function () {
    return Inertia::render('services/ConsultingIT');
})->name('services.consulting-it');

Route::get('/services/production-media', function () {
    return Inertia::render('services/ProductionMedia');
})->name('services.production-media');

Route::get('/portfolio', function () {
    return Inertia::render('Portfolio');
})->name('portfolio');

Route::get('/contact', function () {
    return Inertia::render('Contact');
})->name('contact');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
