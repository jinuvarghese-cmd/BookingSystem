<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bookings = Booking::simplePaginate(8,['id','date','status']);
        return view('admin.bookings.index', ['bookings' => $bookings]);
    }

    public function view(Request $request)
    {
        $booking = Booking::with(['user', 'bookingProduct', 'product'])->find($request->id);
        return view('admin.bookings.products', ['booking' => $booking]);   
    }
}