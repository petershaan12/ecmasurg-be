<?php

namespace Database\Seeders;

use App\Models\Quiz;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "question" => "Pasien Ny. A berusia 35 tahun dirawat di RS dengan cedera medulla spinalis. Hasil pengkajian: pasien kesulitan menggerakkan panggul dan ekstremitas bawah, nyeri saat digerakkan, rentang gerak menurun, ekstremitas teraba dingin, TD 110/70 mmHg, HR 70 x/menit, dan terpasang kateter urine. Apakah diagnosa keperawatan utama yang tepat?",
                "options" => ["Nyeri akut", "Resiko syok", "Gangguan mobilitas fisik", "Gangguan eliminasi urine", "Ketidakefektifan perfusi jaringan perifer"],
                "correct_option" => 2,
                "category" => "pensarafan",
                "points" => 10,
                "pembahasan" => "data fokus masalah adalah kesulitan menggerakkan panggul dan ekstremitas bawah, rentang gerak menurun, dan nyeri saat digerakkan. Masalah keperawatan yang tepat yaitu gangguan mobilitas fisik, yang merupakan keterbatasan dalam gerakan fisik dari satu atau lebih ekstremitas secara mandiri yang ditandai dengan data mayor pasien mengeluh sulit menggerakkan ekstremitas, kekuatan otot menurun dan rentang gerak menurun."
            ],

        ];

        foreach ($data as $question) {
            Quiz::create($question);
        }
    }
}
