<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\BookingLine;
use App\Models\Product;
use App\Models\User;

class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $bookingLine = BookingLine::pluck('id')->toArray();
        $product = Product::pluck('id')->toArray();
        $user = User::pluck('id')->toArray();
        return [
            'booking_line_id' => $this->faker->randomElement($bookingLine),
            'product_id' => $this->faker->randomElement($product),
            'user_id' =>  $this->faker->randomElement($user),
            'date' => $this->faker->dateTime(),
            'no_of_products' => $this->faker->randomDigitNotNull(),
        ];
    }
}
