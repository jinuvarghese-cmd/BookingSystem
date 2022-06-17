<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function bookingProduct()
    {
        return $this->hasMany(BookingProduct::class, 'booking_id', 'id');
    }

    public function product()
    {
        return $this->belongsToMany(Product::class, BookingProduct::class);
    }

}
