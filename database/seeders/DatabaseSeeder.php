<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\User;
use App\Models\Booking;
use App\Models\BookingLine;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UsersTableSeeder::class]);
        Product::factory(100)->create();
        User::factory(100)->create();
        BookingLine::factory(100)->create();
        Booking::factory(100)->create();
    }
}
