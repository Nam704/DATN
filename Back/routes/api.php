<?php

use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\RoleHasPermissionController;

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ColorController;
use App\Http\Controllers\Api\RamController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\RomController;

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


Route::get('/getUserRole/{userId}', [UserHasRoleController::class, 'getUserRole']);
Route::prefix('/categories')->group(function() {
Route::get('/transhed-category',[CategoryController::class, 'showTrashedCategories'])->name('showTrashedCategories');
Route::post('/restore/{id}',[CategoryController::class, 'restore'])->name('restore');

});

Route::prefix('/rams')->group(function() {
    Route::get('/transhed-ram',[RamController::class, 'showTrashedRam'])->name('showTrashedRam');
    Route::post('/restore/{id}',[RamController::class, 'restore'])->name('restore');
    
});
Route::prefix('/roms')->group(function() {
    Route::get('/transhed-rom',[RomController::class, 'showTrashedRom'])->name('showTrashedRom');
    Route::post('/restore/{id}',[RomController::class, 'restore'])->name('restore');
    
});

Route::prefix('/colors')->group(function(){
    Route::get('/tranShed-color', [ColorController::class, 'showTranshedColor'])->name('showTranshedColor');
    Route::post('/restore/{id}', [ColorController::class, 'restore'])->name('restore');
});

Route::prefix('/brands')->group(function(){
    Route::get('/tranShed-brand', [BrandController::class, 'showTranshedBrand'])->name('showTranshedColor');
    Route::post('/restore/{id}', [BrandController::class, 'restore'])->name('restore');
});
Route::prefix('/roles')->group(function(){
    Route::get('/trashed-role', [RoleController::class, 'showTrashedRole'])->name('showTrashedRole');
    Route::post('/restore/{id}', [RoleController::class, 'restore'])->name('restore');
});

