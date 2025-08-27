<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class RegistrationController extends Controller
{
    /**
     * register the user
     */
    public function register(Request $request)
    {
        try {

            //validate the request
            $request->validate(['username' => 'required|string|min:3|max:20',
                            'email' => 'required|string|email',
                            'password' => 'required|min:8'
            ]);

            $user = User::create(['username' => $request->username,
                        'email' => $request->email,
                        'password' => Hash::make($request->password)
            ]);

            Log::info("User Details  : register User | ".print_r($user, true));

            $token = $user->createToken('authToken')->accessToken;

            return response()->json(['user' => $user,'token' => $token ], '200');

        } catch (\Illuminate\Validation\ValidationException $ex) {
            return response()->json([$ex->getMessage()], '422');
        } catch (\Exception $ex) {
            Log::error("Exception : register User | ".$ex->getMessage());
            return response()->json(['user' => $user,'ex' => $ex->getMessage() ], '500');
        }
    }

    public function login(Request $request)
    {
        try {

            //validate the request
            $request->validate([
                            'email' => 'required|email',
                            'password' => 'required'
            ]);

            if(Auth::attempt($request->only('email','password'))) {
                $user = Auth::user();
                $token = $user->createToken('authToken')->accessToken;
            }

            return response()->json(['token' => $token ], '200');

        } catch (\Illuminate\Validation\ValidationException $ex) {
            return response()->json([$ex->getMessage()], '422');
        } catch (\Exception $ex) {
            Log::error("Exception : register User | ".$ex->getMessage());
            return response()->json(['user' => $user,'ex' => $ex->getMessage() ], '500');
        }
    }

}
