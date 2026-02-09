<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $hotelsApprouved = Hotel::where('status', 'approved')
            ->latest()
            ->paginate(2);
        //dd($hotelsApprouved);
        return view('home', compact('hotelsApprouved'));
    }

}
