<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function register(Request $request)
    {

        $user = $request->validate([
            'name' => 'required|string',
            'email' => 'required|unique:users,email|string',
            'password' => 'required|confirmed|string',
        ]);

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => hash::make($request->password),
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            "user" => $user,
            "token" => $token,
        ];
        return response($response, 201);
    }



    public function login(Request $request)
    {

        $users = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        //check email
        $users = User::where('email', $users['email'])->first();

        //check password
        if (!$users || !Hash::check($request->password, $users->password)) {
            return response([
                "message" => "Bad Creds",
            ], 401);
        };
        $token = $users->createToken('myapptoken')->plainTextToken;

        $response = [
            "user" => $users,
            "token" => $token,
        ];
        return response($response, 201);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return [
            "message" => " Logged Out",
        ];
    }
}
