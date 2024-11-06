<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    protected $permission;
    function __construct()
    {
        $this->permission = new Permission();
    }
    function listPermission()
    {
        $permissions = $this->permission->listPermission();
        return view('permission.list', compact('permissions'));
    }
}
