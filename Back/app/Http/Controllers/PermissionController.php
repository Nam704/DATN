<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    protected $permission;
    function __construct()
    {
        
        $this->permission = new Permission();
    }
    function listPermission()
    {
        $permissions = $this->permission->listPermission();
        return view('permission.list', compact('permissions'));
    }
    public function getFormAdd(){ 
        return view('permission.add');
    }
    public function add(PermissionRequest $req){
        $data = [
            'name' =>$req->name,
            'display_name' => $req->display_name,
            'guard_name'=> "WEB"
        ];
        Permission::create($data);
        return redirect()->route('admin.permissions.list');
    }
    public function editPermission($id){
        $editPermission = $this->permission->find($id);
        return view('permission.edit',compact('editPermission'));
    }
    public function edit($id,PermissionRequest $req){
        $editPermission = $this->permission->find($id);

        $data = [
            'name' =>$req->name,
            'display_name'=>$req->display_name,
            'guard_name'=> "WEB"
        ];
        $editPermission->update($data);
        return redirect()->route('admin.permissions.list');
    }
    public function delete($id){
        $delete = $this->permission->find($id);
        $delete->delete();
        return redirect()->route('admin.permissions.list');

    }
   
}


