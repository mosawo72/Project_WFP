<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Doctor;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dokterUsers = User::where('role', 'dokter')->get();

        $specializations = [
            [
                'specialization' => 'Dokter Umum',
                'experience_years' => 8,
                'bio' => 'Dokter umum berpengalaman dengan keahlian dalam penanganan penyakit umum dan pencegahan kesehatan. Memiliki pendekatan holistik dalam menangani pasien.',
                'schedule' => 'Senin - Jumat: 08:00 - 16:00',
            ],
            [
                'specialization' => 'Dokter Gigi',
                'experience_years' => 6,
                'bio' => 'Spesialis kesehatan gigi dan mulut dengan fokus pada perawatan gigi estetik dan ortodonti. Berpengalaman menangani berbagai kasus dental.',
                'schedule' => 'Senin - Kamis: 09:00 - 17:00',
            ],
            [
                'specialization' => 'Dokter Anak',
                'experience_years' => 10,
                'bio' => 'Spesialis anak dengan pengalaman luas dalam tumbuh kembang anak, imunisasi, dan penanganan penyakit anak. Dikenal ramah terhadap anak-anak.',
                'schedule' => 'Senin - Sabtu: 08:00 - 14:00',
            ],
            [
                'specialization' => 'Dokter THT',
                'experience_years' => 7,
                'bio' => 'Spesialis Telinga, Hidung, dan Tenggorokan dengan keahlian dalam penanganan gangguan pendengaran, sinusitis, dan masalah pernapasan.',
                'schedule' => 'Selasa - Sabtu: 10:00 - 18:00',
            ],
            [
                'specialization' => 'Dokter Kulit',
                'experience_years' => 5,
                'bio' => 'Spesialis dermatologi dan venereologi dengan fokus pada perawatan kulit, penanganan alergi, dan penyakit kulit kronis.',
                'schedule' => 'Senin - Jumat: 10:00 - 18:00',
            ],
        ];

        foreach ($dokterUsers as $index => $user) {
            Doctor::create(array_merge(
                ['user_id' => $user->id],
                $specializations[$index]
            ));
        }
    }
}
