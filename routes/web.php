<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\FrontProductsController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

Route::get('/front/products', [FrontProductsController::class, 'list'])->name('front.products.list');
Route::get('/front/products/{hashProduct}', [FrontProductsController::class, 'show'])->name('front.products.show');

Route::middleware([ 'auth:sanctum', 'verified', ])
    ->group(function () {
        Route::get('/dashboard', function () {
            return Inertia::render('Dashboard');
        })->name('dashboard');

        Route::get('/products', [ ProductsController::class, 'show' ])->name('products');
        Route::post('/product/remove', [ ProductsController::class, 'delete' ])->name('product.delete');
        Route::post('/product/edit', [ ProductsController::class, 'edit' ])->name('product.edit');
        Route::post('/product/add', [ ProductsController::class, 'add' ])->name('product.add');
});

