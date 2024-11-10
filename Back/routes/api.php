<?php

use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\RoleHasPermissionController;
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



Route::prefix('role-has-permission')->group(function () {
    Route::post('/add', [RoleHasPermissionController::class, 'add']);
    Route::get('/list-permission-for-role-id/{id}', [RoleHasPermissionController::class, 'listPermissionForRoleID']);
});
Route::prefix('permissions')->name('permissions.')->group(function () {
    Route::get('/list', [PermissionController::class, 'listPermission'])->name('list');
});
Route::get('/getUserRole/{userId}', [UserHasRoleController::class, 'getUserRole']);
