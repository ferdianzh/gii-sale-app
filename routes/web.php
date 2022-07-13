<?php

use App\Http\Controllers\InventoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransactionController;
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

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('auth', [LoginController::class, 'auth'])->name('auth');

Route::middleware('auth')->group(function () {
    Route::get('/', [InventoryController::class, 'index'])->name('main');
    Route::get('/inventories/add', [InventoryController::class, 'add']);
    Route::post('/inventories/add', [InventoryController::class, 'store']);
    Route::get('/inventories/{id}/delete', [InventoryController::class, 'delete']);
    
    Route::get('/transactions/beli', [TransactionController::class, 'beli'])->name('beli');
    Route::post('/transactions/beli', [TransactionController::class, 'storeBeli']);
    Route::get('/transactions/jual', [TransactionController::class, 'jual'])->name('jual');
    Route::post('/transactions/jual', [TransactionController::class, 'storeJual']);

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});

// Route::get('/', [InventoryController::class, 'index'])->name('main');