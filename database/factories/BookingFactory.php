<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'member_id' => User::factory()->member(),
            'doctor_id' => Doctor::factory(),
            'booking_date' => fake()->dateTimeBetween('-2 weeks', '+2 weeks')->format('Y-m-d'),
            'booking_time' => fake()->randomElement([
                '08:00', '08:30', '09:00', '09:30', '10:00', '10:30',
                '11:00', '13:00', '13:30', '14:00', '14:30', '15:00',
                '15:30', '16:00',
            ]),
            'status' => fake()->randomElement(['pending', 'confirmed', 'cancelled', 'completed']),
            'notes' => fake()->optional(0.6)->sentence(),
        ];
    }
}
