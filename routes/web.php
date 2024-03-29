<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KendaraanMasukController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', function () {
    return view('layouts.layout.master');
});

Route::resource('kendaraanmasuk', KendaraanMasukController::class);
Route::get('/export_kendaraanmasuk', [App\Http\Controllers\KendaraanMasukController::class, 'exportPdf']);