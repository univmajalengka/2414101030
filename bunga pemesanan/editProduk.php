<?php
include "db.php";

// Pastikan ada ID produk yang dikirim via URL
if (!isset($_GET['id'])) {
    echo "<script>alert('ID produk tidak ditemukan!'); window.location='dashboard.php';</script>";
    exit;
}

$id_produk = $_GET['id'];

// Ambil data produk dari database
$query = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$id_produk'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "<script>alert('Produk tidak ditemukan!'); window.location='dashboard.php';</script>";
    exit;
}

// Proses update data jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $gambar_baru = $data['gambar']; // default: gambar lama

    // Jika user upload gambar baru
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $target_dir = "gambar/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $file_name = basename($_FILES["gambar"]["name"]);
        $target_file = $target_dir . time() . "_" . $file_name;

        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            // Hapus gambar lama jika ada
            if (!empty($data['gambar']) && file_exists($data['gambar'])) {
                unlink($data['gambar']);
            }
            $gambar_baru = $target_file;
        }
    }

    // Update database
    $update = mysqli_query($conn, "UPDATE produk 
        SET nama_produk='$nama', deskripsi='$deskripsi', harga='$harga', gambar='$gambar_baru'
        WHERE id_produk='$id_produk'");

    if ($update) {
        echo "<script>alert('Produk berhasil diperbarui!'); window.location='dashboard.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui produk: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit Produk - Toko Bunga</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-pink-50 text-gray-800 font-sans">

  <!-- Navbar -->
  <nav class="bg-pink-600 text-white p-4 shadow-md">
    <div class="container mx-auto flex justify-between items-center">
      <h1 class="text-2xl font-bold">Edit Produk 🌷</h1>
      <a href="dashboard.php" class="bg-white text-pink-600 px-4 py-2 rounded-lg hover:bg-pink-200 font-semibold text-sm sm:text-base">
        Kembali ke Dashboard
      </a>
    </div>
  </nav>

  <!-- Main Content -->
  <main class="container mx-auto px-6 py-10">
    <div class="bg-white rounded-xl shadow-md p-8 max-w-2xl mx-auto">
      <h2 class="text-3xl font-bold text-pink-700 mb-6 text-center">Form Edit Produk</h2>

      <form action="" method="POST" enctype="multipart/form-data" class="space-y-6">
        <!-- Gambar -->
        <div>
          <label class="block text-gray-700 font-medium mb-2">Gambar Produk</label>
          <div class="flex items-center space-x-4">
            <?php if (!empty($data['gambar'])): ?>
              <img src="<?= $data['gambar'] ?>" 
                   alt="<?= htmlspecialchars($data['nama_produk']) ?>" 
                   class="w-20 h-20 rounded-lg object-cover border border-gray-300">
            <?php else: ?>
              <div class="w-20 h-20 rounded-lg bg-gray-200 flex items-center justify-center text-gray-500">No Image</div>
            <?php endif; ?>
            <input type="file" name="gambar" accept="image/*"
              class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400 bg-white" />
          </div>
          <p class="text-sm text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengganti gambar.</p>
        </div>

        <!-- Nama Produk -->
        <div>
          <label class="block text-gray-700 font-medium mb-2">Nama Produk</label>
          <input type="text" name="nama" value="<?= htmlspecialchars($data['nama_produk']) ?>"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400" required />
        </div>

        <!-- Deskripsi -->
        <div>
          <label class="block text-gray-700 font-medium mb-2">Deskripsi Produk</label>
          <textarea name="deskripsi" rows="4"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400" required><?= htmlspecialchars($data['deskripsi']) ?></textarea>
        </div>

        <!-- Harga -->
        <div>
          <label class="block text-gray-700 font-medium mb-2">Harga Produk (Rp)</label>
          <input type="number" name="harga" value="<?= htmlspecialchars($data['harga']) ?>"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400" required />
        </div>

        <!-- Tombol -->
        <div class="flex justify-end space-x-4 pt-4">
          <a href="dashboard.php" class="bg-gray-300 text-gray-800 px-5 py-2 rounded-lg hover:bg-gray-400 font-medium">
            Batal
          </a>
          <button type="submit" class="bg-pink-600 text-white px-5 py-2 rounded-lg hover:bg-pink-700 font-medium">
            Simpan Perubahan
          </button>
        </div>
      </form>
    </div>
  </main>

  <!-- Footer -->
  <footer class="text-center py-6 text-gray-600 text-sm mt-10">
    © 2025 Toko Bunga | Form Edit Produk
  </footer>

</body>
</html>
