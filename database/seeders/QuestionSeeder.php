<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        $questions = require database_path('seeders/system_questions.php');
        
        foreach ($questions as $question) {
            Question::updateOrCreate(
                [
                    'sinif' => $question['sinif'],
                    'ders' => $question['ders'],
                    'kazanim' => $question['kazanim'],
                    'soru_metni' => $question['soru_metni'],
                ],
                $question
            );
        }
    }
}