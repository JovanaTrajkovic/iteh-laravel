<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;



class AuthController extends Controller
{
    //fja za registraciju
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('RegToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response()->json($response);
    }



    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['poruka' => 'Pogresan email ili password!']);
        }
        //kreira se objekat korisnik uz pomoc nejgovo email-a
        $user = User::where('email', $request['email'])->firstOrFail();
        //postavlja se token
        $token = $user->createToken('LoginToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
        ];
   //vraca se odogovor sa userom i tokenom
        return response()->json($response);
    }


    //fja za odjavu korisnika
    public function logout()
    {
        //Pristupamo autentifikovanom(ulogovanom) korisniku preko auth() funkcije i brišemo sve tokene koje ima
        auth()->user()->tokens()->delete();
        return response()->json(['Uspešna odjava!']);
    }

}
