<?php

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\DecentralizationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoleHasPermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserHasRoleController;
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
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('list', [UserController::class, 'listUser'])->name('list');
    });
    Route::prefix('roles')->name('roles.')->group(function () {
        Route::get('list', [RoleController::class, 'listRole'])->name('list');
    });
    Route::prefix('permissions')->name('permissions.')->group(function () {
        Route::get('list', [PermissionController::class, 'listPermission'])->name('list');
    });
    Route::prefix('role-has-permission')->name('rolePermissions.')->group(
        function () {
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
});
