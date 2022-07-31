<?php

use App\Http\Controllers\api\UserController;
use App\Http\Controllers\CategoryController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::middleware('auth:api')->group(function () {
    Route::put('updateCategory', [CategoryController::class, 'updateCategory']);
    Route::delete('deleteCategory', [CategoryController::class, 'deleteCategory']);
    Route::get('categoryApi', [CategoryController::class, 'getCategory']);
    });

Route::post('user/rigister', [UserController::class, 'register']);
Route::post('user/login', [UserController::class, 'login']);
Route::post('addCategory', [CategoryController::class, 'addCategory']);