<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\TransactionController;
use App\Models\Transaction;
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

Route::prefix('gejala')->group( function(){
    Route::get('/list', [GejalaController::class, 'api'])->name('api.gejala.list');
});

Route::prefix('penyakit')->group( function(){
    Route::get('/list', [PenyakitController::class, 'api'])->name('api.penyakit.list');
});

Route::prefix('admin')->group( function(){
    Route::get('/list', [AdminController::class, 'api'])->name('api.admin.list');
});

Route::prefix('penilaian')->group( function(){
    Route::get('/list', [PenilaianController::class, 'api'])->name('api.penilaian.list');
});

Route::prefix('riwayat')->group( function(){
    Route::get('/list', [RiwayatController::class, 'api'])->name('api.riwayat.list');
});

Route::get('/permissions', function () {
    $data = cekRolePermission();
    return compact('data');
})->name('api.role');
