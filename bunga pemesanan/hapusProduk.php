<?php
include "db.php"; // koneksi database

// Pastikan parameter ID ada di URL
if (!isset($_GET['id'])) {
    echo "<script>alert('ID produk tidak ditemukan!'); window.location='dashboard.php';</script>";
    exit;
}

$id_produk = $_GET['id'];

// Ambil data produk untuk hapus file gambar juga
$query = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$id_produk'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "<script>alert('Produk tidak ditemukan!'); window.location='dashboard.php';</script>";
    exit;
}

// Jika ada gambar, hapus dari folder uploads
if (!empty($data['gambar']) && file_exists($data['gambar'])) {
    unlink($data['gambar']);
}

// Hapus data dari database
$hapus = mysqli_query($conn, "DELETE FROM produk WHERE id_produk = '$id_produk'");

if ($hapus) {
    echo "<script>alert('Produk berhasil dihapus!'); window.location='dashboard.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus produk: " . mysqli_error($conn) . "'); window.location='dashboard.php';</script>";
}
?>
