<?php

namespace App\Http\Controllers;

use App\UserDetail;
use Illuminate\Http\Request;

class ApiResumeController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
 
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
 
        $token = $user->createToken('PersonalAccessToken')->accessToken;
 
        return response()->json(['token' => $token], 200);
    }

    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
 
        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('PersonalAccessToken')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'UnAuthorised'], 401);
        }
    }

    public function jsonData()
    {
        $fullname = auth()->user()->experiences();
        dd($fullname);
        $email = auth()->user()->details()->email;
        $phone = auth()->user()->details()->phone;
        $address = auth()->user()->details()->address;
        

      
        return response()->json($fullname, 200);
    }
}
