<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function checkout(Request $request){
        if($request->ajax()){
            if ($request->session()->has('products')) {
                    $booking = Booking::create([
                                    'user_id' => Auth::id(),
                                    'date' => date('Y-m-d')
                    ]);

                    $products = $request->session()->get('products');
                    foreach($products as $product_id => $product_no){
                        BookingProduct::create([
                            'booking_id' => $booking->id,
                            'product_id' => $product_id,
                            'date' => date('Y-m-d'),
                            'no_of_products' => $product_no
                        ]);
                    }    
            }
        }
    }
}
