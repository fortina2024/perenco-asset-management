<?php

use App\Filament\Resources\PobResource;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/login', function () {
    return view('auth.login'); // Remplace par la vue que tu veux utiliser.
})->name('login');

Route::get('/', function () {
    return view('welcome');
});

// Mes propres routes

Route::get('/voyages/create', function () {
    return redirect()->route('filament.admin.resources.voyages.create');
})->name('voyages.create');
Route::get('/pobs/create', function () {
    return redirect()->route('filament.admin.resources.pobs.create');
})->name('pobs.create');
Route::get('/equipages/create', function () {
    return redirect()->route('filament.admin.resources.equipages.create');
})->name('equipages.create');
Route::get('/operations/create', function () {
    return redirect()->route('filament.admin.resources.operations.create');
})->name('operations.create');
Route::get('/robs/create', function () {
    return redirect()->route('filament.admin.resources.robs.create');
})->name('robs.create');
Route::get('/liftings/create', function () {
    return redirect()->route('filament.admin.resources.liftings.create');
})->name('liftings.create');
Route::get('/weather_conditions/create', function () {
    return redirect()->route('filament.admin.resources.weather_conditions.create');
})->name('weather_conditions.create');
Route::get('/hses/create', function () {
    return redirect()->route('filament.admin.resources.hses.create');
})->name('hses.create');
Route::get('/rhcs/create', function () {
    return redirect()->route('filament.admin.resources.rhcs.create');
})->name('rhcs.create');
Route::get('/daily_activities/create', function () {
    return redirect()->route('filament.admin.resources.daily_activities.create');
})->name('daily_activities.create');

/*Route::prefix('admin')->middleware(['auth'])->group(function () {
    // Route vers le formulaire de création
    Route::get('/pobs/create', [PobResource::class, 'CreatePob'])
        ->name('filament.resources.pobs.create');
});*/

Route::get('/test-redirect', function () {
    return redirect()->route('filament.admin.resources.pobs.create');
});
