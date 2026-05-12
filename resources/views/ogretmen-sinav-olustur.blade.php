@php
    $isEdit = isset($sinav);
    $branch = $user->branch ?? null;
    $selectedDers = old('ders', $isEdit ? $sinav->ders : $branch);
    $manualInitial = old('manual_questions', $isEdit ? ($sinav->manual_questions ?? []) : []);
    $imageInitial = old('image_questions', $isEdit ? ($sinav->image_questions ?? []) : []);
    $questionCount = old('question_count', max(1, count($manualInitial) + count($imageInitial) + count($isEdit ? ($sinav->question_ids ?? []) : [])));
    $selectedQuestionIds = collect(old('question_ids', $isEdit ? ($sinav->question_ids ?? []) : []))->map(fn($id) => (string)$id)->toArray();
    $kazanimlar = $kazanimlar ?? [];
    $questions = $questions ?? collect();
@endphp
<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Quizion - {{ $isEdit ? 'Sınav Düzenle' : 'Sınav Oluştur' }}</title>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Baloo+2:wght@400;600;700;800&display=swap" rel="stylesheet">
<style>
*{margin:0;padding:0;box-sizing:border-box}:root{--green-dark:#0f5f4d;--green:#1da18a;--green-light:#3acaaa;--purple:#6c35de;--purple-dark:#24114f;--orange:#f5a623;--red:#f04848;--bg:#f5f1ff;--card:#fff;--soft:#faf8ff;--border:#eadfff;--text:#24114f;--muted:#6e5e99;--light:#9384b8;--shadow:0 12px 34px rgba(74,32,150,.10)}
body{background:var(--bg);font-family:'Nunito',sans-serif;color:var(--text);min-height:100vh}a{text-decoration:none;color:inherit}.topbar{height:74px;background:linear-gradient(90deg,var(--green-dark),var(--green));display:flex;align-items:center;justify-content:space-between;padding:0 30px;box-shadow:0 6px 26px rgba(0,0,0,.16)}.logo{font-family:'Baloo 2',cursive;font-size:2rem;font-weight:900;color:white}.logo span{color:var(--orange)}.top-actions{display:flex;align-items:center;gap:12px}.teacher-chip{display:flex;align-items:center;gap:9px;background:rgba(255,255,255,.14);border:1px solid rgba(255,255,255,.22);color:white;padding:7px 13px 7px 8px;border-radius:14px;font-weight:800;font-size:.88rem}.teacher-avatar{width:34px;height:34px;border-radius:10px;background:linear-gradient(135deg,var(--green-light),var(--green));display:flex;align-items:center;justify-content:center;color:white;font-weight:900}.back-btn{background:white;color:var(--green-dark);padding:11px 18px;border-radius:14px;font-weight:900;border:1px solid rgba(255,255,255,.4)}.container{max-width:1250px;margin:34px auto;padding:0 22px}.hero{display:flex;align-items:center;justify-content:space-between;gap:20px;margin-bottom:24px;flex-wrap:wrap}.hero-left h1{font-family:'Baloo 2',cursive;font-size:2.15rem;color:var(--purple-dark);line-height:1.1}.hero-left p{margin-top:7px;color:var(--muted);font-weight:800;font-size:.95rem}.hero-badge{background:white;border:1px solid var(--border);border-radius:18px;padding:14px 18px;box-shadow:0 6px 18px rgba(74,32,150,.07);color:var(--muted);font-weight:900}.main-card{background:var(--card);border:1px solid var(--border);border-radius:28px;box-shadow:var(--shadow);overflow:hidden}.card-head{background:linear-gradient(135deg,rgba(29,161,138,.12),rgba(58,202,170,.05));border-bottom:1px solid var(--border);padding:24px 28px;display:flex;align-items:center;gap:16px}.head-icon{width:58px;height:58px;border-radius:18px;background:linear-gradient(135deg,var(--green-light),var(--green));display:flex;align-items:center;justify-content:center;font-size:1.7rem;flex-shrink:0}.card-head h2{font-family:'Baloo 2',cursive;font-size:1.35rem;color:var(--green-dark)}.card-head p{margin-top:3px;color:var(--muted);font-weight:700;line-height:1.5}.form-body{padding:28px}.error-box{background:#fff0f0;border:1px solid rgba(240,72,72,.25);color:var(--red);padding:15px 17px;border-radius:16px;margin-bottom:22px;font-weight:900}.success-box{background:#ecfff8;border:1px solid rgba(29,161,138,.25);color:var(--green-dark);padding:15px 17px;border-radius:16px;margin-bottom:22px;font-weight:900}.info-box{background:var(--soft);border:1.5px dashed var(--border);border-radius:18px;padding:18px;color:var(--muted);line-height:1.7;font-weight:800;margin-bottom:24px}.grid{display:grid;grid-template-columns:1fr 1fr;gap:18px}.field{margin-bottom:18px}.field label{display:block;font-weight:900;color:var(--purple-dark);margin-bottom:8px;font-size:.9rem}.field input,.field select,.field textarea{width:100%;border:1.5px solid #ddd2ff;border-radius:15px;padding:14px 15px;font-family:'Nunito',sans-serif;font-size:.95rem;font-weight:700;color:var(--text);background:white;outline:none;transition:.2s}.field textarea{min-height:118px;resize:vertical}.field input:focus,.field select:focus,.field textarea:focus{border-color:var(--purple);box-shadow:0 0 0 4px rgba(108,53,222,.12)}.help{margin-top:7px;color:var(--light);font-weight:700;font-size:.78rem;line-height:1.5}.section-title{font-family:'Baloo 2',cursive;font-size:1.45rem;margin:28px 0 14px;color:var(--purple-dark)}.question-tools{display:flex;justify-content:space-between;align-items:center;gap:14px;background:linear-gradient(135deg,rgba(108,53,222,.07),rgba(245,166,35,.05));border:1px solid var(--border);border-radius:20px;padding:18px;margin-bottom:18px;flex-wrap:wrap}.questions-area{display:flex;flex-direction:column;gap:18px}.question-card{background:var(--soft);border:1px solid var(--border);border-radius:22px;overflow:hidden}.question-card-head{background:white;border-bottom:1px solid var(--border);padding:17px 19px;display:flex;align-items:center;justify-content:space-between;gap:12px}.question-card-head h3{font-family:'Baloo 2',cursive;font-size:1.18rem;color:var(--purple-dark)}.question-number{background:linear-gradient(135deg,var(--purple),#8d61ff);color:white;width:38px;height:38px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-weight:900;flex-shrink:0}.question-body{padding:20px}.type-tabs{display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:18px}.type-tabs label{background:white;border:1.5px solid #ddd2ff;border-radius:16px;padding:13px;text-align:center;font-weight:900;cursor:pointer}.manual-area,.image-area{display:none}.question-card.manual .manual-area{display:block}.question-card.image .image-area{display:block}.soft-box,.image-upload-box{background:white;border:1px solid var(--border);border-radius:18px;padding:18px}.image-upload-box{border:2px dashed #d8cbff;background:#fbf9ff}.actions{display:flex;justify-content:space-between;align-items:center;gap:14px;flex-wrap:wrap;margin-top:30px;border-top:1px solid var(--border);padding-top:24px}.cancel-btn{background:white;border:1.5px solid var(--border);color:var(--muted);padding:14px 22px;border-radius:15px;font-weight:900;cursor:pointer;font-family:'Nunito',sans-serif}.submit-btn{border:none;background:linear-gradient(135deg,var(--purple),#8d61ff);color:white;padding:15px 30px;border-radius:15px;font-size:1rem;font-weight:900;cursor:pointer;box-shadow:0 12px 28px rgba(108,53,222,.25);font-family:'Nunito',sans-serif}.bank-box{background:#fff;border:1px solid var(--border);border-radius:18px;padding:16px;margin-bottom:18px}.bank-list{display:grid;grid-template-columns:repeat(2,1fr);gap:10px;max-height:260px;overflow:auto}.bank-item{border:1px solid var(--border);border-radius:12px;padding:10px;background:#faf8ff;font-weight:800;font-size:.84rem}.bank-item input{width:auto;margin-right:8px}.existing-img{display:block;max-width:220px;border-radius:12px;border:1px solid var(--border);margin:10px 0}@media(max-width:850px){.grid,.type-tabs,.bank-list{grid-template-columns:1fr}.topbar{padding:0 16px}.teacher-chip{display:none}.container{margin:24px auto;padding:0 14px}.form-body{padding:20px}.hero-left h1{font-size:1.7rem}}
</style>
</head>
<body>
<div class="topbar"><a href="{{ route('home') }}" class="logo">Quiz<span>ion</span></a><div class="top-actions"><a href="{{ route('profile.edit') }}" class="teacher-chip"><div class="teacher-avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</div>{{ $user->name }}</a><a href="{{ route('ogretmen.dashboard') }}" class="back-btn">← Panele Dön</a></div></div>
<div class="container">
    <div class="hero"><div class="hero-left"><h1>{{ $isEdit ? ' Online Sınavı Düzenle' : ' Yeni Online Sınav Oluştur' }}</h1><p>Süreyi ve soru sayısını klavyeden yaz. Her soru için kazanım seç.</p></div><div class="hero-badge">🔑 Sınav kodu otomatik oluşturulur</div></div>
    <div class="main-card">
        <div class="card-head"><div class="head-icon"></div><div><h2>Sınav Bilgileri</h2><p>Sınav saati gelene kadar sınav içeriğini düzenleyebilirsin.</p></div></div>
        <div class="form-body">
            @if ($errors->any())<div class="error-box">@foreach ($errors->all() as $error)<div>{{ $error }}</div>@endforeach</div>@endif
            @if (session('success'))<div class="success-box">{{ session('success') }}</div>@endif
            <div class="info-box">Ders alanında sadece öğretmen branşın kullanılır. Görsel soru yüklesen bile şıklar, doğru cevap ve kazanım bilgilerini doldurmalısın.</div>
            <form method="POST" action="{{ $isEdit ? route('ogretmen.sinav.guncelle', $sinav) : route('ogretmen.sinav.kaydet') }}" enctype="multipart/form-data">
                @csrf
                <div class="grid">
                    <div class="field"><label>Sınav Başlığı</label><input type="text" name="title" value="{{ old('title', $isEdit ? $sinav->title : '') }}" placeholder="Örn: Matematik Deneme Sınavı" required></div>
                    <div class="field">
                        <label>Ders</label>
                        @if($branch)
                            <input type="text" value="{{ $branch }}" readonly>
                            <input type="hidden" name="ders" value="{{ $branch }}">
                            <div class="help">Sadece kendi branşın kullanılabilir.</div>
                        @else
                            <input type="text" name="ders" value="{{ $selectedDers }}" placeholder="Ders adı">
                        @endif
                    </div>
                </div>
                <div class="grid">
                    <div class="field"><label>Sınıf Seviyesi</label><select name="grade" required><option value="">Sınıf seç</option>@foreach(['5'=>'5. Sınıf','6'=>'6. Sınıf','7'=>'7. Sınıf','8'=>'8. Sınıf'] as $val=>$label)<option value="{{ $val }}" {{ old('grade', $isEdit ? $sinav->grade : '') == $val ? 'selected' : '' }}>{{ $label }}</option>@endforeach</select></div>
                    <div class="field"><label>Sınav Süresi (dakika)</label><input type="number" name="duration" min="1" max="300" value="{{ old('duration', $isEdit ? $sinav->duration : 40) }}" required><div class="help">Örn: 35, 45, 75 gibi istediğin süreyi yaz.</div></div>
                </div>
                <div class="grid">
                    <div class="field"><label>Başlangıç Tarihi ve Saati</label><input type="datetime-local" name="starts_at" value="{{ old('starts_at', $isEdit ? $sinav->starts_at->format('Y-m-d\\TH:i') : '') }}" required></div>
                    <div class="field"><label>Soru Sayısı</label><input type="number" id="questionCount" name="question_count" min="1" max="200" value="{{ $questionCount }}" required><div class="help">Seçtiğin sayı kadar soru alanı açılır.</div></div>
                </div>
                @if($questions->count() > 0)
                <div class="section-title"> Soru Bankasından Seç</div>
                <div class="bank-box"><div class="bank-list">@foreach($questions as $q)<label class="bank-item"><input type="checkbox" name="question_ids[]" value="{{ $q->id }}" {{ in_array((string)$q->id, $selectedQuestionIds) ? 'checked' : '' }}>{{ $q->soru_metni ?: 'Görselli soru' }}<br><small>{{ $q->kazanim }}</small></label>@endforeach</div><div class="help">Soru bankasından seçilen sorular da toplam soru sayısına dahil edilir.</div></div>
                @endif
                <div class="question-tools"><div><strong>📝 Manuel / Görsel Sorular</strong><span>Soru sayısını değiştirince alanlar otomatik güncellenir.</span></div></div>
                <datalist id="kazanimList">@foreach(($kazanimlar ?? []) as $kazanim)<option value="{{ $kazanim }}"></option>@endforeach</datalist>
                <div id="questionsArea" class="questions-area"></div>
                <div class="actions"><a href="{{ route('ogretmen.dashboard') }}" class="cancel-btn">Vazgeç</a><button type="submit" class="submit-btn">{{ $isEdit ? '✅ Sınavı Güncelle' : '✅ Sınavı Oluştur' }}</button></div>
            </form>
        </div>
    </div>
</div>
<script>
const area = document.getElementById('questionsArea');
const countInput = document.getElementById('questionCount');
const initialManual = @json(array_values($manualInitial));
const initialImage = @json(array_values($imageInitial));

function esc(value){return String(value ?? '').replaceAll('&','&amp;').replaceAll('"','&quot;').replaceAll('<','&lt;').replaceAll('>','&gt;');}
function selected(current, value){return current === value ? 'selected' : '';}
function checked(current, value){return current === value ? 'checked' : '';}
function initialFor(index){
    if(initialManual[index]) return {type:'manual', data:initialManual[index]};
    const imageIndex = index - initialManual.length;
    if(initialImage[imageIndex]) return {type:'image', data:initialImage[imageIndex]};
    return {type:'manual', data:{}};
}
function optionFields(prefix, d){
    return `<div class="grid"><div class="field"><label>A Şıkkı</label><input type="text" name="${prefix}[secenek_a]" value="${esc(d.secenek_a)}" placeholder="A şıkkı"></div><div class="field"><label>B Şıkkı</label><input type="text" name="${prefix}[secenek_b]" value="${esc(d.secenek_b)}" placeholder="B şıkkı"></div><div class="field"><label>C Şıkkı</label><input type="text" name="${prefix}[secenek_c]" value="${esc(d.secenek_c)}" placeholder="C şıkkı"></div><div class="field"><label>D Şıkkı</label><input type="text" name="${prefix}[secenek_d]" value="${esc(d.secenek_d)}" placeholder="D şıkkı"></div></div><div class="grid"><div class="field"><label>Doğru Cevap</label><select name="${prefix}[dogru_cevap]"><option value="">Doğru cevabı seç</option><option value="A" ${selected(d.dogru_cevap,'A')}>A</option><option value="B" ${selected(d.dogru_cevap,'B')}>B</option><option value="C" ${selected(d.dogru_cevap,'C')}>C</option><option value="D" ${selected(d.dogru_cevap,'D')}>D</option></select></div><div class="field"><label>Kazanım</label><input list="kazanimList" type="text" name="${prefix}[kazanim]" value="${esc(d.kazanim)}" placeholder="Kazanım seç veya yaz"></div></div>`;
}
function questionTemplate(index){
    const init = initialFor(index); const d = init.data || {}; const type = init.type || 'manual';
    const existingImg = d.path ? `<img class="existing-img" src="/storage/${esc(d.path)}" alt="Mevcut görsel"><input type="hidden" name="image_questions[${index}][existing_path]" value="${esc(d.path)}"><input type="hidden" name="image_questions[${index}][original_name]" value="${esc(d.original_name)}">` : '';
    return `<div class="question-card ${type}" id="qCard_${index}"><div class="question-card-head"><div style="display:flex;align-items:center;gap:12px"><div class="question-number">${index + 1}</div><h3>${index + 1}. Soru</h3></div><span style="color:#9384b8;font-weight:900;font-size:.82rem">Manuel / Görsel</span></div><div class="question-body"><div class="type-tabs"><label><input type="radio" name="question_type_${index}" value="manual" ${checked(type,'manual')} onchange="setType(${index}, 'manual')">✍️ Kendim Yazacağım</label><label><input type="radio" name="question_type_${index}" value="image" ${checked(type,'image')} onchange="setType(${index}, 'image')">🖼️ Görsel Yükleyeceğim</label></div><div class="manual-area"><div class="soft-box"><div class="field"><label>Soru Metni</label><textarea name="manual_questions[${index}][soru_metni]" placeholder="Soruyu yaz...">${esc(type === 'manual' ? d.soru_metni : '')}</textarea></div>${optionFields(`manual_questions[${index}]`, type === 'manual' ? d : {})}</div></div><div class="image-area"><div class="image-upload-box">${existingImg}<div class="field"><label>Soru Görseli</label><input type="file" name="image_questions[${index}][gorsel]" accept="image/*"><div class="help">Yeni görsel seçersen mevcut görsel değişir.</div></div><div class="field"><label>Görsel Soru Açıklaması</label><textarea name="image_questions[${index}][soru_metni]" placeholder="İsteğe bağlı soru açıklaması...">${esc(type === 'image' ? d.soru_metni : '')}</textarea></div>${optionFields(`image_questions[${index}]`, type === 'image' ? d : {})}</div></div></div></div>`;
}
function renderQuestions(){const count = Math.max(1, parseInt(countInput.value || 1)); area.innerHTML=''; for(let i=0;i<count;i++){area.innerHTML += questionTemplate(i);}}
function setType(index,type){const card=document.getElementById(`qCard_${index}`); if(!card)return; card.classList.remove('manual','image'); card.classList.add(type);}
countInput.addEventListener('change', renderQuestions); countInput.addEventListener('input', renderQuestions); renderQuestions();
</script>
</body>
</html>
