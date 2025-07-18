<?php

use App\Http\Controllers\Api\V1\AnalyzerController;
use App\Http\Controllers\Api\V1\AnalyzerReagentController;
use App\Http\Controllers\Api\V1\CheckBarcodeController;
use App\Http\Controllers\Api\V1\DepartmentController;
use App\Http\Controllers\Api\V1\DistrictController;
use App\Http\Controllers\Api\V1\LaboratoryController;
use App\Http\Controllers\Api\V1\LaboratoryReagentController;
use App\Http\Controllers\Api\V1\MunicipalityController;
use App\Http\Controllers\Api\V1\ReagentController;
use App\Http\Controllers\Api\V1\ReagentInventoryController;
use Illuminate\Support\Facades\Route;

Route::apiResource('departments', DepartmentController::class);
Route::apiResource('districts', DistrictController::class);
Route::apiResource('municipalities', MunicipalityController::class);

Route::apiResource('laboratories', LaboratoryController::class);

Route::post('laboratory-reagents/assign', [LaboratoryReagentController::class, 'assign'])
    ->name('laboratory-reagents.assign');
//Route::post('laboratory-reagents/assign-and-store', AssignAndStoreController::class)
//    ->name('laboratory-reagents.assign-and-store');
Route::apiResource('laboratory-reagents', LaboratoryReagentController::class);

Route::get('reagent-inventories/generate', [ReagentInventoryController::class, 'generateMissingImage'])
    ->name('reagent-inventories.generate-missing-image');
Route::get('reagent-inventories/{barcode}/check', CheckBarcodeController::class)
    ->name('reagent-inventories.check-barcode');
Route::apiResource('reagent-inventories', ReagentInventoryController::class);

// TODO: Delete this route when the frontend is ready
//Route::get('reagents/index-inventory', [ReagentController::class, 'indexInventory'])
//    ->name('reagents.index-inventory');
Route::apiResource('reagents', ReagentController::class);

Route::apiResource('analyzer-reagent', AnalyzerReagentController::class);
Route::apiResource('analyzers', AnalyzerController::class);
