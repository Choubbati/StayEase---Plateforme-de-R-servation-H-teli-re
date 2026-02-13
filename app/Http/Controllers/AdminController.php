<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index(){

    return view('admin.adminDashboard');
}
    public function showUsers(){
        $users = User::all()->where('role_id', 3);
        return view('admin.users.index', compact('users'));
    }

    public function banUser(User $user){
        $user->delete();
        return redirect()->route('admin.users.index');
    }

    public function showGerantNotValidated(){
        $notValidated = User::all()->where('isValidated', false);
        return view('admin.gerants.index', compact('notValidated'));
    }
    public function ValidateGerant($id){
        $user = User::find($id);
        $user->isValidated = true;
        $user->update();
        return back()->with('success', "Le gérant {$user->Firstname} a été validé !");
    }


    }
