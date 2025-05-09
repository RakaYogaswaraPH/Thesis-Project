<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPMH | Taking Learning Fun</title>

    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="images/Logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="font-[fredoka]">
    <!-- Navbar -->
    <nav class="hidden md:block sticky top-0 bg-white shadow-md z-50">
        <div class="container mx-auto px-4 py-2 flex items-center justify-between">
            <div class="flex items-center">
                <img src="images/Logo.png" alt="PPMH Logo" class="h-16 w-16">
                <div class="ml-2">
                    <span class="text-2xl font-bold text-teal-500 underline">PPMH</span>
                    <div class="text-xs text-teal-400">Taking learning fun</div>
                </div>
            </div>
            <div class="hidden md:flex space-x-8">
                <a href="#homepage" class="text-gray-700 hover:text-teal-500 font-medium">Beranda</a>
                <a href="aboutUs.php" class="text-gray-700 hover:text-teal-500 font-medium">Tentang Kami</a>
                <a href="#" class="text-gray-700 hover:text-teal-500 font-medium">Tes Kecerdasan</a>
                <a href="#" class="text-gray-700 hover:text-teal-500 font-medium">Tipe Kecerdasan</a>
            </div>

            <button class="bg-orange-400 hover:bg-orange-500 text-white font-medium py-2 px-6 rounded-full transition-all">
                Masuk
            </button>
        </div>
    </nav>
    <!-- End Of Navbar -->

    <!-- Mobile Bottom Navigation -->
    <nav class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 shadow-inner flex justify-around items-center py-2 md:hidden z-50">
        <a href="#homepage" class="flex flex-col items-center text-teal-500 text-xs">
            <i class="fas fa-home text-lg"></i>
            <span>Beranda</span>
        </a>
        <a href="aboutUs.php" class="flex flex-col items-center text-gray-500 text-xs hover:text-teal-500">
            <i class="fas fa-users text-lg"></i>
            <span>Tentang</span>
        </a>
        <a href="#" class="flex flex-col items-center text-gray-500 text-xs hover:text-teal-500">
            <i class="fas fa-lightbulb text-lg"></i>
            <span>Tes IQ</span>
        </a>
        <a href="#" class="flex flex-col items-center text-gray-500 text-xs hover:text-teal-500">
            <i class="fas fa-brain text-lg"></i>
            <span>Kecerdasan</span>
        </a>
        <a href="#" class="flex flex-col items-center text-gray-500 text-xs hover:text-orange-500">
            <i class="fas fa-sign-in-alt text-lg"></i>
            <span>Masuk</span>
        </a>
    </nav>


    <!-- Hero Section -->
    <div class="absolute bg-cover bg-no-repeat w-full h-full" style="background-image: url('images/Hero_background.png');" id="homepage"></div>
    <div class="container mx-auto px-8 py-8 relative">
        <div class="flex flex-col md:flex-row items-center relative z-10 mt-20">
            <div class="md:w-1/2">
                <div class="text-teal-500 font-bold text-xl mb-6">PPMH IQ TEST</div>
                <h1 class="text-4xl md:text-5xl font-semibold text-gray-900 mb-8">Bantu Anak Tumbuh Sesuai Kecerdasannya</h1>
                <p class="text-gray-600 mb-10 text-lg">Temukan tipe kecerdasan anak Anda untuk mendampingi tumbuh kembangnya secara maksimal.</p>
                <button class="bg-orange-400 hover:bg-orange-500 text-white font-bold py-4 px-8 rounded-full flex items-center transition-all">
                    Ikuti Tes Sekarang
                    <i class="fas fa-arrow-right ml-2"></i>
                </button>

            </div>

            <div class="md:w-1/2 mt-12 md:mt-0">
                <div class="relative">
                    <img src="images/Hero_image.png" alt="Anak Belajar" class="w-full h-full object-cover" />
                </div>
            </div>
        </div>
    </div>

    <!-- Section 1: Pahami Potensi Anak -->
    <section class="bg-white py-20">
        <div class="container mx-auto px-8 flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-12 md:mb-0">
                <h2 class="text-3xl md:text-4xl font-semibold text-gray-900 mb-4">Pahami Potensi Anak Sejak Dini</h2>
                <p class="text-gray-700 mb-6">
                    Setiap anak terlahir unik dengan cara berpikir, bermain, dan belajar yang berbeda.
                    Dengan memahami tipe kecerdasan mereka, kita bisa membantu mereka tumbuh dengan penuh percaya diri dan potensi terbaiknya.
                </p>
                <button class="bg-orange-400 hover:bg-orange-500 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition-all flex items-center">
                    Pahami Tipe Kecerdasan Anak
                    <i class="fa-solid fa-book-open ml-2 w-5 h-5"></i>
                </button>
            </div>
            <div class="md:w-1/2 flex justify-center">
                <img src="images/Section1.png" alt="Gambar" class="w-full max-w-md">
            </div>
        </div>
    </section>

    <!-- Section 2: Jadi Pendamping Anak -->
    <section class="py-20" style="background-image: url('images/Textures.png');">
        <div class="container mx-auto px-8 flex flex-col md:flex-row-reverse items-center">
            <div class="md:w-1/2 mb-12 md:mb-0">
                <h2 class="text-3xl md:text-4xl font-semibold text-gray-900 mb-4">Jadi Pendamping yang Dipercaya Anak</h2>
                <p class="text-gray-700">
                    Anak bukan hanya butuh di didik, tapi juga dipahami. Orang tua bisa melihat dunia dari sudut pandang anak mengenali cara mereka belajar, merasa, dan mengekspresikan diri.
                </p>
            </div>
            <div class="md:w-1/2 flex justify-center">
                <img src="images/Section2.png" alt="Gambar" class="w-full max-w-md">
            </div>
        </div>
    </section>

    <!-- Section 3: FAQ -->
    <section class="bg-white py-20">
        <div class="container mx-auto px-8">
            <div class="flex flex-col md:flex-row">
                <div class="md:w-1/2 mb-12 md:mb-0">
                    <h2 class="text-3xl md:text-4xl font-semibold text-gray-900 mb-8">Tentang PPMH IQ Test</h2>

                    <!-- FAQ Accordion -->
                    <div class="space-y-4">
                        <!-- FAQ Item 1 -->
                        <div class="border rounded-xl overflow-hidden">
                            <button class="w-full flex justify-between items-center p-4 bg-orange-400 text-white font-medium">
                                <span>Apakah test IQ ini memerlukan biaya?</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div class="p-4 bg-white">
                                <p class="text-gray-700">
                                    Tidak, Ayah/Bunda. Layanan tes IQ ini sepenuhnya gratis dan dapat digunakan tanpa dipungut biaya apa pun. Ayah/Bunda bisa mengaksesnya dengan mudah kapan saja dan di mana saja untuk mendukung perkembangan buah hati tercinta.
                                </p>
                            </div>
                        </div>

                        <!-- FAQ Item 2 -->
                        <div class="border rounded-xl overflow-hidden">
                            <button class="w-full flex justify-between items-center p-4 bg-white text-gray-800 font-medium">
                                <span>Apakah anak perlu persiapan sebelum mengikuti tes?</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </button>
                            <div class="hidden p-4 bg-white">
                                <p class="text-gray-700">
                                    Tidak perlu persiapan khusus. Anak cukup dalam kondisi sehat, tidak lelah, dan nyaman saat mengikuti tes. Pastikan lingkungan tenang dan bebas dari gangguan saat anak mengerjakan tes untuk hasil optimal.
                                </p>
                            </div>
                        </div>

                        <!-- FAQ Item 3 -->
                        <div class="border rounded-xl overflow-hidden">
                            <button class="w-full flex justify-between items-center p-4 bg-white text-gray-800 font-medium">
                                <span>Berapa lama waktu yang dibutuhkan untuk tes?</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </button>
                            <div class="hidden p-4 bg-white">
                                <p class="text-gray-700">
                                    Tes ini dirancang agar bisa diselesaikan dalam waktu 20-30 menit, tergantung kecepatan anak dalam menjawab. Tidak ada batasan waktu yang ketat sehingga anak dapat mengerjakan dengan nyaman.
                                </p>
                            </div>
                        </div>

                        <!-- FAQ Item 4 -->
                        <div class="border rounded-xl overflow-hidden">
                            <button class="w-full flex justify-between items-center p-4 bg-white text-gray-800 font-medium">
                                <span>Bagaimana hasil tes akan disampaikan?</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </button>
                            <div class="hidden p-4 bg-white">
                                <p class="text-gray-700">
                                    Hasil tes akan langsung ditampilkan setelah anak menyelesaikan semua soal. Ayah/Bunda juga akan menerima laporan lengkap melalui email yang berisi profil kecerdasan anak beserta rekomendasi pengembangan yang sesuai.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="md:w-1/2 flex justify-center">
                    <div class="relative overflow-hidden">
                        <img src="images/FAQ.png" alt="Gambar" class="w-full h-full object-cover pl-11">
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16" style="background-image: url('images/Textures.png');">
        <div class="container mx-auto px-8">
            <div class="flex flex-col items-center justify-center text-center">

                <div class="relative w-full max-w-2xl mx-auto mb-8">
                    <img src="images/CTA.png" alt="Anak-anak Belajar" class="mx-auto mb-16">
                    <h2 class="text-3xl md:text-4xl font-semibold text-gray-900 mb-6">Penasaran Tentang Tumbuh Kembang Si Kecil?</h2>
                </div>

                <a href="#" class="bg-orange-400 hover:bg-orange-500 text-white font-semibold py-3 px-10 rounded-full inline-flex items-center transition-all">
                    Ikuti Tes Sekarang
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white py-16 border-t border-gray-200">
        <div class="container mx-auto px-8 grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Description -->
            <div>
                <div class="flex items-center mb-4">
                    <img src="images/Logo.png" alt="Logo PPMH" class="h-12 w-12">
                    <div class="ml-3">
                        <h3 class="text-lg font-bold text-teal-500">POS PAUD MAWAR HIDAYAH</h3>
                    </div>
                </div>
                <p class="text-gray-600 text-sm">
                    Lembaga pendidikan anak usia dini yang memberikan pelayanan pada anak usia dini secara menyeluruh yang mencakup layanan gizi, kesehatan, pendidikan, pengasuhan, dan perlindungan, untuk mengoptimalkan semua aspek perkembangan anak.
                </p>
            </div>

            <!-- Navigasi -->
            <div>
                <h4 class="font-semibold text-gray-800 mb-4">POS PAUD MAWAR HIDAYAH</h4>
                <ul class="text-gray-600 text-sm space-y-2">
                    <li><a href="#" class="hover:text-teal-500">Tentang Kami</a></li>
                    <li><a href="#" class="hover:text-teal-500">Tes Kecerdasan</a></li>
                    <li><a href="#" class="hover:text-teal-500">Tipe Kecerdasan</a></li>
                </ul>
            </div>

            <!-- Sosial Media -->
            <div>
                <h4 class="font-semibold text-gray-800 mb-4">Ikuti Kami</h4>
                <ul class="space-y-2 text-gray-600 text-sm">
                    <li class="flex items-center space-x-2">
                        <i class="fab fa-facebook text-xl"></i><span>Facebook</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <i class="fab fa-instagram text-xl"></i><span>Instagram</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <i class="fab fa-twitter text-xl"></i><span>Twitter</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <i class="fab fa-tiktok text-xl"></i><span>TikTok</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="mt-20 text-center text-sm text-gray-500">
            <p>© POS PAUD MAWAR HIDAYAH 2025</p>
            <div class="space-x-4 mt-1">
                <a href="#" class="hover:text-teal-500">Kebijakan Privasi</a>
                <span>|</span>
                <a href="#" class="hover:text-teal-500">Syarat & Ketentuan</a>
            </div>
        </div>
    </footer>
    <!-- End Of Footer -->

    <!-- Back To Top -->
    <button id="backToTopBtn" title="Kembali ke atas" class="fixed bottom-6 right-6 bg-orange-400 hover:bg-orange-500 text-white w-12 h-12 flex items-center justify-center rounded-full shadow-lg transition-all duration-500 opacity-0 scale-75 invisible z-50">
        <i class="fas fa-arrow-up"></i>
    </button>
    <!-- End Of Back To Top -->

</body>

</html>
<script src="js/script.js"></script>