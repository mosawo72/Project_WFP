<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Booking;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = User::where('role', 'member')->get();
        $doctors = Doctor::all();

        $bookings = [
            [
                'member_id' => $members[0]->id,
                'doctor_id' => $doctors[0]->id,
                'booking_date' => '2026-04-20',
                'booking_time' => '09:00',
                'status' => 'confirmed',
                'notes' => 'Check-up rutin bulanan',
            ],
            [
                'member_id' => $members[1]->id,
                'doctor_id' => $doctors[1]->id,
                'booking_date' => '2026-04-20',
                'booking_time' => '10:00',
                'status' => 'confirmed',
                'notes' => 'Pembersihan karang gigi',
            ],
            [
                'member_id' => $members[2]->id,
                'doctor_id' => $doctors[2]->id,
                'booking_date' => '2026-04-21',
                'booking_time' => '08:30',
                'status' => 'pending',
                'notes' => 'Vaksinasi anak usia 2 tahun',
            ],
            [
                'member_id' => $members[3]->id,
                'doctor_id' => $doctors[3]->id,
                'booking_date' => '2026-04-21',
                'booking_time' => '11:00',
                'status' => 'pending',
                'notes' => 'Pemeriksaan gangguan pendengaran',
            ],
            [
                'member_id' => $members[4]->id,
                'doctor_id' => $doctors[4]->id,
                'booking_date' => '2026-04-22',
                'booking_time' => '14:00',
                'status' => 'pending',
                'notes' => 'Konsultasi alergi kulit',
            ],
            [
                'member_id' => $members[5]->id,
                'doctor_id' => $doctors[0]->id,
                'booking_date' => '2026-04-22',
                'booking_time' => '15:00',
                'status' => 'confirmed',
                'notes' => 'Keluhan sakit perut',
            ],
            [
                'member_id' => $members[6]->id,
                'doctor_id' => $doctors[1]->id,
                'booking_date' => '2026-04-23',
                'booking_time' => '09:30',
                'status' => 'cancelled',
                'notes' => 'Tambal gigi geraham',
            ],
            [
                'member_id' => $members[7]->id,
                'doctor_id' => $doctors[3]->id,
                'booking_date' => '2026-04-23',
                'booking_time' => '10:30',
                'status' => 'completed',
                'notes' => 'Follow-up sinusitis',
            ],
            [
                'member_id' => $members[8]->id,
                'doctor_id' => $doctors[2]->id,
                'booking_date' => '2026-04-24',
                'booking_time' => '08:00',
                'status' => 'confirmed',
                'notes' => 'Pemeriksaan tumbuh kembang anak',
            ],
            [
                'member_id' => $members[9]->id,
                'doctor_id' => $doctors[4]->id,
                'booking_date' => '2026-04-24',
                'booking_time' => '13:00',
                'status' => 'pending',
                'notes' => 'Konsultasi jerawat dan perawatan wajah',
            ],
        ];

        foreach ($bookings as $booking) {
            Booking::create($booking);
        }
    }
}
