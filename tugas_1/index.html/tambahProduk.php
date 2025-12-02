<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Wisata Bandung</title>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        background: #f4f4f4;
    }

    header {
        background: #3F51B5;
        color: white;
        padding: 20px;
        text-align: center;
        font-size: 26px;
        font-weight: bold;
    }

    .section {
        padding: 20px;
        background: white;
        margin: 15px;
        border-radius: 10px;
        box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }

    img {
        width: 100%;
        border-radius: 10px;
        margin-top: 10px;
    }

    .form-box input, .form-box button {
        width: 100%;
        padding: 12px;
        margin-top: 10px;
        border-radius: 8px;
        border: 1px solid #ccc;
    }

    button {
        background: #3F51B5;
        color: white;
        border: none;
        cursor: pointer;
        font-size: 16px;
    }

    button:hover {
        background: #2f409e;
    }
</style>

</head>
<body>

<header>
    Wisata Bandung
</header>

<!-- WISATA 1 -->
<div class="section">
    <h2>Kawah Putih</h2>
    <img src="D:\download (1).webp" alt="Kawah Putih">
    <p>
        Kawah Putih adalah danau vulkanik yang terkenal dengan warna airnya yang putih kehijauan. 
        Tempat ini berada di Ciwidey dan menjadi ikon wisata alam Bandung yang wajib dikunjungi.
    </p>
</div>

<!-- WISATA 2 -->
<div class="section">
    <h2>Farmhouse Lembang</h2>
    <img src="D:\download (2).webp" alt="Farmhouse Lembang">
    <p>
        Farmhouse Lembang memiliki suasana Eropa dengan rumah-rumah ala Belanda, kebun bunga, dan spot foto menarik.
        Tempat ini cocok untuk liburan keluarga dan foto-foto aesthetic.
    </p>
</div>

<!-- WISATA 3 -->
<div class="section">
    <h2>Dusun Bambu</h2>
    <img src="D:\download (3).webp" alt="Dusun Bambu">
    <p>
        Dusun Bambu adalah tempat wisata alam dengan suasana pegunungan, danau, serta restoran unik berbentuk sangkar bambu.
        Sangat populer untuk wisata keluarga dan refreshing.
    </p>
</div>

<!-- PETA -->
<div class="section">
    <h2>Peta Lokasi Kota Bandung</h2>
    <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.221972005508!2d107.60981!3d-6.914744"
        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy">
    </iframe>
</div>

<!-- FORM -->
<div class="section">
    <h2>Pendaftaran Wisata</h2>
    <div class="form-box">
        <input type="text" id="nama" placeholder="Nama Lengkap">
        <input type="email" id="email" placeholder="Email">
        <input type="text" id="tujuan" placeholder="Tujuan Wisata">
        <button onclick="kirim()">Kirim</button>
    </div>
</div>

<script>
function kirim() {
    let nama = document.getElementById("nama").value;
    let email = document.getElementById("email").value;
    let tujuan = document.getElementById("tujuan").value;

    if(nama === "" || email === "" || tujuan === "") {
        alert("Harap isi semua data!");
    } else {
        alert(
            "Pendaftaran Berhasil!\n" +
            "Nama : " + nama + "\n" +
            "Email : " + email + "\n" +
            "Tujuan : " + tujuan
        );
    }
}
</script>

</body>
</html>