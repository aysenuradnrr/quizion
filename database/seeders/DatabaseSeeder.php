<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test',
                'surname' => 'User',
                'password' => bcrypt('password'),
                'role' => 'ogrenci',
                'grade' => '7.Sınıf',
                'branch' => 'A',
            ]
        );

        $this->call([
            KazanimSeeder::class,
            QuestionSeeder::class,
        ]);
    }
}