<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingLine extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function booking()
    {
        return $this->hasMany(Booking::class, 'booking_line_id', 'id');
    }
}
