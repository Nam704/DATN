<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    protected $user;
    function __construct()
    {
        $this->user = new User();
    }
    function listUser()
    {
        $users = $this->user->listUser();
        return view('user.list', compact('users'));
    }
}
