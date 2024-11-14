<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserHasRole;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class DecentralizationController extends Controller
{
    protected $userRole;
    protected $user;
    protected $role;

    function __construct()
    {
        $this->userRole = new UserHasRole();
        $this->user = new User();
    }
    function edit(Request $request)
    {

        $role_id = $request->input("role_id");
        $user_id = $request->input("user_id");
        if ($this->userRole->isUserHasRoleExist($role_id, $user_id)) {
            $data = "exist";
            return response()->json([
                "data" => $data,
                "message" => "user has been add with this role"
            ]);
        }

        $data = [
            "role_id" => $role_id,

        ];
        $userRole = $this->userRole->findThisByUserId($user_id);
        $newUserRole = $userRole->update($data);
        // $newUserRole = $userRole;

        return response()->json([
            "data" => $newUserRole,
            "message" => "updated successfully"
        ]);
    }
    function lockActiveUser(Request $request)
    {
        $idUser = $request->input("id_user");
        $user = $this->user->query()->find($idUser);
        return response()->json([
            "data" => $user
        ]);
    }
}
