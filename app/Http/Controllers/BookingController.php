<?php

namespace App\Http\Controllers;

use App\Models\Booking;
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
        return view('bookings', ['bookings' => $bookings]);
    }

    public function view(Request $request)
    {
        $booking = Booking::with(['user', 'bookingProduct', 'product'])->find($request->id);
        return view('bookingProducts', ['booking' => $booking]);   
    }
}