<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pesanan')->insert([
            'Kota_asal' => 'Jakarta',
            'Kota_Tujuan' => 'Surabaya',
            'jam_berangkat' => '08:00',
            'jam_tiba' => '10:00',
            'maskapai' => 'Garuda Indonesia',
            'harga' => '500000',
            'kode_tiket' => 'GA123',
            'status' => 'proses',
            'pemesan' => 'User', // Sesuaikan dengan nama user yang telah ada di tabel 'users'
            'penumpang' => 'Penumpang 1, Penumpang 2',
            'created_at' => now(),
        ]);
    }
}
