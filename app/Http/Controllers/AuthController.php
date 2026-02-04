<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|unique:users',
        //     'password' => 'required|string|min:8',
        //     ]);
        
        $user = User::create([
            'Firstname' => $request->prenom,
            'Lastname' => $request->nom,
            'email' =>$request->email,
            'password' =>Hash::make($request->password),
            'role_id' => 3,
            ]);
            
        Auth::login($user);
        return redirect()->route('home');

    }

    public function login(Request $request){
        
    $validated = $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    if(Auth::attempt($validated)){
        $request->session()->regenerate();
        
        return redirect()->intended('/');
    }

    }


}
