<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $questionsPath = database_path('seeders/system_questions.php');
        if (!file_exists($questionsPath)) {
            $this->command->warn('system_questions.php dosyası bulunamadı.');
            return;
        }

        $questions = include $questionsPath;

        foreach ($questions as $question) {
            Question::updateOrCreate(
                [
                    'sinif' => $question['sinif'],
                    'ders' => $question['ders'],
                    'kazanim' => $question['kazanim'],
                    'soru_metni' => $question['soru_metni'],
                ],
                [
                    'zorluk' => $question['zorluk'],
                    'secenek_a' => $question['secenek_a'],
                    'secenek_b' => $question['secenek_b'],
                    'secenek_c' => $question['secenek_c'],
                    'secenek_d' => $question['secenek_d'],
                    'dogru_cevap' => $question['dogru_cevap'],
                ]
            );
        }
    }
}