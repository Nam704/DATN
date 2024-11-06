<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserHasRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
{
    public function login(Request $request)
    {
        $credentials = ["name" => $request->name, "password" => $request->password];


        if (Auth::attempt($credentials)) {

            $user = Auth::user();

            if ($user->isAdmin()) {

                return view('admin.dashboard');
            } else {

                Auth::logout();
                return redirect()->route('admin.getFormLogin')
                    ->withErrors(['errors' => 'You do not have admin access or your account is inactive.']);
            }
        } else {

            return redirect()->route('admin.getFormLogin')
                ->withErrors(['errors' => "Information incorrect, please try again!"]);
        }
    }

    function getFormLogin()
    {
        return view('layouts.login');
    }
}