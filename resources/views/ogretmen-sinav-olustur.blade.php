<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Quizion - Sınav Oluştur</title>

<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Baloo+2:wght@400;600;700;800&display=swap" rel="stylesheet">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

:root{
    --green-dark:#0f5f4d;
    --green:#1da18a;
    --green-light:#3acaaa;
    --purple:#6c35de;
    --purple-dark:#24114f;
    --orange:#f5a623;
    --red:#f04848;
    --bg:#f5f1ff;
    --card:#ffffff;
    --soft:#faf8ff;
    --border:#eadfff;
    --text:#24114f;
    --muted:#6e5e99;
    --light:#9384b8;
    --shadow:0 12px 34px rgba(74,32,150,.10);
}

body{
    background:var(--bg);
    font-family:'Nunito',sans-serif;
    color:var(--text);
    min-height:100vh;
}

a{
    text-decoration:none;
    color:inherit;
}

.topbar{
    height:74px;
    background:linear-gradient(90deg,var(--green-dark),var(--green));
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:0 30px;
    box-shadow:0 6px 26px rgba(0,0,0,.16);
}

.logo{
    font-family:'Baloo 2',cursive;
    font-size:2rem;
    font-weight:900;
    color:white;
}

.logo span{
    color:var(--orange);
}

.top-actions{
    display:flex;
    align-items:center;
    gap:12px;
}

.teacher-chip{
    display:flex;
    align-items:center;
    gap:9px;
    background:rgba(255,255,255,.14);
    border:1px solid rgba(255,255,255,.22);
    color:white;
    padding:7px 13px 7px 8px;
    border-radius:14px;
    font-weight:800;
    font-size:.88rem;
}

.teacher-avatar{
    width:34px;
    height:34px;
    border-radius:10px;
    background:linear-gradient(135deg,var(--green-light),var(--green));
    display:flex;
    align-items:center;
    justify-content:center;
    color:white;
    font-weight:900;
}

.back-btn{
    background:white;
    color:var(--green-dark);
    padding:11px 18px;
    border-radius:14px;
    font-weight:900;
    border:1px solid rgba(255,255,255,.4);
    transition:.2s;
}

.back-btn:hover{
    transform:translateY(-1px);
}

.container{
    max-width:1250px;
    margin:34px auto;
    padding:0 22px;
}

.hero{
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:20px;
    margin-bottom:24px;
    flex-wrap:wrap;
}

.hero-left h1{
    font-family:'Baloo 2',cursive;
    font-size:2.15rem;
    color:var(--purple-dark);
    line-height:1.1;
}

.hero-left p{
    margin-top:7px;
    color:var(--muted);
    font-weight:800;
    font-size:.95rem;
}

.hero-badge{
    background:white;
    border:1px solid var(--border);
    border-radius:18px;
    padding:14px 18px;
    box-shadow:0 6px 18px rgba(74,32,150,.07);
    color:var(--muted);
    font-weight:900;
}

.main-card{
    background:var(--card);
    border:1px solid var(--border);
    border-radius:28px;
    box-shadow:var(--shadow);
    overflow:hidden;
}

.card-head{
    background:linear-gradient(135deg,rgba(29,161,138,.12),rgba(58,202,170,.05));
    border-bottom:1px solid var(--border);
    padding:24px 28px;
    display:flex;
    align-items:center;
    gap:16px;
}

.head-icon{
    width:58px;
    height:58px;
    border-radius:18px;
    background:linear-gradient(135deg,var(--green-light),var(--green));
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:1.7rem;
    flex-shrink:0;
}

.card-head h2{
    font-family:'Baloo 2',cursive;
    font-size:1.35rem;
    color:var(--green-dark);
}

.card-head p{
    margin-top:3px;
    color:var(--muted);
    font-weight:700;
    line-height:1.5;
}

.form-body{
    padding:28px;
}

.error-box{
    background:#fff0f0;
    border:1px solid rgba(240,72,72,.25);
    color:var(--red);
    padding:15px 17px;
    border-radius:16px;
    margin-bottom:22px;
    font-weight:900;
}

.info-box{
    background:var(--soft);
    border:1.5px dashed var(--border);
    border-radius:18px;
    padding:18px;
    color:var(--muted);
    line-height:1.7;
    font-weight:800;
    margin-bottom:24px;
}

.grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:18px;
}

.field{
    margin-bottom:18px;
}

.field label{
    display:block;
    font-weight:900;
    color:var(--purple-dark);
    margin-bottom:8px;
    font-size:.9rem;
}

.field input,
.field select,
.field textarea{
    width:100%;
    border:1.5px solid #ddd2ff;
    border-radius:15px;
    padding:14px 15px;
    font-family:'Nunito',sans-serif;
    font-size:.95rem;
    font-weight:700;
    color:var(--text);
    background:white;
    outline:none;
    transition:.2s;
}

