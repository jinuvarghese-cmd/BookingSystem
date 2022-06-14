<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Booking;
use App\Models\Product;
use App\Models\User;

class BookingProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $booking = Booking::pluck('id')->toArray();
        $product = Product::pluck('id')->toArray();
        $user = User::pluck('id')->toArray();
        return [
            'booking_id' => $this->faker->randomElement($booking),
            'product_id' => $this->faker->randomElement($product),
            'date' => $this->faker->dateTime(),
            'no_of_products' => $this->faker->randomDigitNotNull(),
        ];
    }
}
