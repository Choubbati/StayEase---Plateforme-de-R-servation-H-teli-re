<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|unique:users',
        //     'password' => 'required|string|min:8',
        //     ]);

        $user = User::create([
            'Firstname' => $request->prenom,
            'Lastname' => $request->nom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'isValidated' => ($request->role_id == 2) ? false : true
        ]);

        if ($user->isValidated == true) {
            Auth::login($user);
            return redirect()->route('home');
        } else {
            return view('wait');
        }
    }


    public function login(Request $request)
    {

        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        if (Auth::attempt($validated)) {
            if (Auth::user()->isValidated) {

                $request->session()->regenerate();
                  if (Auth::user()->role_id == 1) {
                      return redirect()->route('admin.dashboard');
                  }

                    return redirect()->route('home');



            }
            return view('wait');

        }
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->intended('/');
    }
}
