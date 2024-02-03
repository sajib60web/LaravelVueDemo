<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageWatermarkController;
use App\Http\Controllers\ImportExcelController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/customers', [HomeController::class, 'customers'])->name('customers');
Route::get('/components', [HomeController::class, 'components'])->name('components');

Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::get('members', [MemberController::class, 'index'])->name('members');
Route::get('image_watermark', [MemberController::class, 'index'])->name('members');
Route::resource('image_watermark', ImageWatermarkController::class);
Route::resource('import_excel', ImportExcelController::class);
