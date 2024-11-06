<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    protected $role;
    function __construct()
    {
        $this->role = new Role();
    }
    function listRole()
    {
        $roles = $this->role->listRole();
        return view('role.list', compact('roles'));
    }
}
