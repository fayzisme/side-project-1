<?php


use App\Http\Controllers\DataUsercontroller;
use App\Http\Controllers\RiwayatController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\PenyakitController;

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

Route::get('/diagnosa', function () {
    return view('diagnosa');
});
Route::get('/landingPage', function () {
    return view('landingPage');
});
Route::get('/informasi', function () {
    return view('informasi');
});
Route::get('/result', function () {
    return view('result');
});


Route::post('/diagnosas', [DataUsercontroller::class, 'diagnosa'])->name('diagnosas');

Route::post('/result', [DataUsercontroller::class, 'result'])->name('result');

Route::post('/diagnosa', [DataUsercontroller::class, 'simpanData'])->name('simpanData');

Route::post('/riwayats', [DataUsercontroller::class, 'riwayats'])->name('riwayats');


Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home.index');

    Route::resource('home',HomeController::class);
    Route::resource('gejala',GejalaController::class);
    Route::resource('riwayat',RiwayatController::class);
    Route::resource('penyakit',PenyakitController::class);

});
