<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class BookingLineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::pluck('id')->toArray();
        $status = ['Orderplaced', 'Orderdelivered'];
        return [
            'user_id' =>  $this->faker->randomElement($user),
            'date' => $this->faker->date(),
            'status' => $this->faker->randomElement($status)
        ];
    }
}
