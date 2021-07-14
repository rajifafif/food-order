<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $data['email'])->first();
        $passwordMatch = Hash::check($data['password'], $user->password);

        if ($passwordMatch) {
            $token = $user->createToken('api');
            $user->token = $token->plainTextToken;

            return response($user);
        } else {
            abort(403, 'Password Anda Salah!!!');
        }
    }
}
