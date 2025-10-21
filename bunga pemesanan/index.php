<?php
  include "db.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Toko Bunga</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Transisi lembut carousel */
    .carousel-slide {
      transition: transform 0.5s ease-in-out;
    }
  </style>
</head>

<body class="bg-pink-50 text-gray-800 font-sans">

  <!-- Navbar -->
  <nav class="bg-pink-600 text-white p-4 md:p-6 shadow-md">
    <div class="container mx-auto flex justify-between items-center">
      <a href="#" class="text-2xl md:text-3xl font-bold">🌸 Toko Bunga</a>

      <!-- Tombol hamburger -->
      <button id="menu-btn" class="md:hidden text-white focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>

      <!-- Menu utama -->
      <ul id="menu" class="hidden md:flex space-x-6 text-base font-medium">
        <li><a href="#produk" class="hover:text-pink-200 block py-2">Produk</a></li>
        <li><a href="#testimoni" class="hover:text-pink-200 block py-2">Testimoni</a></li>
        <li><a href="#faq" class="hover:text-pink-200 block py-2">FAQ</a></li>
        <li><a href="dashboard.php" class="hover:text-pink-200 block py-2">Dashboard</a></li>
      </ul>
    </div>

    <!-- Menu versi mobile -->
    <div id="mobile-menu" class="hidden md:hidden bg-pink-700 mt-2 rounded-lg">
      <ul class="flex flex-col text-center">
        <li><a href="#produk" class="block py-3 hover:bg-pink-500">Produk</a></li>
        <li><a href="#testimoni" class="block py-3 hover:bg-pink-500">Testimoni</a></li>
        <li><a href="#faq" class="block py-3 hover:bg-pink-500">FAQ</a></li>
        <li><a href="dashboard.php" class="block py-3 hover:bg-pink-500">Dashboard</a></li>
      </ul>
    </div>
  </nav>

  <!-- Hero Section + Carousel -->
  <section class="relative bg-pink-100 py-12 md:py-20 px-4">
    <div class="container mx-auto text-center">
      <h1 class="text-3xl md:text-5xl font-bold text-pink-600">Bunga Pilihan untuk Momen Spesial</h1>
      <p class="text-base md:text-lg mt-3 text-gray-600">Jadikan harimu lebih indah dengan bunga segar pilihan.</p>

      <!-- Carousel -->
      <div class="relative mt-8 md:mt-12 max-w-3xl mx-auto overflow-hidden rounded-xl shadow-lg">
        <div id="carousel" class="flex w-full carousel-slide aspect-[16/9]">
          <img src="gambarOri/ngasih bunga.jpg" class="w-full flex-shrink-0 object-cover" />
          <img src="gambarOri/megang bunga.jpg" class="w-full flex-shrink-0 object-cover" />
          <img src="gambarOri/tangkai bunga.jpg" class="w-full flex-shrink-0 object-cover" />
        </div>
      </div>
    </div>
  </section>

  <!-- Produk Section -->
  <section id="produk" class="py-16 px-4 bg-pink-50">
    <div class="container mx-auto text-center">
      <h2 class="text-3xl md:text-4xl font-bold text-pink-600">Produk Terpopuler</h2>
      <p class="mt-2 text-gray-600 text-sm md:text-base">Bunga segar, dikemas cantik, siap kirim!</p>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-10">

        
        <?php
        $query = mysqli_query($conn, "SELECT * FROM produk ORDER BY id_produk DESC");
        if (mysqli_num_rows($query) > 0) {
          while ($row = mysqli_fetch_assoc($query)) {
            echo '
            <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition">
              <img src="' . htmlspecialchars($row["gambar"]) . '" class="w-full h-48 md:h-56 object-cover rounded-t-xl" />
              <div class="p-5 text-left">
                <h3 class="text-lg md:text-xl font-semibold text-pink-600">' . htmlspecialchars($row["nama_produk"]) . '</h3>
                <p class="text-sm text-gray-500">' . htmlspecialchars($row["deskripsi"]) . '</p>
                <div class="flex justify-between items-center mt-4">
                  <span class="text-pink-600 font-bold">Rp ' . number_format($row["harga"], 0, ',', '.') . '</span>
                  <button class="bg-pink-600 text-white px-4 py-2 rounded-lg hover:bg-pink-700 text-sm">Beli</button>
                </div>
              </div>
            </div>';
          }
        } else {
          echo '<p class="text-gray-600 col-span-3">Belum ada produk tersedia.</p>';
        }
        ?>

      </div>
    </div>
  </section>

  <!-- Testimoni Section -->
  <section id="testimoni" class="py-16 bg-white px-4">
    <div class="container mx-auto text-center">
      <h2 class="text-3xl md:text-4xl font-bold text-pink-600">Apa Kata Mereka?</h2>
      <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8 text-left">

        <div class="bg-pink-100 p-6 rounded-xl shadow">
          <p class="text-gray-700 italic text-sm md:text-base">"Bunganya super fresh dan pengirimannya cepat banget. Suka deh!"</p>
          <div class="mt-4 font-semibold text-pink-700 text-sm md:text-base">— Nabila, Jakarta</div>
        </div>

        <div class="bg-pink-100 p-6 rounded-xl shadow">
          <p class="text-gray-700 italic text-sm md:text-base">"Tampilannya sesuai foto. Cocok banget buat anniversary."</p>
          <div class="mt-4 font-semibold text-pink-700 text-sm md:text-base">— Dimas, Bandung</div>
        </div>

        <div class="bg-pink-100 p-6 rounded-xl shadow">
          <p class="text-gray-700 italic text-sm md:text-base">"Packaging-nya rapi dan harum. Recomended banget!"</p>
          <div class="mt-4 font-semibold text-pink-700 text-sm md:text-base">— Clara, Surabaya</div>
        </div>

      </div>
    </div>
  </section>

  <!-- FAQ Section -->
  <section id="faq" class="py-16 bg-pink-50 px-4">
    <div class="container mx-auto text-center">
      <h2 class="text-3xl md:text-4xl font-bold text-pink-600 mb-8">Pertanyaan Umum</h2>
      <div class="max-w-3xl mx-auto text-left space-y-6">

        <div>
          <h3 class="font-semibold text-pink-700 text-lg">Apakah bunga bisa dikirim ke luar kota?</h3>
          <p class="text-gray-600 text-sm md:text-base">Saat ini kami hanya melayani pengiriman dalam kota tertentu. Cek halaman checkout untuk info lengkap.</p>
        </div>

        <div>
          <h3 class="font-semibold text-pink-700 text-lg">Kapan bunga akan sampai setelah pemesanan?</h3>
          <p class="text-gray-600 text-sm md:text-base">Pesanan yang masuk sebelum pukul 15.00 akan dikirim pada hari yang sama. Setelah itu, dikirim keesokan harinya.</p>
        </div>

        <div>
          <h3 class="font-semibold text-pink-700 text-lg">Apakah bisa custom buket sesuai permintaan?</h3>
          <p class="text-gray-600 text-sm md:text-base">Tentu saja! Kamu bisa menghubungi kami via WhatsApp untuk permintaan khusus seperti warna, jenis bunga, atau pesan personal.</p>
        </div>

        <div>
          <h3 class="font-semibold text-pink-700 text-lg">Bagaimana cara pembayaran?</h3>
          <p class="text-gray-600 text-sm md:text-base">Kami menerima pembayaran melalui transfer bank, e-wallet (OVO, GoPay, DANA), dan kartu kredit.</p>
        </div>

      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-pink-600 text-white py-8 mt-16 px-4">
    <div class="container mx-auto text-center">
      <h3 class="text-xl md:text-2xl font-bold mb-2">Toko Bunga</h3>
      <p class="text-pink-100 mb-4 text-sm md:text-base">Hadiahkan keindahan dengan bunga segar untuk setiap momen istimewa.</p>
      <div class="flex justify-center space-x-6 mb-4 text-sm md:text-base">
        <a href="#" class="hover:text-pink-200">Instagram</a>
        <a href="#" class="hover:text-pink-200">Facebook</a>
        <a href="#" class="hover:text-pink-200">WhatsApp</a>
      </div>
      <p class="text-xs md:text-sm text-pink-200">&copy; 2025 Toko Bunga. Semua hak cipta dilindungi.</p>
    </div>
  </footer>

  <!-- Script -->
  <script>
    // Carousel
    const carousel = document.getElementById("carousel");
    const slides = carousel.children;
    let index = 0;
    function showSlide() {
      carousel.style.transform = `translateX(-${index * 100}%)`;
    }
    function nextSlide() {
      index = (index + 1) % slides.length;
      showSlide();
    }
    function prevSlide() {
      index = (index - 1 + slides.length) % slides.length;
      showSlide();
    }
    setInterval(nextSlide, 4000);

    // Menu mobile
    const menuBtn = document.getElementById("menu-btn");
    const mobileMenu = document.getElementById("mobile-menu");
    menuBtn.addEventListener("click", () => {
      mobileMenu.classList.toggle("hidden");
    });
  </script>

</body>
</html>
