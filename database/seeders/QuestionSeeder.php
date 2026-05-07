<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        Question::truncate();

        $questions = require database_path('seeders/system_questions.php');

        foreach ($questions as $question) {
            Question::create($question);
        }
    }
}