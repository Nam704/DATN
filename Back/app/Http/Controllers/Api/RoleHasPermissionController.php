<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoleHasPermission;

class RoleHasPermissionController extends Controller
{
    protected $roleHasPermission;
    function __construct()
    {
        $this->roleHasPermission = new RoleHasPermission();
    }
    function listPermissionForRoleID($id)
    {
        $listPermissionForRole = $this->roleHasPermission->find($id)->listPermissionForRoleID($id);
        if ($listPermissionForRole) {
            return response()->json(["listPermissionForRole" => $listPermissionForRole], 200);
        }
        return response()->json(["listPermissionForRole" => null]);
    }
    function add(Request $request)
    {
        $idRole = $request->input('role_id');

        $idPermission = $request->input('permission_id');
        if ($this->roleHasPermission->isExist($idRole, $idPermission)) {
            return response()->json([
                "message" => "added errors, permission has been added"
            ]);
        }
        // You need to check if the values of a and b already exist in the database
        $data = [
            "role_id" => $idRole,
            "permission_id" => $idPermission
        ];
        $this->roleHasPermission->create($data);
        return response()->json([
            "message" => "added successfully"
        ]);
    }
}
