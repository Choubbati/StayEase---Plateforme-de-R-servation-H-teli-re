<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $user->Firstname = $request->input('Firstname');
        $user->Lastname = $request->input('Lastname');
        $user->email = $request->input('email');
        $user->save();

        return redirect()->route('profile');
    }


}
