<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\AdminController;

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



Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home.index');

    Route::resource('home',HomeController::class);
    Route::resource('gejala',GejalaController::class);
    Route::resource('penyakit',PenyakitController::class);
    Route::resource('riwayat',RiwayatController::class);
    Route::resource('admin',AdminController::class);
});
