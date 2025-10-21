<?php
// include koneksi database
include "db.php";

// Proses form ketika disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];

    // Proses upload gambar
    $gambar = "";
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $target_dir = "gambar/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $file_name = basename($_FILES["gambar"]["name"]);
        $target_file = $target_dir . time() . "_" . $file_name;

        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            $gambar = $target_file;
        }
    }

    // Simpan ke database
    $query = "INSERT INTO produk (nama_produk, deskripsi, harga, gambar) 
              VALUES ('$nama', '$deskripsi', '$harga', '$gambar')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Produk berhasil ditambahkan!'); window.location='dashboard.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan produk: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tambah Produk - Toko Bunga</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-pink-50 text-gray-800 font-sans">

  <!-- Navbar -->
  <nav class="bg-pink-600 text-white p-4 shadow-md">
    <div class="container mx-auto flex justify-between items-center">
      <h1 class="text-2xl font-bold">Tambah Produk 🌸</h1>
      <a href="dashboard.php" class="bg-white text-pink-600 px-4 py-2 rounded-lg hover:bg-pink-200 font-semibold text-sm sm:text-base">
        Kembali ke Dashboard
      </a>
    </div>
  </nav>

  <!-- Main Content -->
  <main class="container mx-auto px-6 py-10">
    <div class="bg-white rounded-xl shadow-md p-8 max-w-2xl mx-auto">
      <h2 class="text-3xl font-bold text-pink-700 mb-6 text-center">Form Tambah Produk</h2>

      <form action="" method="POST" enctype="multipart/form-data" class="space-y-6">
        <!-- Gambar -->
        <div>
          <label class="block text-gray-700 font-medium mb-2">Gambar Produk</label>
          <input type="file" name="gambar" accept="image/*"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400 bg-white" />
          <p class="text-sm text-gray-500 mt-1">Unggah gambar produk (format JPG, PNG)</p>
        </div>

        <!-- Nama Produk -->
        <div>
          <label class="block text-gray-700 font-medium mb-2">Nama Produk</label>
          <input type="text" name="nama" placeholder="Contoh: Mawar Merah"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400" required />
        </div>

        <!-- Deskripsi -->
        <div>
          <label class="block text-gray-700 font-medium mb-2">Deskripsi Produk</label>
          <textarea name="deskripsi" rows="4" placeholder="Tulis deskripsi singkat produk..."
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400" required></textarea>
        </div>

        <!-- Harga -->
        <div>
          <label class="block text-gray-700 font-medium mb-2">Harga Produk (Rp)</label>
          <input type="number" name="harga" placeholder="Contoh: 100000"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400" required />
        </div>

        <!-- Tombol -->
        <div class="flex justify-end space-x-4 pt-4">
          <a href="dashboard.php" class="bg-gray-300 text-gray-800 px-5 py-2 rounded-lg hover:bg-gray-400 font-medium">
            Batal
          </a>
          <button type="submit" class="bg-pink-600 text-white px-5 py-2 rounded-lg hover:bg-pink-700 font-medium">
            Simpan Produk
          </button>
        </div>
      </form>
    </div>
  </main>

  <!-- Footer -->
  <footer class="text-center py-6 text-gray-600 text-sm mt-10">
    © 2025 Toko Bunga | Form Tambah Produk
  </footer>

</body>
</html>
