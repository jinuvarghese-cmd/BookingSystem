<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function bookingLine()
    {
        return $this->belongsTo(BookingLine::class, 'booking_line_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
