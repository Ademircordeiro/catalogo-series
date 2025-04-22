<?php

use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/series');
});

// Route::controller(SeriesController::class)->group(function () {
//     Route::get('/series', 'index')->name('series.index');
//     Route::get('series/criar', 'create')->name('series.create');
//     Route::post('series/salvar', 'store')->name('series.salvar');
// });


// Route::delete('/series/destroy/{series}', [SeriesController::class, 'destroy'])
//     ->name('series.destroy');

// Route::resource('/series', SeriesController::class)
//     ->only(['index', 'create', 'store', 'destroy', 'edit', 'update']);

Route::resource('/series', SeriesController::class)
    ->except(['show']);
