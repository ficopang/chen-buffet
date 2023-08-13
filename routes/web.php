<?php

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

Route::get('/', [TransactionController::class, 'showTransaction'])->name('read-transaction');
Route::get('/transaction/insert', [TransactionController::class, 'showInsertPage'])->name('create-transaction-page');
Route::post('/transaction/insert', [TransactionController::class, 'insertTransaction']);
Route::get('/transaction/detail/{id}', [TransactionController::class, 'showDetail'])->name('detail-transaction');

Route::group(['prefix'=>'manage'], function() {
    Route::group(['prefix'=>'cashiers'], function() {
        Route::get('', [TransactionController::class, 'showCashier'])->name('read-cashier');
        Route::post('', [TransactionController::class, 'insertCashier']);
        Route::group(['prefix' => 'delete/{id}'], function () {
            Route::delete('', [TransactionController::class, 'deleteCashier'])->name('delete-cashier');
        });
        Route::group(['prefix'=>'edit/{id}'], function() {
            Route::get('', [TransactionController::class, 'showEditCashier'])->name('edit-cashier');
        });
        Route::group(['prefix' => 'edit/{id}'], function () {
            Route::put('', [TransactionController::class, 'updateCashier']);
        });
    });

    Route::group(['prefix'=>'categories'], function() {
        Route::get('', [TransactionController::class, 'showCategory'])->name('read-category');
        Route::post('', [TransactionController::class, 'insertCategory']);
        Route::group(['prefix' => 'delete/{id}'], function () {
            Route::delete('', [TransactionController::class, 'deleteCategory'])->name('delete-category');
        });
        Route::group(['prefix'=>'edit/{id}'], function() {
            Route::get('', [TransactionController::class, 'showEditCategory'])->name('edit-category');
        });
        Route::group(['prefix' => 'edit/{id}'], function () {
            Route::put('', [TransactionController::class, 'updateCategory']);
        });
    });

    Route::group(['prefix'=>'foods'], function() {
        Route::get('', [TransactionController::class, 'showFood'])->name('read-food');
        Route::post('', [TransactionController::class, 'insertFood']);
        Route::group(['prefix' => 'delete/{id}'], function () {
            Route::delete('', [TransactionController::class, 'deleteFood'])->name('delete-food');
        });
        Route::group(['prefix'=>'edit/{id}'], function() {
            Route::get('', [TransactionController::class, 'showEditFood'])->name('edit-food');
        });
        Route::group(['prefix' => 'edit/{id}'], function () {
            Route::put('', [TransactionController::class, 'updateFood']);
        });
    });

    Route::group(['prefix'=>'payment-types'], function() {
        Route::get('', [TransactionController::class, 'showPaymentType'])->name('read-payment-type');
        Route::post('', [TransactionController::class, 'insertPaymentType']);
        Route::group(['prefix' => 'delete/{id}'], function () {
            Route::delete('', [TransactionController::class, 'deletePaymentType'])->name('delete-payment-type');
        });
        Route::group(['prefix'=>'edit/{id}'], function() {
            Route::get('', [TransactionController::class, 'showEditPaymentType'])->name('edit-payment-type');
        });
        Route::group(['prefix' => 'edit/{id}'], function () {
            Route::put('', [TransactionController::class, 'updatePaymentType']);
        });
    });
});
