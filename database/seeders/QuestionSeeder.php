<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        Question::truncate();

        // =========================
        // 5. SINIF
        // =========================

        Question::create([
            'ders' => 'Matematik',
            'sinif' => '5. Sınıf',
            'kazanim' => 'Doğal Sayılar',
            'zorluk' => 'Kolay',
            'soru_metni' => '345 sayısında onlar basamağındaki rakam kaçtır?',
            'secenek_a' => '3',
            'secenek_b' => '4',
            'secenek_c' => '5',
            'secenek_d' => '0',
            'dogru_cevap' => 'B',
        ]);

        Question::create([
            'ders' => 'Fen Bilimleri',
            'sinif' => '5. Sınıf',
            'kazanim' => 'Güneş Sistemi',
            'zorluk' => 'Orta',
            'soru_metni' => 'Güneşe en yakın gezegen hangisidir?',
            'secenek_a' => 'Mars',
            'secenek_b' => 'Venüs',
            'secenek_c' => 'Merkür',
            'secenek_d' => 'Jüpiter',
            'dogru_cevap' => 'C',
        ]);

        // =========================
        // 6. SINIF
        // =========================

        Question::create([
            'ders' => 'Türkçe',
            'sinif' => '6. Sınıf',
            'kazanim' => 'Sözcükte Anlam',
            'zorluk' => 'Kolay',
            'soru_metni' => 'Aşağıdakilerden hangisi gerçek anlamdır?',
            'secenek_a' => 'Tatlı çocuk',
            'secenek_b' => 'İnce düşünce',
            'secenek_c' => 'Sıcak çay',
            'secenek_d' => 'Soğuk bakış',
            'dogru_cevap' => 'C',
        ]);

        Question::create([
            'ders' => 'Sosyal Bilgiler',
            'sinif' => '6. Sınıf',
            'kazanim' => 'Demokrasi',
            'zorluk' => 'Orta',
            'soru_metni' => 'Demokrasinin temel özelliği nedir?',
            'secenek_a' => 'Tek kişinin yönetmesi',
            'secenek_b' => 'Halkın yönetime katılması',
            'secenek_c' => 'Askeri yönetim',
            'secenek_d' => 'Krallık sistemi',
            'dogru_cevap' => 'B',
        ]);

        // =========================
        // 7. SINIF
        // =========================

        Question::create([
            'ders' => 'İngilizce',
            'sinif' => '7. Sınıf',
            'kazanim' => 'Daily Routines',
            'zorluk' => 'Kolay',
            'soru_metni' => '“I ___ breakfast at 8 AM.” boşluğa ne gelir?',
            'secenek_a' => 'have',
            'secenek_b' => 'has',
            'secenek_c' => 'having',
            'secenek_d' => 'had',
            'dogru_cevap' => 'A',
        ]);

        Question::create([
            'ders' => 'Matematik',
            'sinif' => '7. Sınıf',
            'kazanim' => 'Rasyonel Sayılar',
            'zorluk' => 'Zor',
            'soru_metni' => '1/2 + 3/4 işleminin sonucu kaçtır?',
            'secenek_a' => '4/6',
            'secenek_b' => '5/4',
            'secenek_c' => '1',
            'secenek_d' => '7/8',
            'dogru_cevap' => 'B',
        ]);

        // =========================
        // 8. SINIF
        // =========================

        Question::create([
            'ders' => 'Fen Bilimleri',
            'sinif' => '8. Sınıf',
            'kazanim' => 'Hücre',
            'zorluk' => 'Orta',
            'soru_metni' => 'Hücrenin yönetim merkezi hangisidir?',
            'secenek_a' => 'Mitokondri',
            'secenek_b' => 'Ribozom',
            'secenek_c' => 'Çekirdek',
            'secenek_d' => 'Sitoplazma',
            'dogru_cevap' => 'C',
        ]);

        Question::create([
            'ders' => 'Matematik',
            'sinif' => '8. Sınıf',
            'kazanim' => 'Çarpanlar ve Katlar',
            'zorluk' => 'Kolay',
            'soru_metni' => '12 sayısının çarpanlarından biri hangisidir?',
            'secenek_a' => '5',
            'secenek_b' => '7',
            'secenek_c' => '6',
            'secenek_d' => '11',
            'dogru_cevap' => 'C',
        ]);

        Question::create([
            'ders' => 'Türkçe',
            'sinif' => '8. Sınıf',
            'kazanim' => 'Fiilimsiler',
            'zorluk' => 'Zor',
            'soru_metni' => 'Aşağıdakilerden hangisinde fiilimsi vardır?',
            'secenek_a' => 'Okula gidiyorum',
            'secenek_b' => 'Kitap okuyarak öğrendi',
            'secenek_c' => 'Kalem kırıldı',
            'secenek_d' => 'Bahçe büyüktü',
            'dogru_cevap' => 'B',
        ]);
    }
}