<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AuthController extends Controller
{
    public function token_generator(Request $request) {

        if ($request->username != 'spg') {

            return response([
                'message' => ['username not found']
            ], 404);

        }


        $user = User::where('username', $request->username)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => ['Invalid Credentials']
                ], 404);
            }
        
             $token = $user->createToken('spg-token')->plainTextToken;
        
            $response = [
                'token' => $token
            ];
        
             return response($response, 201);

    }
}
