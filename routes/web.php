<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
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

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

Route::get('/products/index',[ProductController::class, 'index'])->name('products.index');

Route::get('/products/create',[ProductController::class, 'create'])->name('products.create');

Route::post('/products/store',[ProductController::class, 'store'])->name('products.store');

Route::get('/products/{product}',[ProductController::class, 'show'] )->name('product.show');

Route::get('/products/edit/{product}',[ProductController::class, 'edit'])->name('products.edit');

Route::get('/contattaci,' ,[ProductController::class, 'contactUs'])->name('mail.contactUs');

Route::post('/contattaci/submit' ,[ProductController::class, 'submit'])->name('submit');

Route::put('/products/update/{product}', [ProductController::class, 'update'])->name('products.update');

Route::delete('/products/delete/{product}', [ProductController::class, 'destroy'])->name('products.delete');

