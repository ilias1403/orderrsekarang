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

Route::get('/', function () 
{
    return view('welcome');
});

Route::get('muka_depan', [App\Http\Controllers\BorangController::class, 'index']);

Route::get('borang_pesanan', [App\Http\Controllers\BorangController::class, 'borang'])->name('borang');

Route::get('{code}', [App\Http\Controllers\BorangController::class, 'url'])->name('url');

Route::post('send_borang', [App\Http\Controllers\BorangController::class, 'send_borang'])->name('send_borang');



