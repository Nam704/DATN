<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use App\Models\Role;
use PhpParser\Node\Stmt\Return_;

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
    function getFormAdd()
    { 
        return view('role.add');        
    }
    public function add(RoleRequest $req){
        $data = [
            'name' =>$req->name,
            'display_name'=>$req->display_name,
            'guard_name'=> "WEB"
        ];
        Role::create($data);
        return redirect()->route('admin.roles.list');
    }
    public function editRole($id){
        $editRole = Role::find($id);
        return view('role.edit',compact('editRole'));
    }
    public function edit($id,RoleRequest $req){
        $editRole = Role::find($id);

        $data = [
            'name' =>$req->name,
            'display_name'=>$req->display_name,
            'guard_name'=> "WEB"
        ];
        $editRole->update($data);
        return redirect()->route('admin.roles.list');
    }
    public function delete($id){
        $delete = Role::find($id);
        $delete->delete();
        return redirect()->route('admin.roles.list');

    }
}
