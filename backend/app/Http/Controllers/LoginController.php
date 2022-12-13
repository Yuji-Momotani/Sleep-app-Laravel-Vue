<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Mime\Email;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            return response()->json(['status_code' => 200,'message' => 'success'],200);
        } else {
            return response()->json(['status_code' => 500,'message' => 'Unauthorized'],200);
        }
    }

    public function logout()
    {
        Auth::logout();
        return response()->json(['status_code' => 200,'message' => 'Logged out'], 200);
    }

    public function createUser(Request $request){
        if (User::where('email', $request->email)->exists()) {
            return response()->json(['status_code' => 500,'message' => 'user already created'],200);
        }
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json(['status_code' => 201, "message" => "user record created"], 200);
    }
}