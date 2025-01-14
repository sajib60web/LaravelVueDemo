<?php

use App\Http\Controllers\Api\ComponentController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\FileUploadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('customers', CustomerController::class);
Route::get('search/customer/{field}/{query}', [CustomerController::class, 'search']);

Route::apiResource('components', ComponentController::class);


Route::post('/upload', [FileUploadController::class, 'upload']);
