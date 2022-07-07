<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class BookingController extends Controller
{
    public function checkout(Request $request){
            if(!Auth::check()){
                session(['url.intended' => url('/booking/checkout')]);
                return response()->json(['url'=>url('/login')]);
            }

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

                    if($request->ajax()){
                        return response()->json(['status' => 'success', 'products' => $products, 'booking_id' => $booking->id]);
                    }else{
                        return redirect()->route('placeOrder')->with( 'products', $products)->with('booking_id', $booking->id);
                    }  
                    
            }
    }
}
