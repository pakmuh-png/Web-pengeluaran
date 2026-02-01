<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/', [MainController::class, 'index']);
Route::get('/orderrutin', [MainController::class, 'orderrutin'])->name('orderrutin');
Route::get('/orderta', [MainController::class, 'orderta'])->name('orderta');

// API routes for filtering
Route::get('/api/filter/materials', [MainController::class, 'filterMaterials']);
Route::get('/api/filter/pelanggans', [MainController::class, 'filterPelanggans']);
Route::get('/api/filter/planners', [MainController::class, 'filterPlanners']);
Route::get('/api/filter/pabriks', [MainController::class, 'filterPabriks']);
Route::get('/api/filter/areas', [MainController::class, 'filterAreas']);

