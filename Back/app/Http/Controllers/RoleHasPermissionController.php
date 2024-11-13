<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RoleHasPermission;
use Illuminate\Http\Request;

class RoleHasPermissionController extends Controller
{

    protected $permission;
    protected $role;
    protected $roleHasPermission;

    function __construct()
    {
        $this->permission = new Permission();
        $this->role = new Role();
        $this->roleHasPermission = new RoleHasPermission();
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
    function getFormEdit($id)
    {
        $role = $this->role->query()->find($id);
        $listIdPermissions = $this->roleHasPermission->listPermissionForRoleID($role->id);
        $permission = $this->permission;
        // dd($permission);
        return view('role_has_permission.edit', compact('listIdPermissions', 'role', 'permission'));
    }
}
