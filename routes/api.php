<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatosGeneralController;
use App\Http\Controllers\RecomendanteController;
use App\Models\Recomendante;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(DatosGeneralController::class)->group(function(){
    Route::post('agregar-datos-generales', 'insertDatosGen');
    Route::post('actualizar-datos-generales/{id}', 'updateDatosGen');
    Route::post('eliminar-datos-generales/{id}', 'deleteDatoGeneral');
});

Route::controller(RecomendanteController::class)->group(function(){
    Route::post('agregar-recomendante', 'insertRecomendante');
    Route::post('actualizar-recomendante/{id}', 'updateRecomendante');
    Route::post('eliminar-recomendante/{id}', 'deleteDatRecomendante');
});
