<?php

use App\Http\Controllers\Api\V1\DepartamentoController;
use App\Http\Controllers\Api\V1\DetalleReactivoController;
use App\Http\Controllers\Api\V1\DistritoController;
use App\Http\Controllers\Api\V1\EquipoController;
use App\Http\Controllers\Api\V1\EquipoReactivoController;
use App\Http\Controllers\Api\V1\LaboratorioController;
use App\Http\Controllers\Api\V1\MunicipioController;
use App\Http\Controllers\Api\V1\ReactivoAsignadoController;
use App\Http\Controllers\Api\V1\ReactivoController;
use Illuminate\Support\Facades\Route;

Route::apiResource('departamentos',DepartamentoController::class);
Route::apiResource('distritos',DistritoController::class);
Route::apiResource('municipios',MunicipioController::class);

Route::apiResource('laboratorios',LaboratorioController::class);
Route::apiResource('reactivo-asignado',ReactivoAsignadoController::class);
Route::apiResource('detalle-reactivo',DetalleReactivoController::class);

Route::apiResource('reactivos',ReactivoController::class);
Route::apiResource('equipo-reactivo',EquipoReactivoController::class);
Route::apiResource('equipo',EquipoController::class);
