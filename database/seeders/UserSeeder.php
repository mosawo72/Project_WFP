<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin VitaGuard',
            'email' => 'admin@vitaguard.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'phone' => '081234567890',
            'address' => 'Jl. Kesehatan No. 1, Jakarta Pusat',
        ]);

        // Dokter
        $dokters = [
            [
                'name' => 'Dr. Andi Pratama',
                'email' => 'andi.pratama@vitaguard.com',
                'password' => Hash::make('password'),
                'role' => 'dokter',
                'phone' => '081234567891',
                'address' => 'Jl. Medika No. 10, Jakarta Selatan',
            ],
            [
                'name' => 'Dr. Siti Nurhaliza',
                'email' => 'siti.nurhaliza@vitaguard.com',
                'password' => Hash::make('password'),
                'role' => 'dokter',
                'phone' => '081234567892',
                'address' => 'Jl. Sehat No. 5, Bandung',
            ],
            [
                'name' => 'Dr. Budi Santoso',
                'email' => 'budi.santoso@vitaguard.com',
                'password' => Hash::make('password'),
                'role' => 'dokter',
                'phone' => '081234567893',
                'address' => 'Jl. Dokter No. 15, Surabaya',
            ],
            [
                'name' => 'Dr. Maya Putri',
                'email' => 'maya.putri@vitaguard.com',
                'password' => Hash::make('password'),
                'role' => 'dokter',
                'phone' => '081234567894',
                'address' => 'Jl. Rumah Sakit No. 8, Yogyakarta',
            ],
            [
                'name' => 'Dr. Rizky Ramadhan',
                'email' => 'rizky.ramadhan@vitaguard.com',
                'password' => Hash::make('password'),
                'role' => 'dokter',
                'phone' => '081234567895',
                'address' => 'Jl. Klinik No. 20, Semarang',
            ],
        ];

        foreach ($dokters as $dokter) {
            User::create($dokter);
        }

        // Member
        $members = [
            ['name' => 'Ahmad Fauzi', 'email' => 'ahmad.fauzi@gmail.com', 'phone' => '082111111111', 'address' => 'Jl. Mangga No. 1, Jakarta'],
            ['name' => 'Dewi Lestari', 'email' => 'dewi.lestari@gmail.com', 'phone' => '082222222222', 'address' => 'Jl. Apel No. 2, Bandung'],
            ['name' => 'Fajar Hidayat', 'email' => 'fajar.hidayat@gmail.com', 'phone' => '082333333333', 'address' => 'Jl. Jeruk No. 3, Surabaya'],
            ['name' => 'Gita Savitri', 'email' => 'gita.savitri@gmail.com', 'phone' => '082444444444', 'address' => 'Jl. Durian No. 4, Yogyakarta'],
            ['name' => 'Hendra Wijaya', 'email' => 'hendra.wijaya@gmail.com', 'phone' => '082555555555', 'address' => 'Jl. Rambutan No. 5, Semarang'],
            ['name' => 'Indah Permata', 'email' => 'indah.permata@gmail.com', 'phone' => '082666666666', 'address' => 'Jl. Salak No. 6, Malang'],
            ['name' => 'Joko Susilo', 'email' => 'joko.susilo@gmail.com', 'phone' => '082777777777', 'address' => 'Jl. Nanas No. 7, Solo'],
            ['name' => 'Kartika Sari', 'email' => 'kartika.sari@gmail.com', 'phone' => '082888888888', 'address' => 'Jl. Pepaya No. 8, Medan'],
            ['name' => 'Lukman Hakim', 'email' => 'lukman.hakim@gmail.com', 'phone' => '082999999999', 'address' => 'Jl. Semangka No. 9, Makassar'],
            ['name' => 'Novi Anggraini', 'email' => 'novi.anggraini@gmail.com', 'phone' => '083000000000', 'address' => 'Jl. Melon No. 10, Palembang'],
        ];

        foreach ($members as $member) {
            User::create(array_merge($member, [
                'password' => Hash::make('password'),
                'role' => 'member',
            ]));
        }
    }
}
