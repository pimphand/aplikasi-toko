<?php

use App\Http\Controllers\Admin\AgenController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\CalonCostumers;
use App\Http\Controllers\Admin\CostumerController;
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
//     return view('welcome');
// });

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['register' => false]);
// Auth::routes();

Route::prefix('admin')->group(function () {

    //group route with middleware "auth"
    Route::group(['middleware' => 'auth'], function () {

        //route dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');
        Route::resource('/products', ProductController::class,['as' => 'admin']);
        Route::resource('/orders', OrderController::class,['as' => 'admin']);
        Route::resource('/costumers', CostumerController::class,['as' => 'admin']);
        Route::resource('/transactions', TransactionController::class,['as' => 'admin']);
        Route::resource('/calonCostumers', CalonCostumers::class,['as' => 'admin']);
        Route::resource('/agens', AgenController::class,['as' => 'admin']);
    });
});
