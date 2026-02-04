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
            'Nom' => $request->nom,
            'Email' =>$request->email,
            'Password' =>Hash::make($request->password),
            'role_id' => '2',
            ]);
            dd($user);
        


        // Auth::login($user);
        // return redirect('/')->route('home');

    }


}
