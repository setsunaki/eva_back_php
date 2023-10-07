<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BodegaController;
use App\Http\Controllers\API\DispositivoController;
use App\Http\Controllers\API\MarcaController;
use App\Http\Controllers\API\ModeloController;

Route::prefix('v1')->group(function () {
    Route::get('/marcas',[ MarcaController::class, 'get']);
    Route::get('/bodegas',[ BodegaController::class, 'get']);
    Route::get('/dispositivos',[ DispositivoController::class, 'get']);
    Route::get('/marca/{id}/modelo',[ ModeloController::class, 'getByMarca']);
    Route::get('/dispositivos/{id}/bodega',[ DispositivoController::class, 'getByBod']);
    Route::get('/dispositivos/{id}/modelo',[ DispositivoController::class, 'getByMod']);
    Route::get('/dispositivos/{id}/marca',[ DispositivoController::class, 'getByMar']);
  
});

