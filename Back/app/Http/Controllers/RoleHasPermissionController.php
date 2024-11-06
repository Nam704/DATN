<?php

namespace App\Http\Controllers;

use App\Models\RoleHasPermission;
use Illuminate\Http\Request;

class RoleHasPermissionController extends Controller
{
    function list()
    {
        $rolePermissions = RoleHasPermission::with(['role', 'permission'])->get();
        return view('role_has_permission.list', compact('rolePermissions'));
    }
}
