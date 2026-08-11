<?php

namespace Database\Seeders;

use App\Models\Peserta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PesertaSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Peserta::create([
        //     'name' => 'M.Osvaldo Rios',
        //     'age' => '27 Tahun',
        //     'email' => 'osvaldo@example.com',
        //     'address' => 'JL.Kelinci 2 RT 5 / 15Kaliabang Tengah Bekasi Utara',
        // ]); 
        Peserta::Factory(50)->create();
    }
}
