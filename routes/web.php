<?php

use App\Http\Controllers\SuppliersController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();


/*
            Redirect user to login/register if registered they get redirected to dashboard
*/

Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('home')->middleware(['auth', 'isAdmin']);

//Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');

/*
            Admin login route
*/

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {

    /*        CRUD operations for supplier model
    */

    Route::resource('supplier', SuppliersController::class);
    Route::get('/add-supplier-route', [App\Http\Controllers\SuppliersController::class, 'addSupplier']);

    /*        CRUD operations for merchants model
    */

    Route::resource('merchant', \App\Http\Controllers\MerchantController::class);
    Route::get('/add-merchant-route', [App\Http\Controllers\MerchantController::class, 'addMerchant']);

    /*        CRUD operations for purchase order model
    */

    Route::resource('purchase', \App\Http\Controllers\PurchaseOrderController::class);
    Route::get('/add-purchase-route', [App\Http\Controllers\PurchaseOrderController::class, 'addPurchase']);
    Route::get('edit_product/{product_name}', [\App\Http\Controllers\PurchaseOrderController::class, 'editProduct']);
});

/*
            Merchant functionalities,
*/

Route::resource('order', \App\Http\Controllers\MerchantBuyerController::class);
Route::get('/merchant-dashboard', [App\Http\Controllers\MerchantBuyerController::class, 'merchdashboard']);
Route::get('/registered-suppliers', [App\Http\Controllers\MerchantBuyerController::class, 'registeredredirect']);

/*
            Requested orders route and operations
*/
Route::resource('requested', \App\Http\Controllers\RequestedOrdersController::class);
