<?php

use App\Http\Controllers\BrancheController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use App\Models\subCategory;
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
    return view('welcome');
});
Route::get('/page', function () {
    return view('admin');
})->middleware(['auth']);

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/branche', BrancheController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/subcategory', SubCategoryController::class);
    Route::resource('/product',ProductController::class);
    
});
