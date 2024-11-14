<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $user;
    function __construct()
    {
        $this->user = new User();
    }
    function edit(Request $request)
    {

        $idUser = $request->input("user_id");
        $user = $this->user->query()->find($idUser);
        $user->changeStatusUser($user->status);
        return response()->json([
            "data" => $idUser,
            "message" => "true"
        ]);
    }
}