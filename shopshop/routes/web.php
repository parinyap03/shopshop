<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\ProductController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/myshop', [WebController::class,'myshop'])->name('web.myshop');

Route::resource('products', ProductController::class);
Route::get('/add-to-cart/{product_id}',
    [ProductController::class, 'add_to_cart'])->name('add_to_cart');
Route::get('/remove-from-cart/{product_id}',
    [ProductController::class, 'remove_from_cart'])->name('remove_from_cart');
Route::get('/empty-cart',
    [ProductController::class, 'empty_cart'])->name('empty_cart');
Route::get('/create-sale',
    [SaleController::class, 'create'])->name('create_sale');
Route::post('/store-sale',
    [SaleController::class, 'store'])->name('store_sale');
require __DIR__.'/auth.php';
