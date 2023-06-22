<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\WalletController;

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

Route::get('clients', [ClientController::class, 'getClients']);
Route::post('clients', [ClientController::class, 'createClient']);
Route::delete('clients/{id}', [ClientController::class, 'deleteClient']);

Route::delete('wallet/{id}', [WalletController::class, 'deleleWallet']);

Route::post('wallet', [WalletController::class, 'updateWallet']);
