<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Consultation;

class ConsultationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = User::where('role', 'member')->get();
        $doctors = Doctor::all();

        $consultations = [
            [
                'member_id' => $members[0]->id,
                'doctor_id' => $doctors[0]->id,
                'subject' => 'Keluhan sakit kepala berkepanjangan',
                'status' => 'completed',
                'scheduled_at' => '2026-04-10 09:00:00',
            ],
            [
                'member_id' => $members[1]->id,
                'doctor_id' => $doctors[1]->id,
                'subject' => 'Konsultasi perawatan gigi berlubang',
                'status' => 'completed',
                'scheduled_at' => '2026-04-11 10:00:00',
            ],
            [
                'member_id' => $members[2]->id,
                'doctor_id' => $doctors[2]->id,
                'subject' => 'Pemeriksaan tumbuh kembang anak',
                'status' => 'active',
                'scheduled_at' => '2026-04-15 11:00:00',
            ],
            [
                'member_id' => $members[3]->id,
                'doctor_id' => $doctors[3]->id,
                'subject' => 'Gangguan pendengaran telinga kiri',
                'status' => 'active',
                'scheduled_at' => '2026-04-15 14:00:00',
            ],
            [
                'member_id' => $members[4]->id,
                'doctor_id' => $doctors[4]->id,
                'subject' => 'Konsultasi masalah kulit berjerawat',
                'status' => 'pending',
                'scheduled_at' => '2026-04-18 09:00:00',
            ],
            [
                'member_id' => $members[5]->id,
                'doctor_id' => $doctors[0]->id,
                'subject' => 'Keluhan demam dan batuk pilek',
                'status' => 'pending',
                'scheduled_at' => '2026-04-19 10:00:00',
            ],
            [
                'member_id' => $members[6]->id,
                'doctor_id' => $doctors[1]->id,
                'subject' => 'Pemasangan kawat gigi',
                'status' => 'cancelled',
                'scheduled_at' => '2026-04-08 13:00:00',
            ],
            [
                'member_id' => $members[7]->id,
                'doctor_id' => $doctors[2]->id,
                'subject' => 'Jadwal imunisasi anak balita',
                'status' => 'completed',
                'scheduled_at' => '2026-04-05 08:00:00',
            ],
        ];

        foreach ($consultations as $consultation) {
            Consultation::create($consultation);
        }
    }
}
