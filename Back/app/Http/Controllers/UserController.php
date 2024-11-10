<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
    function getFormAdd()
    {
        return view('user.add');
    }
    function add(Request $request)
    {
        $data = [
            "name" => $request->name,
            "email" => $request->email,
            // "password" => Hash::make($request->password),
            "status" => $request->status

        ];
        User::create($data);
        return redirect()->route('admin.users.list');
    }
    function destroy(User $user)
    {


        $user = User::find($id);
        if (!$user) {
            return redirect()->route('users.users-list')->with(['errors' => 'User not found']);
        }
        if ($user->image && File::exists($user->image)) {
            File::delete(public_path($user->image));
        }
        $check = $user->delete();
        if ($check) {
            return redirect()->route('users.user-list')->with(['success' => 'Delete user successfully']);
        } else {
            return redirect()->route('users.user-list')->with(['errors' => 'Delete user error']);
        }
    }
    function getFormUpdate(User $user)
    {
        // dd($user);
        return view('user.edit', compact('user'));
    }
    function editUser(Request $request, User $user)
    {

        $user = User::find($user->id);

        if (!$user) {
            return redirect()->route('users.users-list')->with(['errors' => 'User not found']);
        }

        $data = [
            "name" => $request->name,
            "email" => $request->email,
            "status" => $request->status


        ];
        $user->update($data);
        return redirect()->route('admin.users.list')->with(['sucess' => 'user updated successfully']);
    }
}
