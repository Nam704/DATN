<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserHasRole;
use Illuminate\Http\Request;

class UserHasRoleController extends Controller
{
    public function getUserRole($userId)
    {
        // Tìm role cho user theo ID
        $userRole = UserHasRole::where('user_id', $userId)->first();

        if ($userRole) {
            return response()->json(['role_id' => $userRole->role_id]);
        }

        return response()->json(['role_id' => null]); // Trả về null nếu không tìm thấy
    }
}