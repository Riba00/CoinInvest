<?php

use App\Http\Controllers\CryptoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepositsController;
use App\Http\Controllers\WalletController;
use App\Http\Middleware\CheckAdminRole;
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

Route::get('terms', function() {
    return view('terms');
})->name('terms.show');

Route::get('policy', function() {
    return view('policy');
})->name('policy.show');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //DEPOSITS
    Route::get('/deposits',[DepositsController::class,'index'])->name('deposits.index');
    Route::post('/deposits',[DepositsController::class,'store']);
    Route::get('/deposits/{id}',[DepositsController::class,'edit'])->name('deposits.edit');
    Route::post('/deposits/{id}',[DepositsController::class,'update']);
    Route::delete('deposits/{id}',[DepositsController::class,'destroy']);

    //WALLET
    Route::get('/wallet',[WalletController::class, 'index'])->name('wallet.index');
    Route::get('/wallet/{id}' ,[WalletController::class, 'show'])->name('wallet.show');


    Route::middleware([CheckAdminRole::class])->group(function () {
        //CRYPTO
        Route::get('/cryptos',[CryptoController::class, 'index'])->name('cryptos.index');
        Route::post('/cryptos',[CryptoController::class,'store']);
        Route::get('/cryptos/{id}',[CryptoController::class,'edit'])->name('cryptos.edit');
        Route::post('/cryptos/{id}',[CryptoController::class,'update']);
        Route::delete('cryptos/{id}',[CryptoController::class,'destroy']);
    });


});

Route::fallback(function () {
    return view('404');
});
