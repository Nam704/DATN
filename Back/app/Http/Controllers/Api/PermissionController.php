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
        $permissions = $this->permission->onlyTrashed()->get();
        return response()->json(["data" => $permissions]);

       
    }
    function restore($id)
    {
        $permission = $this->permission->withTrashed()->find($id);
        $permission->restore();
    }
}
