<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Quizion - Soru Üretim Merkezi</title>

<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">

<style>
body{
    margin:0;
    font-family:'Nunito',sans-serif;
    background:#f4f0ff;
    color:#1e0e4b;
}

.container{
    max-width:900px;
    margin:40px auto;
    background:white;
    padding:30px;
    border-radius:24px;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
}

h1{
    margin-bottom:10px;
    font-size:2rem;
}

.desc{
    color:#666;
    margin-bottom:30px;
}

.form-group{
    margin-bottom:20px;
}

label{
    display:block;
    font-weight:700;
    margin-bottom:8px;
}

input,
select,
textarea{
    width:100%;
    padding:14px;
    border-radius:14px;
    border:1px solid #ddd;
    font-family:'Nunito',sans-serif;
    font-size:15px;
    box-sizing:border-box;
}

textarea{
    min-height:140px;
    resize:vertical;
}

.grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:16px;
}

.btn{
    width:100%;
    border:none;
    background:linear-gradient(135deg,#3acaaa,#1da18a);
    color:white;
    padding:16px;
    border-radius:16px;
    font-size:16px;
    font-weight:800;
    cursor:pointer;
    transition:.3s;
}

.btn:hover{
    transform:translateY(-2px);
}

.success{
    background:#d9fff3;
    color:#00795d;
    padding:14px;
    border-radius:14px;
    margin-bottom:20px;
    font-weight:700;
}

.error{
    background:#ffe1e1;
    color:#c62828;
    padding:14px;
    border-radius:14px;
    margin-bottom:20px;
    font-weight:700;
}
</style>
</head>
<body>

<div class="container">

    <h1> Soru Üretim Merkezi</h1>
    <div class="desc">
        Oluşturduğun sorular öğrencilerin test oluştur ekranına otomatik eklenir.
    </div>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="error">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('ogretmen.soru.kaydet') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid">

            <div class="form-group">
                <label>Sınıf</label>
                <select name="sinif" required>
                    <option value="5. Sınıf">5. Sınıf</option>
                    <option value="6. Sınıf">6. Sınıf</option>
                    <option value="7. Sınıf">7. Sınıf</option>
                    <option value="8. Sınıf">8. Sınıf</option>
                </select>
            </div>

            <div class="form-group">
                <label>Ders</label>
                <input type="text" name="ders" required>
            </div>

        </div>

        <div class="grid">

            <div class="form-group">
                <label>Kazanım</label>
                <input type="text" name="kazanim" required>
            </div>

            <div class="form-group">
                <label>Zorluk</label>
                <select name="zorluk" required>
                    <option value="Kolay">Kolay</option>
                    <option value="Orta">Orta</option>
                    <option value="Zor">Zor</option>
                </select>
            </div>

        </div>

        <div class="form-group">
            <label>Soru Metni</label>
            <textarea name="soru_metni"></textarea>
        </div>

        <div class="form-group">
            <label>Soru Görseli (İsteğe Bağlı)</label>
            <input type="file" name="gorsel">
        </div>

        <div class="grid">

            <div class="form-group">
                <label>A Şıkkı</label>
                <input type="text" name="secenek_a" required>
            </div>

            <div class="form-group">
                <label>B Şıkkı</label>
                <input type="text" name="secenek_b" required>
            </div>

            <div class="form-group">
                <label>C Şıkkı</label>
                <input type="text" name="secenek_c" required>
            </div>

            <div class="form-group">
                <label>D Şıkkı</label>
                <input type="text" name="secenek_d" required>
            </div>

        </div>

        <div class="form-group">
            <label>Doğru Cevap</label>
            <select name="dogru_cevap" required>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
            </select>
        </div>

        <button type="submit" class="btn">
            ➕ Soruyu Sisteme Kaydet
        </button>

    </form>

</div>

</body>
</html>