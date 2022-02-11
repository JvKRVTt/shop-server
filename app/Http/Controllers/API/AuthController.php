<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'phone' => 'required|numeric',
            'password' => 'required',
        ]);

        $credentials = request(['phone', 'password']);

        if (Auth::guard('api')->attempt($credentials)) {
            $user = Client::where('phone', $request->phone)->first();
            return [
                'token' => $user->createToken('Mobile App')->plainTextToken,
                'id' => $user->id
            ];
        }

        abort(Response::HTTP_UNAUTHORIZED);
    }
}
