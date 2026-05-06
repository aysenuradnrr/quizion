<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kazanim;

class KazanimSeeder extends Seeder
{
    public function run(): void
    {
        $kazanims = [

            // =====================================================
            // 5. SINIF
            // =====================================================

            // TÜRKÇE
            ['sinif' => '5. Sınıf', 'ders' => 'Türkçe', 'kazanim_adi' => 'Sözcükte anlam'],
            ['sinif' => '5. Sınıf', 'ders' => 'Türkçe', 'kazanim_adi' => 'Cümlede anlam'],
            ['sinif' => '5. Sınıf', 'ders' => 'Türkçe', 'kazanim_adi' => 'Paragraf'],
            ['sinif' => '5. Sınıf', 'ders' => 'Türkçe', 'kazanim_adi' => 'İsimler'],
            ['sinif' => '5. Sınıf', 'ders' => 'Türkçe', 'kazanim_adi' => 'Sıfatlar'],
            ['sinif' => '5. Sınıf', 'ders' => 'Türkçe', 'kazanim_adi' => 'Zamirler'],
            ['sinif' => '5. Sınıf', 'ders' => 'Türkçe', 'kazanim_adi' => 'Fiiller'],
            ['sinif' => '5. Sınıf', 'ders' => 'Türkçe', 'kazanim_adi' => 'Noktalama işaretleri'],
            ['sinif' => '5. Sınıf', 'ders' => 'Türkçe', 'kazanim_adi' => 'Yazım kuralları'],

            // MATEMATİK
            ['sinif' => '5. Sınıf', 'ders' => 'Matematik', 'kazanim_adi' => 'Doğal sayılar'],
            ['sinif' => '5. Sınıf', 'ders' => 'Matematik', 'kazanim_adi' => 'Kesirler'],
            ['sinif' => '5. Sınıf', 'ders' => 'Matematik', 'kazanim_adi' => 'Ondalık sayılar'],
            ['sinif' => '5. Sınıf', 'ders' => 'Matematik', 'kazanim_adi' => 'Yüzdeler'],
            ['sinif' => '5. Sınıf', 'ders' => 'Matematik', 'kazanim_adi' => 'Temel geometri'],

            // FEN
            ['sinif' => '5. Sınıf', 'ders' => 'Fen Bilimleri', 'kazanim_adi' => 'Güneş, Dünya ve Ay'],
            ['sinif' => '5. Sınıf', 'ders' => 'Fen Bilimleri', 'kazanim_adi' => 'Canlılar dünyası'],
            ['sinif' => '5. Sınıf', 'ders' => 'Fen Bilimleri', 'kazanim_adi' => 'Kuvvet ve hareket'],
            ['sinif' => '5. Sınıf', 'ders' => 'Fen Bilimleri', 'kazanim_adi' => 'Madde ve değişim'],
            ['sinif' => '5. Sınıf', 'ders' => 'Fen Bilimleri', 'kazanim_adi' => 'Işık ve ses'],

            // SOSYAL
            ['sinif' => '5. Sınıf', 'ders' => 'Sosyal Bilgiler', 'kazanim_adi' => 'Birey ve toplum'],
            ['sinif' => '5. Sınıf', 'ders' => 'Sosyal Bilgiler', 'kazanim_adi' => 'Kültür ve miras'],
            ['sinif' => '5. Sınıf', 'ders' => 'Sosyal Bilgiler', 'kazanim_adi' => 'İnsanlar, yerler ve çevreler'],
            ['sinif' => '5. Sınıf', 'ders' => 'Sosyal Bilgiler', 'kazanim_adi' => 'Bilim, teknoloji ve toplum'],
            ['sinif' => '5. Sınıf', 'ders' => 'Sosyal Bilgiler', 'kazanim_adi' => 'Üretim, dağıtım ve tüketim'],

            // İNGİLİZCE
            ['sinif' => '5. Sınıf', 'ders' => 'İngilizce', 'kazanim_adi' => 'Greetings'],
            ['sinif' => '5. Sınıf', 'ders' => 'İngilizce', 'kazanim_adi' => 'Numbers'],
            ['sinif' => '5. Sınıf', 'ders' => 'İngilizce', 'kazanim_adi' => 'Family'],
            ['sinif' => '5. Sınıf', 'ders' => 'İngilizce', 'kazanim_adi' => 'Daily routines'],
            ['sinif' => '5. Sınıf', 'ders' => 'İngilizce', 'kazanim_adi' => 'School life'],

            // DİN
            ['sinif' => '5. Sınıf', 'ders' => 'Din Kültürü', 'kazanim_adi' => 'İnanç esasları'],
            ['sinif' => '5. Sınıf', 'ders' => 'Din Kültürü', 'kazanim_adi' => 'İbadetler'],
            ['sinif' => '5. Sınıf', 'ders' => 'Din Kültürü', 'kazanim_adi' => 'Ahlak'],

            // =====================================================
            // 6. SINIF
            // =====================================================

            // TÜRKÇE
            ['sinif' => '6. Sınıf', 'ders' => 'Türkçe', 'kazanim_adi' => 'Sözcükte anlam'],
            ['sinif' => '6. Sınıf', 'ders' => 'Türkçe', 'kazanim_adi' => 'Cümlede anlam'],
            ['sinif' => '6. Sınıf', 'ders' => 'Türkçe', 'kazanim_adi' => 'Paragraf'],
            ['sinif' => '6. Sınıf', 'ders' => 'Türkçe', 'kazanim_adi' => 'İsimler'],
            ['sinif' => '6. Sınıf', 'ders' => 'Türkçe', 'kazanim_adi' => 'Sıfatlar'],
            ['sinif' => '6. Sınıf', 'ders' => 'Türkçe', 'kazanim_adi' => 'Zamirler'],
            ['sinif' => '6. Sınıf', 'ders' => 'Türkçe', 'kazanim_adi' => 'Zarflar'],
            ['sinif' => '6. Sınıf', 'ders' => 'Türkçe', 'kazanim_adi' => 'Fiiller'],
            ['sinif' => '6. Sınıf', 'ders' => 'Türkçe', 'kazanim_adi' => 'Fiilde zaman'],

            // MATEMATİK
            ['sinif' => '6. Sınıf', 'ders' => 'Matematik', 'kazanim_adi' => 'Doğal sayılarla işlemler'],
            ['sinif' => '6. Sınıf', 'ders' => 'Matematik', 'kazanim_adi' => 'Kesirler'],
            ['sinif' => '6. Sınıf', 'ders' => 'Matematik', 'kazanim_adi' => 'Ondalık gösterimler'],
            ['sinif' => '6. Sınıf', 'ders' => 'Matematik', 'kazanim_adi' => 'Oran ve orantı'],
            ['sinif' => '6. Sınıf', 'ders' => 'Matematik', 'kazanim_adi' => 'Cebirsel ifadeler'],
            ['sinif' => '6. Sınıf', 'ders' => 'Matematik', 'kazanim_adi' => 'Alan ve hacim'],

            // FEN
            ['sinif' => '6. Sınıf', 'ders' => 'Fen Bilimleri', 'kazanim_adi' => 'Vücudumuzdaki sistemler'],
            ['sinif' => '6. Sınıf', 'ders' => 'Fen Bilimleri', 'kazanim_adi' => 'Kuvvet ve hareket'],
            ['sinif' => '6. Sınıf', 'ders' => 'Fen Bilimleri', 'kazanim_adi' => 'Maddenin tanecikli yapısı'],
            ['sinif' => '6. Sınıf', 'ders' => 'Fen Bilimleri', 'kazanim_adi' => 'Işık ve ses'],
            ['sinif' => '6. Sınıf', 'ders' => 'Fen Bilimleri', 'kazanim_adi' => 'Elektrik'],

            // SOSYAL
            ['sinif' => '6. Sınıf', 'ders' => 'Sosyal Bilgiler', 'kazanim_adi' => 'Tarih öncesi çağlar'],
            ['sinif' => '6. Sınıf', 'ders' => 'Sosyal Bilgiler', 'kazanim_adi' => 'İlk uygarlıklar'],
            ['sinif' => '6. Sınıf', 'ders' => 'Sosyal Bilgiler', 'kazanim_adi' => 'Türkiye’nin coğrafyası'],
            ['sinif' => '6. Sınıf', 'ders' => 'Sosyal Bilgiler', 'kazanim_adi' => 'Ekonomi ve kaynaklar'],

            // İNGİLİZCE
            ['sinif' => '6. Sınıf', 'ders' => 'İngilizce', 'kazanim_adi' => 'Occupations'],
            ['sinif' => '6. Sınıf', 'ders' => 'İngilizce', 'kazanim_adi' => 'Daily life'],
            ['sinif' => '6. Sınıf', 'ders' => 'İngilizce', 'kazanim_adi' => 'Food and drinks'],
            ['sinif' => '6. Sınıf', 'ders' => 'İngilizce', 'kazanim_adi' => 'Weather'],

            // DİN
            ['sinif' => '6. Sınıf', 'ders' => 'Din Kültürü', 'kazanim_adi' => 'Peygamberler'],
            ['sinif' => '6. Sınıf', 'ders' => 'Din Kültürü', 'kazanim_adi' => 'İslam’ın şartları'],
            ['sinif' => '6. Sınıf', 'ders' => 'Din Kültürü', 'kazanim_adi' => 'Ahlaki değerler'],

            // =====================================================
            // 7. SINIF
            // =====================================================

            // TÜRKÇE
            ['sinif' => '7. Sınıf', 'ders' => 'Türkçe', 'kazanim_adi' => 'Fiiller'],
            ['sinif' => '7. Sınıf', 'ders' => 'Türkçe', 'kazanim_adi' => 'Ekler'],
            ['sinif' => '7. Sınıf', 'ders' => 'Türkçe', 'kazanim_adi' => 'Cümle türleri'],
            ['sinif' => '7. Sınıf', 'ders' => 'Türkçe', 'kazanim_adi' => 'Paragraf yorumlama'],
            ['sinif' => '7. Sınıf', 'ders' => 'Türkçe', 'kazanim_adi' => 'Anlatım bozuklukları'],

            // MATEMATİK
            ['sinif' => '7. Sınıf', 'ders' => 'Matematik', 'kazanim_adi' => 'Tam sayılar'],
            ['sinif' => '7. Sınıf', 'ders' => 'Matematik', 'kazanim_adi' => 'Rasyonel sayılar'],
            ['sinif' => '7. Sınıf', 'ders' => 'Matematik', 'kazanim_adi' => 'Cebirsel ifadeler'],
            ['sinif' => '7. Sınıf', 'ders' => 'Matematik', 'kazanim_adi' => 'Eşitlik ve denklemler'],
            ['sinif' => '7. Sınıf', 'ders' => 'Matematik', 'kazanim_adi' => 'Oran-orantı'],
            ['sinif' => '7. Sınıf', 'ders' => 'Matematik', 'kazanim_adi' => 'Çokgenler'],

            // FEN
            ['sinif' => '7. Sınıf', 'ders' => 'Fen Bilimleri', 'kazanim_adi' => 'Hücre ve bölünmeler'],
            ['sinif' => '7. Sınıf', 'ders' => 'Fen Bilimleri', 'kazanim_adi' => 'Kuvvet ve enerji'],
            ['sinif' => '7. Sınıf', 'ders' => 'Fen Bilimleri', 'kazanim_adi' => 'Saf maddeler ve karışımlar'],
            ['sinif' => '7. Sınıf', 'ders' => 'Fen Bilimleri', 'kazanim_adi' => 'Işık'],
            ['sinif' => '7. Sınıf', 'ders' => 'Fen Bilimleri', 'kazanim_adi' => 'Elektrik devreleri'],

            // SOSYAL
            ['sinif' => '7. Sınıf', 'ders' => 'Sosyal Bilgiler', 'kazanim_adi' => 'Osmanlı tarihi'],
            ['sinif' => '7. Sınıf', 'ders' => 'Sosyal Bilgiler', 'kazanim_adi' => 'Nüfus'],
            ['sinif' => '7. Sınıf', 'ders' => 'Sosyal Bilgiler', 'kazanim_adi' => 'Ekonomi'],
            ['sinif' => '7. Sınıf', 'ders' => 'Sosyal Bilgiler', 'kazanim_adi' => 'Demokrasi'],

            // İNGİLİZCE
            ['sinif' => '7. Sınıf', 'ders' => 'İngilizce', 'kazanim_adi' => 'Simple past tense'],
            ['sinif' => '7. Sınıf', 'ders' => 'İngilizce', 'kazanim_adi' => 'Comparatives'],
            ['sinif' => '7. Sınıf', 'ders' => 'İngilizce', 'kazanim_adi' => 'Invitations'],
            ['sinif' => '7. Sınıf', 'ders' => 'İngilizce', 'kazanim_adi' => 'Travel'],

            // DİN
            ['sinif' => '7. Sınıf', 'ders' => 'Din Kültürü', 'kazanim_adi' => 'İslam tarihi'],
            ['sinif' => '7. Sınıf', 'ders' => 'Din Kültürü', 'kazanim_adi' => 'Ahlaki davranışlar'],
            ['sinif' => '7. Sınıf', 'ders' => 'Din Kültürü', 'kazanim_adi' => 'İbadetler'],

            // =====================================================
            // 8. SINIF
            // =====================================================

            // TÜRKÇE
            ['sinif' => '8. Sınıf', 'ders' => 'Türkçe', 'kazanim_adi' => 'Paragraf'],
            ['sinif' => '8. Sınıf', 'ders' => 'Türkçe', 'kazanim_adi' => 'Fiilimsiler'],
            ['sinif' => '8. Sınıf', 'ders' => 'Türkçe', 'kazanim_adi' => 'Cümle türleri'],
            ['sinif' => '8. Sınıf', 'ders' => 'Türkçe', 'kazanim_adi' => 'Sözel mantık'],
            ['sinif' => '8. Sınıf', 'ders' => 'Türkçe', 'kazanim_adi' => 'Anlatım bozuklukları'],

            // MATEMATİK
            ['sinif' => '8. Sınıf', 'ders' => 'Matematik', 'kazanim_adi' => 'Üslü sayılar'],
            ['sinif' => '8. Sınıf', 'ders' => 'Matematik', 'kazanim_adi' => 'Köklü sayılar'],
            ['sinif' => '8. Sınıf', 'ders' => 'Matematik', 'kazanim_adi' => 'Cebirsel ifadeler'],
            ['sinif' => '8. Sınıf', 'ders' => 'Matematik', 'kazanim_adi' => 'Eşitsizlikler'],
            ['sinif' => '8. Sınıf', 'ders' => 'Matematik', 'kazanim_adi' => 'Fonksiyonlar (temel)'],
            ['sinif' => '8. Sınıf', 'ders' => 'Matematik', 'kazanim_adi' => 'Geometri'],

            // FEN
            ['sinif' => '8. Sınıf', 'ders' => 'Fen Bilimleri', 'kazanim_adi' => 'Mevsimler ve iklim'],
            ['sinif' => '8. Sınıf', 'ders' => 'Fen Bilimleri', 'kazanim_adi' => 'DNA ve genetik'],
            ['sinif' => '8. Sınıf', 'ders' => 'Fen Bilimleri', 'kazanim_adi' => 'Basınç'],
            ['sinif' => '8. Sınıf', 'ders' => 'Fen Bilimleri', 'kazanim_adi' => 'Enerji dönüşümleri'],
            ['sinif' => '8. Sınıf', 'ders' => 'Fen Bilimleri', 'kazanim_adi' => 'Elektrik yükleri'],

            // İNKILAP
            ['sinif' => '8. Sınıf', 'ders' => 'T.C. İnkılap Tarihi', 'kazanim_adi' => 'Kurtuluş Savaşı'],
            ['sinif' => '8. Sınıf', 'ders' => 'T.C. İnkılap Tarihi', 'kazanim_adi' => 'Atatürk ilkeleri'],
            ['sinif' => '8. Sınıf', 'ders' => 'T.C. İnkılap Tarihi', 'kazanim_adi' => 'Cumhuriyet dönemi'],
            ['sinif' => '8. Sınıf', 'ders' => 'T.C. İnkılap Tarihi', 'kazanim_adi' => 'Çağdaş Türkiye'],

            // İNGİLİZCE
            ['sinif' => '8. Sınıf', 'ders' => 'İngilizce', 'kazanim_adi' => 'Tenses (zamanlar)'],
            ['sinif' => '8. Sınıf', 'ders' => 'İngilizce', 'kazanim_adi' => 'Conditionals'],
            ['sinif' => '8. Sınıf', 'ders' => 'İngilizce', 'kazanim_adi' => 'Passive voice'],

            // DİN
            ['sinif' => '8. Sınıf', 'ders' => 'Din Kültürü', 'kazanim_adi' => 'Kader ve kaza'],
            ['sinif' => '8. Sınıf', 'ders' => 'Din Kültürü', 'kazanim_adi' => 'İslam düşüncesi'],
            ['sinif' => '8. Sınıf', 'ders' => 'Din Kültürü', 'kazanim_adi' => 'Ahlak'],
        ];

        foreach ($kazanims as $item) {
            Kazanim::create($item);
        }
    }
}