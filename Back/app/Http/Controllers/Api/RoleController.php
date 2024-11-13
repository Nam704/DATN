<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function showTrashedRole(){
        $showTrashedRole = Role::onlyTrashed()->get();
        return response()->json([
            'data' => $showTrashedRole
        ]);
    }
    public function restore($id){
        $role = Role::withTrashed()->find($id);
        $role->restore();
    }
}
