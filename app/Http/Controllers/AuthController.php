<?php

namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function register(RegisterRequest $request)
    {

        // $request->validate();

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            "success"=> true,
            "user" => $user,
            "token" => $token,
        ];
        return response($response, 201);
    }



    public function login(LoginRequest $request)
    {

        // $request->validate();
        //check email
        $users = User::where('email', $request->email)->first();

        //check password
        if (!$users || !Hash::check($request->password, $users->password)) {
            return response([
                "message" => "Bad Creds",
            ], 401);
        };
        $token = $users->createToken('myapptoken')->plainTextToken;

        $response = [
            "success"=> true,
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
