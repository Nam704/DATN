<?php

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\DecentralizationController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RamController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoleHasPermissionController;
use App\Http\Controllers\RomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserHasRoleController;
use Database\Factories\CategoryFactory;
use Illuminate\Support\Facades\Hash;
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

Route::get('/', function () {
    return view('admin.dashboard');
})->name('dashboard');
Route::prefix('admin')->name('admin.')->group(function () {
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('list', [UserController::class, 'listUser'])->name('list');
        Route::get('/add', [UserController::class, 'getFormAdd'])->name('getFormAdd');
        Route::post('/add', [UserController::class, 'add'])->name('add');
        Route::delete('/delete/{user}', [UserController::class, 'destroy'])->name('destroy');
        Route::get('/update/{user}', [UserController::class, 'getFormUpdate'])->name('getFormUpdate');
        Route::put('/update/{user}', [UserController::class, 'editUser'])->name('update');
    });
    Route::prefix('roles')->name('roles.')->group(function () {
        Route::get('list', [RoleController::class, 'listRole'])->name('list');
        Route::get('/add', [RoleController::class, 'getFormAdd'])->name('getFormAdd');
        Route::post('/add',[RoleController::class,'add'])->name('add');
        Route::get('/edit/{id}', [RoleController::class, 'editRole'])->name('editRole');
        Route::put('/edit/{id}',[RoleController::class,'edit'])->name('edit');
        Route::delete('/delete/{id}',[RoleController::class,'delete'])->name('delete');
    
    
    });
    Route::prefix('permissions')->name('permissions.')->group(function () {
        Route::get('list', [PermissionController::class, 'listPermission'])->name('list');
        Route::get('/add', [PermissionController::class, 'getFormAdd'])->name('getFormAdd');
        Route::post('/add',[PermissionController::class,'add'])->name('add');
        Route::get('/edit/{id}', [PermissionController::class, 'editPermission'])->name('editPermission');
        Route::put('/edit/{id}',[PermissionController::class,'edit'])->name('edit');
        Route::delete('/delete/{id}',[PermissionController::class,'delete'])->name('delete');
    



    });
    Route::prefix('role-has-permission')->name('rolePermissions.')->group(
        function () {
            Route::get('/add', [RoleHasPermissionController::class, 'getFormAdd'])->name('getFormAdd');
            Route::get('/edit/{id}', [RoleHasPermissionController::class, 'getFormEdit'])->name('getFormEdit');


            Route::get('/list', [RoleHasPermissionController::class, 'list'])->name('list');
        }
    );
    Route::prefix('user-has-role')->name('userRoles.')->group(
        function () {

            Route::get('/list', [UserHasRoleController::class, 'list'])->name('list');
        }
    );
    Route::prefix('decentralization')->name('decentralization.')->group(
        function () {

            Route::get('/list', [DecentralizationController::class, 'list'])->name('list');
            Route::get('/add', [DecentralizationController::class, 'getFormAdd'])->name('getFormAdd');
            Route::post('/add', [DecentralizationController::class, 'add'])->name('add');
        }
    );
    Route::get('login', [AuthenticateController::class, 'getFormLogin'])->name('getFormLogin');
    Route::post('login', [AuthenticateController::class, 'login'])->name('login');

    Route::prefix('category')->name('category.')->group(
        function () {
            Route::get('/list', [CategoryController::class, 'list'])->name('list');
            Route::get('/add', [CategoryController::class, 'getFormAdd'])->name('getFormAdd');
            Route::post('/addCategory', [CategoryController::class, 'add'])->name('add');
            Route::get('/edit/{id}', [CategoryController::class, 'editCategory'])->name('editCategory');
            Route::put('/editCategory/{id}', [CategoryController::class, 'edit'])->name('edit');
            Route::delete('/deleteCategory/{id}', [CategoryController::class, 'delete'])->name('delete');
            Route::get('/restore/{id}', [CategoryController::class, 'restore'])->name('restore');
        }
    );
    Route::prefix('rams')->name('rams.')->group(
        function () {
            Route::get('/list', [RamController::class, 'list'])->name('list');
            Route::get('/getFormAdd', [RamController::class, 'getFormAdd'])->name('getFormAdd');
            Route::post('/add', [RamController::class, 'add'])->name('add');
            Route::get('/edit/{id}', [RamController::class, 'editRam'])->name('editRam');
            Route::put('/edit/{id}', [RamController::class, 'edit'])->name('edit');
            Route::delete('/delete/{id}', [RamController::class, 'delete'])->name('delete');
        }
    );
    Route::prefix('roms')->name('roms.')->group(
        function () {
            Route::get('/list', [RomController::class, 'list'])->name('list');
            Route::get('/getFormAdd', [RomController::class, 'getFormAdd'])->name('getFormAdd');
            Route::post('/add', [RomController::class, 'add'])->name('add');
            Route::get('/edit/{id}', [RomController::class, 'editRom'])->name('editRom');
            Route::put('/edit/{id}', [RomController::class, 'edit'])->name('edit');
            Route::delete('/delete/{id}', [RomController::class, 'delete'])->name('delete');
        }
    );

    Route::prefix('colors')->name('colors.')->group(
        function(){
            Route::get('/list',[ColorController::class, 'list'])->name('list');
            Route::get('/getFormAdd', [ColorController::class, 'getFormAdd'])->name('getFormAdd');
            Route::post('/add', [ColorController::class, 'add'])->name('add');
            Route::get('/edit/{id}', [ColorController::class, 'editColor'])->name('editColor');
            Route::put('/edit/{id}', [ColorController::class, 'edit'])->name('edit');
            Route::delete('/delete/{id}',[ColorController::class, 'deleteColor'])->name('deleteColor');

        }
    );
    Route::prefix('brands')->name('brands.')->group(
        function(){
            Route::get('/list',[BrandController::class, 'list'])->name('list');
            Route::get('/getFormAdd', [BrandController::class, 'getFormAdd'])->name('getFormAdd');
            Route::post('/add', [BrandController::class, 'add'])->name('add');
            Route::get('/edit/{id}', [BrandController::class, 'editBrand'])->name('editBrand');
            Route::put('/edit/{id}', [BrandController::class, 'edit'])->name('edit');
            Route::delete('/delete/{id}',[BrandController::class, 'deleteBrand'])->name('deleteBrand');

        }
    );
    Route::prefix('images')->name('images.')->group(
        function(){
            Route::get('/list',[ImageController::class, 'list'])->name('list');
            Route::get('/getFormAdd', [ImageController::class, 'getFormAdd'])->name('getFormAdd');
            Route::post('/add', [ImageController::class, 'add'])->name('add');
            // Route::get('/edit/{id}', [ImageController::class, 'editImage'])->name('editImage');
            // Route::put('/edit/{id}', [ImageController::class, 'edit'])->name('edit');
            // Route::delete('/delete/{id}',[ImageController::class, 'deleteBrand'])->name('deleteBrand');

        }
    );
});
