<?php

use App\Http\Controllers\Api\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserHasRoleController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });




Route::get('/getUserRole/{userId}', [UserHasRoleController::class, 'getUserRole']);
Route::prefix('/categories')->group(function() {
Route::get('/transhed-category',[CategoryController::class, 'showTrashedCategories'])->name('showTrashedCategories');
Route::post('/restore/{id}',[CategoryController::class, 'restore'])->name('restore');


});