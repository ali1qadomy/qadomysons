<?php

use App\Http\Controllers\BrancheController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\testController;
use App\Models\Role;
use App\Models\subCategory;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

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



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Auth::routes();
        Route::get('/page', function () {
            return view('admin');
        })->middleware(['auth']);
        Route::middleware('auth')->group(function () {
            Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
            Route::resource('/branche', BrancheController::class);
            Route::resource('/category', CategoryController::class);
            Route::resource('/subcategory', SubCategoryController::class);
            Route::resource('/product', ProductController::class);
            Route::get('/profile', [profileController::class, 'index'])->name('index');
            //      Route::post('/profile', [profileController::class, 'update'])->name('profile.edit');            
            Route::post('/profile', [profileController::class, 'editUser'])->name('profile.editUser');
            Route::get('/test', [testController::class, 'test'])->name('test');
        });
    }
);
