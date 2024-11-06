<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\UserHasRole;

use Illuminate\Http\Request;
use App\Models\User;

class DecentralizationController extends Controller
{
    protected $user;
    function __construct()
    {
        $this->user = new User();
        $this->role = new Role();
    }
    function list()
    {

        $userRoles = UserHasRole::all();

        return view('decentralization.list', compact('userRoles'));
    }
    function getFormAdd()
    {
        $users = $this->user->query()->select('id', 'name')->get();
        $roles = $this->role->query()->select('id', 'display_name')->get();
        $userRoles = UserHasRole::with(['user', 'role'])->get(); // Lấy thông tin role của từng user


        return view('decentralization.add', compact('userRoles', 'users', 'roles'));
    }
}