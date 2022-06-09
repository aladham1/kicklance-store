<?php


use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
return view('store.index');
});

Route::group([
    'prefix' => 'dashboard',
    'middleware'=>['auth']
], function () {
    Route::resource('products', ProductController::class);


    Route::name('categories.')
        ->controller(CategoryController::class)->group(function () {
            Route::get('categories', 'index')->name('index');
            Route::get('categories/create', 'create')->name('create');
            Route::get('categories/{category}/edit', 'edit')->name('edit');
            Route::post('categories/create', 'store')->name('store');
            Route::put('categories/{category}', 'update')->name('update');
            Route::delete('categories/{category}', 'destroy')->name('destroy');
        });

});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
