<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    protected $permission;
    function __construct()
    {
        $this->permission = new Permission();
    }
    function listPermission()
    {
        $permissions = $this->permission->listPermissionID();
        return response()->json(["permissions" => $permissions]);
    }
}
