<?php
// Koneksi ke database
include "db.php";
// Cek koneksi
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil semua data produk
$sql = "SELECT * FROM produk ORDER BY id_produk DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Toko Bunga</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-pink-50 text-gray-800 font-sans">

  <!-- Navbar -->
  <nav class="bg-pink-600 text-white p-4 shadow-md">
    <div class="container mx-auto flex justify-between items-center">
      <h1 class="text-2xl font-bold">Dashboard Toko Bunga 🌸</h1>
      <a href="index.php" class="bg-white text-pink-600 px-4 py-2 rounded-lg hover:bg-pink-200 font-semibold text-sm sm:text-base">
        Kembali ke Beranda
      </a>
    </div>
  </nav>

  <!-- Main Content -->
  <main class="container mx-auto p-6">
    <div class="flex flex-col sm:flex-row justify-between items-center mb-6">
      <h2 class="text-3xl font-bold text-pink-700 mb-4 sm:mb-0">Daftar Produk</h2>
      <a href="tambahProduk.php" class="bg-pink-600 text-white px-5 py-2 rounded-lg hover:bg-pink-700 transition text-sm sm:text-base">
        + Tambah Produk
      </a>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
      <table class="w-full border-collapse min-w-[700px]">
        <thead class="bg-pink-200 text-pink-800">
          <tr>
            <th class="py-3 px-4 text-left">#</th>
            <th class="py-3 px-4 text-left">Gambar</th>
            <th class="py-3 px-4 text-left">Nama Produk</th>
            <th class="py-3 px-4 text-left">Deskripsi</th>
            <th class="py-3 px-4 text-left">Harga</th>
            <th class="py-3 px-4 text-left">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-pink-100">

          <?php
          if ($result->num_rows > 0) {
            $no = 1;
            while ($row = $result->fetch_assoc()) {
              $id = $row['id_produk'];
              $nama = htmlspecialchars($row['nama_produk']);
              $deskripsi = htmlspecialchars($row['deskripsi']);
              $harga = number_format($row['harga'], 0, ',', '.');
              $gambar = !empty($row['gambar']) ? $row['gambar'] : 'https://via.placeholder.com/80x60?text=No+Image';

              echo "
              <tr class='hover:bg-pink-50'>
                <td class='py-3 px-4'>{$no}</td>
                <td class='py-3 px-4'>
                  <img src='{$gambar}' alt='{$nama}' class='w-20 h-14 object-cover rounded-lg border'>
                </td>
                <td class='py-3 px-4 font-semibold text-pink-700'>{$nama}</td>
                <td class='py-3 px-4 text-sm text-gray-600'>{$deskripsi}</td>
                <td class='py-3 px-4 font-medium'>Rp {$harga}</td>
                <td class='py-3 px-4 space-x-2'>
                  <a href='editProduk.php?id={$id}' class='bg-yellow-400 text-white px-3 py-1 rounded-lg hover:bg-yellow-500 text-sm'>Edit</a>
                  <a href='hapusProduk.php?id={$id}' onclick=\"return confirm('Yakin ingin menghapus produk ini?')\" class='bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 text-sm'>Delete</a>
                </td>
              </tr>";
              $no++;
            }
          } else {
            echo "
            <tr>
              <td colspan='6' class='text-center py-6 text-gray-500'>Belum ada produk yang ditambahkan.</td>
            </tr>";
          }
          ?>

        </tbody>
      </table>
    </div>
  </main>

  <!-- Footer -->
  <footer class="text-center py-6 text-gray-600 text-sm mt-10">
    © 2025 Toko Bunga | Dashboard Admin
  </footer>

</body>
</html>

<?php $conn->close(); ?>
