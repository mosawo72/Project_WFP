<?php

namespace Database\Factories;

use App\Models\Consultation;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Consultation>
 */
class ConsultationFactory extends Factory
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
            'subject' => fake()->randomElement([
                'Konsultasi kesehatan umum',
                'Keluhan sakit kepala berulang',
                'Pemeriksaan rutin',
                'Konsultasi nutrisi dan diet',
                'Keluhan gangguan tidur',
                'Konsultasi alergi kulit',
                'Pemeriksaan tekanan darah tinggi',
                'Konsultasi kesehatan mental',
            ]),
            'status' => fake()->randomElement(['pending', 'active', 'completed', 'cancelled']),
            'scheduled_at' => fake()->optional(0.7)->dateTimeBetween('-1 month', '+1 month'),
        ];
    }
}
