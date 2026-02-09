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

        $hotelsApprouved = Hotel::where('status', 'approved')
            ->latest()
            ->paginate(2);

        return view('home', compact('hotelsApprouved'));
    }
}
