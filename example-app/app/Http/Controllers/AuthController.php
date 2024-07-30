<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function register(Request $request){
        $data=$request->validate([
            'name'=>'required|string',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|string|confirmed'
        ]);
        $data['password'] = Hash::make($data['password']);
        $user=User::create($data);
        $token =$user->createToken('auth_token')->plainTextToken;
        $d = [
            'title' => 'Inscrivez-vous à GeStock',
            'message' => 'Welcome to GeStock'
        ];
        Mail::to($request->email)->send(new WelcomeEmail($d));
        $user->assignRole('admin');
        return [
            'user'=>$user,
            'token'=>$token
        ];
    }

    public function login(Request $request){
        $data=$request->validate([
            'email'=>'required|email|exists:users',
            'password'=>'required'
        ]);
        $user=User::where('email',$data['email'])->first();
        if(!$user || !Hash::check($data['password'],$user->password)){
            return response([
                'message'=>'Invalid credentials'
                ],401);
        }

        $token =$user->createToken('auth_token')->plainTextToken;
        return [
            'user'=>$user,
            'token'=>$token,
        ];
    }

    public function logout(Request $reques){
        $reques->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Successfully logged out'
        ],200);
    }
}