.field textarea{
    min-height:118px;
    resize:vertical;
}

.field input:focus,
.field select:focus,
.field textarea:focus{
    border-color:var(--purple);
    box-shadow:0 0 0 4px rgba(108,53,222,.12);
}

.help{
    margin-top:7px;
    color:var(--light);
    font-weight:700;
    font-size:.78rem;
    line-height:1.5;
}

.preview-row{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:14px;
    margin:10px 0 28px;
}

.preview-card{
    background:var(--soft);
    border:1px solid var(--border);
    border-radius:18px;
    padding:17px;
}

.preview-card .emoji{
    font-size:1.5rem;
    margin-bottom:8px;
}

.preview-card strong{
    display:block;
    color:var(--purple-dark);
    font-size:.88rem;
    margin-bottom:4px;
}

.preview-card span{
    display:block;
    color:var(--light);
    font-size:.78rem;
    font-weight:800;
    line-height:1.5;
}

.section-title{
    font-family:'Baloo 2',cursive;
    font-size:1.45rem;
    margin:28px 0 14px;
    color:var(--purple-dark);
}

.question-tools{
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:14px;
    background:linear-gradient(135deg,rgba(108,53,222,.07),rgba(245,166,35,.05));
    border:1px solid var(--border);
    border-radius:20px;
    padding:18px;
    margin-bottom:18px;
    flex-wrap:wrap;
}

.question-tools strong{
    color:var(--purple-dark);
    font-size:1rem;
}

.question-tools span{
    display:block;
    margin-top:4px;
    color:var(--muted);
    font-weight:700;
    font-size:.84rem;
}

.question-count-box{
    min-width:220px;
}

.questions-area{
    display:flex;
    flex-direction:column;
    gap:18px;
}

.question-card{
    background:var(--soft);
    border:1px solid var(--border);
    border-radius:22px;
    overflow:hidden;
}

.question-card-head{
    background:white;
    border-bottom:1px solid var(--border);
    padding:17px 19px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:12px;
}

.question-card-head h3{
    font-family:'Baloo 2',cursive;
    font-size:1.18rem;
    color:var(--purple-dark);
}

