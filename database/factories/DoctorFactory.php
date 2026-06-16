<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->dokter(),
            'specialization' => fake()->randomElement([
                'Dokter Umum',
                'Dokter Gigi',
                'Dokter Anak',
                'Dokter Kulit',
                'Dokter Mata',
                'Dokter THT',
                'Dokter Jantung',
                'Dokter Saraf',
                'Dokter Penyakit Dalam',
                'Psikiater',
            ]),
            'experience_years' => fake()->numberBetween(1, 25),
            'bio' => fake()->paragraph(),
            'schedule' => fake()->randomElement([
                'Senin-Jumat: 08:00-16:00',
                'Senin-Sabtu: 09:00-17:00',
                'Senin-Rabu: 08:00-14:00, Kamis-Sabtu: 14:00-20:00',
                'Selasa-Sabtu: 10:00-18:00',
            ]),
        ];
    }
}
