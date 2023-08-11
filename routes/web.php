<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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


Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    //product module
    Route::get('/product',[ProductController::class,'index'])->name('admin.product.index');    
    //category module
    Route::get('/category',[CategoryController::class,'index'])->name('admin.category.index'); 
    Route::get('category/check_slug',[CategoryController::class,'checkslug'])->name('admin.category.checkslug'); 
    Route::post('/store',[CategoryController::class,'store'])->name('admin.category.store');
});

Route::get('/', [FrontController::class,'index'])->name('front.index');
// Route::get('/shop', [FrontController::class,'shop'])->name('front.shop');

require __DIR__.'/auth.php';
