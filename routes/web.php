<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\CheckUserType;
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


Route::get('/', [HomeController::class,'index'])->name('store');
Route::get('products/{id}', [\App\Http\Controllers\ProductController::class,'show'])
    ->name('store.products.show');

Route::get('cart', [CartController::class,'index'])->name('cart');
Route::get('checkout', [CartController::class,'checkout'])->name('checkout');
Route::post('checkout', [OrderController::class,'store'])->name('checkout');
Route::get('cart-item-destroy/{id}',
    [CartController::class,'itemDestroy'])->name('cart.item.destroy');
Route::post('cart', [CartController::class,'store']);
Route::put('cart', [CartController::class,'update'])->name('cart.update');
Route::delete('cart', [CartController::class,'destroy'])->name('cart.destroy');

Route::group([
    'prefix' => 'dashboard',
    'middleware' => ['auth:admin,web', 'check.type'],
], function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('products', ProductController::class);
    Route::delete('products/image/{id}', [ProductController::class,'destroyImage'])
        ->name('products.images.destroy');

    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::get('tags-products/{id}', [ProductController::class,'tags'])
        ->name('tags.products');


    Route::name('categories.')
        ->controller(CategoryController::class)->group(function () {
            Route::get('categories', 'index')->name('index');
            Route::get('categories/create', 'create')->name('create');

            Route::get('categories/trashed', 'getTrashed')->name('trashed');
            Route::get('categories/{id}', 'show')->name('show');


            Route::get('categories/{category}/edit', 'edit')->name('edit');
            Route::post('categories/create', 'store')->name('store');
            Route::put('categories/restore/{category}', 'restoreCategory')->name('restore');
            Route::put('categories/{category}', 'update')->name('update');
            Route::delete('categories/{category}', 'destroy')->name('destroy');
            Route::delete('categories/force-delete/{category}',
                'forceDeleteCategory')->name('force_delete');

        });

});



require __DIR__.'/auth.php';
//
//
//Route::group([
//    'prefix' => 'admin',
//    'as' => 'admin.'
//], function () {
//    require __DIR__.'/auth.php';
//});
