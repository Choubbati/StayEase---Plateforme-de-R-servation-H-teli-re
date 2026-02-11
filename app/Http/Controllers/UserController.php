<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->role_id == 1) {
            return redirect()->route('admin.dashboard');
        }
//        if (Auth::check() && Auth::user()->role_id == 2) {
//            return redirect()->route('hotels.hotels');
//        }

        $hotelsApprouved = Hotel::where('status', 'approved')
            ->latest()
            ->paginate(6);
        //dd($hotelsApprouved);

        return view('home', compact('hotelsApprouved'));
    }
}
