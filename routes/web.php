<?php

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

// Route::get('/', function () {
//     return view('index');
// });

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users', App\Http\Controllers\UserController::class)->middleware('auth');

Route::resource('karyawan', \App\Http\Controllers\KaryawanController::class)->middleware('auth');

Route::resource('pelanggan', \App\Http\Controllers\PelangganController::class)->middleware('auth');

Route::resource('reservasi', \App\Http\Controllers\ReservasiController::class)->middleware('auth');

Route::resource('daftarpaket', \App\Http\Controllers\DaftarPaketController::class)->middleware('auth');

Route::resource('paketwisata', \App\Http\Controllers\PaketWisataController::class)->middleware('auth');

Route::resource('laporan', App\Http\Controllers\LaporanController::class, )->middleware('auth');

Route::get('/exportlaporan', 'App\Http\Controllers\LaporanController@exportPDF', );

Route::get('/', [App\Http\Controllers\PostLandingController::class, 'index']);

Route::get('destination', [App\Http\Controllers\PostLandingController::class, 'daftarpaketshow'])->name('destination');

Route::get('destination/paket{id}', [App\Http\Controllers\PostLandingController::class, 'paketshow'])->name('paket') ;

Route::get('contact', [App\Http\Controllers\PostLandingController::class, 'contact'])->name('contact');
// Auth::routes();

// Route::get('/home', function() {
//     return view('home');
// })->name('home')->middleware('auth');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::group(['middleware' => ['auth']], function() {
    /**
    * Logout Route
    */
    Route::get('logout', [App\Http\Controllers\PostLandingController::class, 'perform'])->name('logout');
 });