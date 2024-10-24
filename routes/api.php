<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GlobalController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/protected-endpoint', function (Request $request) {
        return response()->json(['message' => 'This is a protected endpoint.']);
    });

    Route::get('/another-protected-endpoint', function (Request $request) {
        return response()->json(['message' => 'This is another protected endpoint.']);
    });
});


Route::post('/register',[GlobalController::class,'register'])->name('register');
Route::post('/login',[GlobalController::class,'login'])->name('login');
Route::put('/profile-update',[GlobalController::class,'profile_update'])->name('profile_update');

Route::post('/add-category',[CategoryController::class,'store'])->name('category.store');
Route::get('/get-category',[CategoryController::class,'get_category'])->name('category.get');
Route::delete('/category/{id}/delete',[CategoryController::class,'delete_category'])->name('category.delete');
Route::post('/category/{id}/edit',[CategoryController::class,'edit_category'])->name('category.edit');
Route::post('/category/{id}/update',[CategoryController::class,'update_category'])->name('category.update');

Route::get('/get-products',[ProductController::class,'get_products'])->name('product.get-products');
Route::post('/add-products',[ProductController::class,'add_products'])->name('product.add-products');
