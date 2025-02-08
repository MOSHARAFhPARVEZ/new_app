<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/merchants/dashboard', [MerchantController::class, 'MerchantsDashboard'])->name('merchants.dashboard');



Route::prefix('admin/')->middleware('auth')->name('admin.')->group(function () {
    Route::get('/merchant-list', [AdminController::class, 'MerchantList'])->name('merchant.list');
});





Route::prefix('merchant/')->middleware('auth')->name('merchant.')->group(function () {
    Route::get('/store-list', [StoreController::class, 'MerchantStoreList'])->name('store.list');
    Route::post('/store-add', [StoreController::class, 'MerchantAddList'])->name('store.add');
    Route::get('/store-destroy-{id}', [StoreController::class, 'MerchantStoreDestroy'])->name('store.destroy');
    Route::get('/store-details-{id}', [StoreController::class, 'MerchantStoreDetails'])->name('store.details');
});


Route::prefix('merchant/')->middleware('auth')->name('merchant.')->group(function () {
    Route::get('/category-list', [CategoryController::class, 'MerchantCategoryList'])->name('category.list');
    Route::post('/category-add', [CategoryController::class, 'MerchantCategoryAdd'])->name('category.add');
    Route::get('/category-destroy-{id}', [CategoryController::class, 'MerchantCategoryDestroy'])->name('category.destroy');
});


Route::prefix('merchant/')->middleware('auth')->name('merchant.')->group(function () {
    Route::get('/product-list', [ProductController::class, 'MerchantProductList'])->name('product.list');
    Route::post('/product-add', [ProductController::class, 'MerchantProductAdd'])->name('product.add');
    Route::get('/product-destroy-{id}', [ProductController::class, 'MerchantProductDestroy'])->name('product.destroy');

});
