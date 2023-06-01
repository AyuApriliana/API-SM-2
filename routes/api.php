<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanController;

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

Route::get('laporan',[LaporanController::class,'index']);
Route::post('laporan',[LaporanController::class,'store']);
Route::get('laporan/{id}',[LaporanController::class,'show']);
Route::post('laporan/{id}',[LaporanController::class,'update']);
Route::delete('laporan/{id}',[LaporanController::class,'destroy']);
