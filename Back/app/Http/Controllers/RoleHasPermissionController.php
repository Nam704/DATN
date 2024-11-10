<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RoleHasPermission;
use Illuminate\Http\Request;

class RoleHasPermissionController extends Controller
{

    protected $permission;
    protected $roles;
    function __construct()
    {
        $this->permission = new Permission();
        $this->role = new Role();
    }

    function list()
    {
        $rolePermissions = RoleHasPermission::with(['role', 'permission'])->get();
        return view('role_has_permission.list', compact('rolePermissions'));
    }
    function getFormAdd()
    {

        $permissions = $this->permission->listPermission();
        $roles = $this->role->listRole();
        return view('role_has_permission.add', compact('permissions', 'roles'));
    }
}
