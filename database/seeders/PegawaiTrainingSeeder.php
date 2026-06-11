<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Pegawai; // Pastikan import model Pegawai
use App\Models\Training; // Pastikan import model Training

class PegawaiTrainingSeeder extends Seeder {
    public function run(): void {
        // Ambil 3 ID pegawai pertama yang benar-benar ada di database
        $pegawaiIds = Pegawai::pluck('id')->take(3)->toArray();
        
        // Ambil 3 ID training pertama yang benar-benar ada di database
        $trainingIds = Training::pluck('id')->take(3)->toArray();

        // Validasi jika data pegawai atau training kurang dari 3
        if (count($pegawaiIds) < 3 || count($trainingIds) < 3) {
            $this->command->warn('Gagal seeding: Pastikan data Pegawai dan Training minimal ada 3 data.');
            return;
        }

        DB::table('pegawai_training')->insert([
            [
                'pegawai_id' => $pegawaiIds[0],
                'training_id' => $trainingIds[0],
                'status' => 'Selesai'
            ],
            [
                'pegawai_id' => $pegawaiIds[1],
                'training_id' => $trainingIds[1],
                'status' => 'Mengikuti'
            ],
            [
                'pegawai_id' => $pegawaiIds[2],
                'training_id' => $trainingIds[2],
                'status' => 'Terdaftar'
            ],
        ]);
    }
}