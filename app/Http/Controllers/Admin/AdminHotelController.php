<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;

class AdminHotelController extends Controller
{
    public function pending()
    {
        $hotels = Hotel::where('status', 'pending')
            ->with('manager')
            ->paginate(10);

        return view('admin.hotels.pending', compact('hotels'));
    }

    public function approve(Hotel $hotel)
    {
        $hotel->update(['status' => 'approved']);
        return back()->with('success', 'Hôtel approuvé avec succès');
    }

    public function reject(Hotel $hotel)
    {
        $hotel->update(['status' => 'rejected']);
        return back()->with('success', 'Hôtel rejeté');
    }
}
