<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['login']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Auth::user()->tokens();
        // This method is not used in this controller, but can be implemented if needed.

    }
    /**
     * Handle user login and return a token.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    /**
     * Login a user and return a token.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
        $clean = $request->validate([
            "email" => "required|email",
            "password" => "required|string",
            "device_name" => "required|string"
        ]);

        $user = User::where("email" , $clean['email'])->first();
        if(Hash::check($clean['password'] , $user->password)){
          $token = $user->createToken($clean['device_name'] , ['*']);

            return Response::json([
                'msg' => "Login Successful",
                'token' => $token->plainTextToken,
                'user' => $user
            ], 200);
        }

        return Response::json([
            'msg' => "Invalid Credentials"
        ], 401);
    }

    public function logout(Request $request){
        $user = Auth::user();
        $user->tokens()->delete();

        return Response::json([
            'msg' => "Logout Successful"
        ], 200);
    }
}
