<?php

namespace App\Http\Controllers;

use App\Models\UserHasRole;
use Illuminate\Http\Request;

class UserHasRoleController extends Controller
{
    function list()
    {
        $userRoles = UserHasRole::with(['user', 'role'])->get();
        return view('user_has_role.list', compact('userRoles'));
    }
}