.question-number{
    background:linear-gradient(135deg,var(--purple),#8d61ff);
    color:white;
    width:38px;
    height:38px;
    border-radius:12px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:900;
    flex-shrink:0;
}

.question-body{
    padding:20px;
}

.type-tabs{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:12px;
    margin-bottom:18px;
}

.type-tabs label{
    background:white;
    border:1.5px solid #ddd2ff;
    border-radius:16px;
    padding:13px;
    text-align:center;
    font-weight:900;
    cursor:pointer;
    transition:.2s;
}

.type-tabs label:hover{
    border-color:var(--purple);
}

.type-tabs input{
    width:auto;
    margin-right:7px;
}

.manual-area,
.image-area{
    display:none;
}

.question-card.manual .manual-area{
    display:block;
}

.question-card.image .image-area{
    display:block;
}

.soft-box{
    background:white;
    border:1px solid var(--border);
    border-radius:18px;
    padding:18px;
}

.image-upload-box{
    border:2px dashed #d8cbff;
    background:#fbf9ff;
    border-radius:18px;
    padding:20px;
}

.image-upload-box input{
    background:white;
}

.actions{
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:14px;
    flex-wrap:wrap;
    margin-top:30px;
    border-top:1px solid var(--border);
    padding-top:24px;
}

.cancel-btn{
    background:white;
    border:1.5px solid var(--border);
    color:var(--muted);
    padding:14px 22px;
    border-radius:15px;
    font-weight:900;
    cursor:pointer;
    font-family:'Nunito',sans-serif;
}

.submit-btn{
    border:none;
    background:linear-gradient(135deg,var(--purple),#8d61ff);
    color:white;
    padding:15px 30px;
    border-radius:15px;
    font-size:1rem;
    font-weight:900;
    cursor:pointer;
    box-shadow:0 12px 28px rgba(108,53,222,.25);
    font-family:'Nunito',sans-serif;
}

.submit-btn:hover{
    transform:translateY(-1px);
}

@media(max-width:850px){
    .grid,
    .preview-row,
    .type-tabs{
        grid-template-columns:1fr;
    }

    .topbar{
        padding:0 16px;
    }

    .logo{
        font-size:1.55rem;
    }

    .teacher-chip{
        display:none;
    }

    .container{
        margin:24px auto;
        padding:0 14px;
    }

    .form-body{
        padding:20px;
    }

    .hero-left h1{
        font-size:1.7rem;
    }
}
</style>
</head>

<body>

<div class="topbar">
    <a href="{{ route('home') }}" class="logo">
        Quiz<span>ion</span>
    </a>

    <div class="top-actions">
        <a href="{{ route('profile.edit') }}" class="teacher-chip">
            <div class="teacher-avatar">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>
            {{ $user->name }}
        </a>

        <a href="{{ route('ogretmen.dashboard') }}" class="back-btn">
            ← Panele Dön
        </a>
    </div>
</div>

<div class="container">

    <div class="hero">
        <div class="hero-left">
            <h1>📋 Yeni Online Sınav Oluştur</h1>
            <p>
                Soru sayısını belirle. Her soruyu ister kendin yaz, ister görsel olarak yükle.
            </p>
        </div>

        <div class="hero-badge">
            🔑 Sınav kodu otomatik oluşturulur
        </div>
    </div>

    <div class="main-card">

        <div class="card-head">
            <div class="head-icon">🧠</div>

            <div>
                <h2>Sınav Bilgileri</h2>
                <p>
                    Oluşturulan sınav, seçilen sınıf seviyesindeki öğrencilerin panelinde görünür.
                </p>
            </div>
        </div>

        <div class="form-body">

            @if ($errors->any())
                <div class="error-box">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <div class="info-box">
                Öğretmen sınav oluştururken önce sınavın temel bilgilerini girer.
                Daha sonra kaç soru olacağını seçer. Seçilen soru sayısına göre aşağıda otomatik soru alanları oluşur.
                Her soru için manuel yazma veya görsel yükleme seçilebilir.
            </div>

            <form method="POST" action="{{ route('ogretmen.sinav.kaydet') }}" enctype="multipart/form-data">
                @csrf

                <div class="grid">
                    <div class="field">
                        <label>Sınav Başlığı</label>
                        <input type="text" name="title" value="{{ old('title') }}" placeholder="Örn: Matematik Deneme Sınavı" required>
                    </div>

                    <div class="field">
                        <label>Ders</label>
                        <select name="ders">
                            <option value="">Genel Sınav</option>
                            <option value="Matematik" {{ old('ders') == 'Matematik' ? 'selected' : '' }}>Matematik</option>
                            <option value="Fen Bilimleri" {{ old('ders') == 'Fen Bilimleri' ? 'selected' : '' }}>Fen Bilimleri</option>
                            <option value="Türkçe" {{ old('ders') == 'Türkçe' ? 'selected' : '' }}>Türkçe</option>
                            <option value="Sosyal Bilgiler" {{ old('ders') == 'Sosyal Bilgiler' ? 'selected' : '' }}>Sosyal Bilgiler</option>
                            <option value="İngilizce" {{ old('ders') == 'İngilizce' ? 'selected' : '' }}>İngilizce</option>
                        </select>
                    </div>
                </div>

                <div class="grid">
                    <div class="field">
                        <label>Sınıf Seviyesi</label>
                        <select name="grade" required>
                            <option value="">Sınıf seç</option>
                            <option value="5" {{ old('grade') == '5' ? 'selected' : '' }}>5. Sınıf</option>
                            <option value="6" {{ old('grade') == '6' ? 'selected' : '' }}>6. Sınıf</option>
                            <option value="7" {{ old('grade') == '7' ? 'selected' : '' }}>7. Sınıf</option>
                            <option value="8" {{ old('grade') == '8' ? 'selected' : '' }}>8. Sınıf</option>
                        </select>
                        <div class="help">
                            Öğrenci sınıfı ile aynı olan sınavlar öğrenci panelinde görünür.
                        </div>
                    </div>

                    <div class="field">
                        <label>Sınav Süresi</label>
                        <select name="duration" required>
                            <option value="20" {{ old('duration') == '20' ? 'selected' : '' }}>20 Dakika</option>
                            <option value="30" {{ old('duration') == '30' ? 'selected' : '' }}>30 Dakika</option>
                            <option value="40" {{ old('duration', '40') == '40' ? 'selected' : '' }}>40 Dakika</option>
                            <option value="60" {{ old('duration') == '60' ? 'selected' : '' }}>60 Dakika</option>
                            <option value="90" {{ old('duration') == '90' ? 'selected' : '' }}>90 Dakika</option>
                            <option value="120" {{ old('duration') == '120' ? 'selected' : '' }}>120 Dakika</option>
                        </select>
                    </div>
                </div>

                <div class="grid">
                    <div class="field">
                        <label>Başlangıç Tarihi ve Saati</label>
                        <input type="datetime-local" name="starts_at" value="{{ old('starts_at') }}" required>
                    </div>

                    <div class="field question-count-box">
                        <label>Soru Sayısı</label>
                        <select id="questionCount" name="question_count" required>
                            <option value="1">1 Soru</option>
                            <option value="2">2 Soru</option>
                            <option value="3">3 Soru</option>
                            <option value="4">4 Soru</option>
                            <option value="5">5 Soru</option>
                            <option value="10">10 Soru</option>
                            <option value="15">15 Soru</option>
                            <option value="20">20 Soru</option>
                        </select>
                        <div class="help">
                            Seçtiğin sayı kadar soru alanı otomatik açılır.
                        </div>
                    </div>
                </div>

                <div class="preview-row">
                    <div class="preview-card">
                        <div class="emoji">✍️</div>
                        <strong>Manuel Soru</strong>
                        <span>Soruyu ve şıkları kendin yazabilirsin.</span>
                    </div>

                    <div class="preview-card">
                        <div class="emoji">🖼️</div>
                        <strong>Görsel Soru</strong>
                        <span>Hazır soru görselini dosya olarak yükleyebilirsin.</span>
                    </div>

                    <div class="preview-card">
                        <div class="emoji">🔔</div>
                        <strong>Öğrenci Bildirimi</strong>
                        <span>Sınav öğrenci panelindeki bildirimlere düşer.</span>
                    </div>
                </div>

                <div class="question-tools">
                    <div>
                        <strong>📝 Sınav Soruları</strong>
                        <span>
                            Her soru için yöntem seç: manuel yaz veya görsel yükle.
                        </span>
                    </div>

                    <div class="question-count-box">
                        <div class="help">
                            Soru sayısını yukarıdaki alandan değiştirebilirsin.
                        </div>
                    </div>
                </div>

                <div id="questionsArea" class="questions-area"></div>

                <div class="actions">
                    <a href="{{ route('ogretmen.dashboard') }}" class="cancel-btn">
                        Vazgeç
                    </a>

                    <button type="submit" class="submit-btn">
                        ✅ Sınavı Oluştur
                    </button>
                </div>

            </form>

        </div>

    </div>

</div>

<script>
const area = document.getElementById('questionsArea');
const countSelect = document.getElementById('questionCount');

function questionTemplate(index){
    return `
        <div class="question-card manual" id="qCard_${index}">
            <div class="question-card-head">
                <div style="display:flex;align-items:center;gap:12px">
                    <div class="question-number">${index + 1}</div>
                    <h3>${index + 1}. Soru</h3>
                </div>

                <span style="color:#9384b8;font-weight:900;font-size:.82rem">
                    Manuel / Görsel
                </span>
            </div>

            <div class="question-body">
                <div class="type-tabs">
                    <label>
                        <input type="radio" name="question_type_${index}" value="manual" checked onchange="setType(${index}, 'manual')">
                        ✍️ Kendim Yazacağım
                    </label>

                    <label>
                        <input type="radio" name="question_type_${index}" value="image" onchange="setType(${index}, 'image')">
                        🖼️ Görsel Yükleyeceğim
                    </label>
                </div>

                <div class="manual-area">
                    <div class="soft-box">
                        <div class="field">
                            <label>Soru Metni</label>
                            <textarea name="manual_questions[${index}][soru_metni]" placeholder="Soruyu yaz..."></textarea>
                        </div>

                        <div class="grid">
                            <div class="field">
                                <label>A Şıkkı</label>
                                <input type="text" name="manual_questions[${index}][secenek_a]" placeholder="A şıkkı">
                            </div>

                            <div class="field">
                                <label>B Şıkkı</label>
                                <input type="text" name="manual_questions[${index}][secenek_b]" placeholder="B şıkkı">
                            </div>

                            <div class="field">
                                <label>C Şıkkı</label>
                                <input type="text" name="manual_questions[${index}][secenek_c]" placeholder="C şıkkı">
                            </div>

                            <div class="field">
                                <label>D Şıkkı</label>
                                <input type="text" name="manual_questions[${index}][secenek_d]" placeholder="D şıkkı">
                            </div>
                        </div>

                        <div class="field">
                            <label>Doğru Cevap</label>
                            <select name="manual_questions[${index}][dogru_cevap]">
                                <option value="">Doğru cevabı seç</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="image-area">
                    <div class="image-upload-box">
                        <div class="field">
                            <label>Soru Görseli</label>
                            <input type="file" name="image_questions[${index}]" accept="image/*">
                            <div class="help">
                                JPG, PNG veya WEBP formatında görsel soru yükleyebilirsin.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
}

function renderQuestions(){
    const count = parseInt(countSelect.value);
    area.innerHTML = '';

    for(let i = 0; i < count; i++){
        area.innerHTML += questionTemplate(i);
    }
}

function setType(index, type){
    const card = document.getElementById(`qCard_${index}`);

    if(!card){
        return;
    }

    card.classList.remove('manual', 'image');
    card.classList.add(type);
}

countSelect.addEventListener('change', renderQuestions);

renderQuestions();
</script>

</body>
</html>