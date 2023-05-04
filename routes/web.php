<?php

use App\Http\Controllers\NasabahController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin.index');
});

Route::get("/nasabah", [NasabahController::class, "index"]);
Route::get("/nasabah/create", [NasabahController::class, "create"]);
Route::post("/nasabah", [NasabahController::class, "store"]);

Route::get("/transaksi", [TransaksiController::class, "index"]);
Route::get("/transaksi/create", [TransaksiController::class, "create"]);
Route::post("/transaksi", [TransaksiController::class, "store"]);

Route::get("/nasabah/point", [NasabahController::class, "point"]);
Route::get("/cetak_transaksi", [TransaksiController::class, "report"]);
Route::get("/cetak_transaksi/cetak", [TransaksiController::class, "print"]);
