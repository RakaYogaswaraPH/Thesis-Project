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

<body class="font-[fredoka] text-gray-800 overflow-x-hidden">

    <!-- Navbar -->
    <?php include 'components/navbar.php'; ?>
    <!-- End of Navbar -->

    <!-- Mobile Bottom Navigation -->
    <?php include 'components/mobileNavbar.php'; ?>
    <!-- End Of Mobile Navbar -->

    <!-- Hero Section -->
    <div class="relative bg-hero bg-cover bg-no-repeat bg-center min-h-screen flex items-center pt-20 pb-20 md:pb-0 md:pt-0" style="background-image: url('images/Hero_background.png');" id="homepage">
        <div class="absolute inset-0 bg-gradient-to-r from-white/60 to-white/30"></div>
        <div class="container mx-auto px-6 sm:px-8 lg:px-16 relative z-10">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 fade-in">
                    <div class="inline-block bg-primary-500/10 text-primary-600 font-bold text-sm md:text-lg px-4 py-2 rounded-full mb-6">PPMH IQ TEST</div>
                    <h1 class="text-4xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-6 leading-tight">Bantu Anak Tumbuh Sesuai <span class="text-primary-500">Kecerdasannya</span></h1>
                    <p class="text-gray-600 mb-10 text-lg md:text-xl max-w-lg">Temukan tipe kecerdasan anak Anda untuk mendampingi tumbuh kembangnya secara maksimal.</p>
                    <button class="bg-secondary-500 hover:bg-secondary-600 text-white font-bold py-4 px-8 rounded-full flex items-center transition-all duration-300 transform hover:translate-x-2 hover:shadow-xl">
                        Ikuti Tes Sekarang
                        <i class="fas fa-arrow-right ml-3"></i>
                    </button>
                </div>

                <div class="md:w-1/2 mt-12 md:mt-0 fade-in-delay-1">
                    <div class="relative">
                        <div class="absolute -top-6 -left-6 w-24 h-24 bg-primary-500/20 rounded-full animate-pulse"></div>
                        <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-secondary-500/20 rounded-full animate-pulse delay-700"></div>
                        <img src="images/Hero_image.png" alt="Anak Belajar" class="w-full h-full object-cover rounded-2xl transform hover:scale-[1.02] transition-all duration-500" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section 1: Pahami Potensi Anak -->
    <section class="bg-white py-20">
        <div class="container mx-auto px-6 sm:px-8 lg:px-16">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-12 md:mb-0 pr-0 md:pr-12" data-aos="fade-right">
                    <div class="inline-block bg-secondary-500/10 text-secondary-600 font-bold text-sm px-4 py-2 rounded-full mb-4">POTENSI ANAK</div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Pahami Potensi Anak Sejak Dini</h2>
                    <p class="text-gray-700 mb-8 text-lg">
                        Setiap anak terlahir unik dengan cara berpikir, bermain, dan belajar yang berbeda.
                        Dengan memahami tipe kecerdasan mereka, kita bisa membantu mereka tumbuh dengan penuh percaya diri dan potensi terbaiknya.
                    </p>
                    <button class="bg-secondary-500 hover:bg-secondary-600 text-white font-semibold py-3 px-8 rounded-lg transition-all duration-300 hover:shadow-xl flex items-center group">
                        Pahami Tipe Kecerdasan Anak
                        <i class="fa-solid fa-book-open ml-3 group-hover:ml-4 transition-all"></i>
                    </button>
                </div>
                <div class="md:w-1/2 flex justify-center" data-aos="fade-left">
                    <div class="relative">
                        <div class="absolute -top-4 -right-4 w-20 h-20 rounded-full bg-primary-500/10 animate-float"></div>
                        <img src="images/Section1.png" alt="Gambar" class="w-full max-w-md rounded-2xl hover:shadow-2xl transition-all duration-500">
                        <div class="absolute -bottom-4 -left-4 w-16 h-16 rounded-full bg-secondary-500/10 animate-float" style="animation-delay: 1s;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2: Jadi Pendamping Anak -->
    <section class="py-20 bg-texture bg-cover bg-center relative">
        <div class="absolute inset-0 bg-primary-500/5"></div>
        <div class="container mx-auto px-6 sm:px-8 lg:px-16 relative z-10">
            <div class="flex flex-col md:flex-row-reverse items-center">
                <div class="md:w-1/2 mb-12 md:mb-0 pl-0 md:pl-12" data-aos="fade-left">
                    <div class="inline-block bg-primary-500/10 text-primary-600 font-bold text-sm px-4 py-2 rounded-full mb-4">PENDAMPINGAN</div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Jadi Pendamping yang Dipercaya Anak</h2>
                    <p class="text-gray-700 mb-6 text-lg">
                        Anak bukan hanya butuh di didik, tapi juga dipahami. Orang tua bisa melihat dunia dari sudut pandang anak mengenali cara mereka belajar, merasa, dan mengekspresikan diri.
                    </p>
                    <div class="flex flex-col space-y-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-primary-500 flex items-center justify-center text-white shrink-0">
                                <i class="fas fa-check"></i>
                            </div>
                            <span class="ml-3 text-gray-700">Kenali gaya belajar anak yang unik</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-primary-500 flex items-center justify-center text-white shrink-0">
                                <i class="fas fa-check"></i>
                            </div>
                            <span class="ml-3 text-gray-700">Kembangkan talenta dan bakat alami</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-primary-500 flex items-center justify-center text-white shrink-0">
                                <i class="fas fa-check"></i>
                            </div>
                            <span class="ml-3 text-gray-700">Bangun kepercayaan diri sejak dini</span>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2 flex justify-center" data-aos="fade-right">
                    <div class="relative">
                        <div class="absolute -top-6 -left-6 w-24 h-24 bg-secondary-500/20 rounded-full animate-pulse"></div>
                        <img src="images/Section2.png" alt="Gambar" class="w-full max-w-md rounded-2xl hover:shadow-2xl transition-all duration-500">
                        <div class="absolute -bottom-6 -right-6 w-20 h-20 bg-primary-500/20 rounded-full animate-pulse delay-700"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 3: FAQ -->
    <section class="bg-white py-20">
        <div class="container mx-auto px-6 sm:px-8 lg:px-16">
            <div class="flex flex-col md:flex-row">
                <div class="md:w-1/2 mb-12 md:mb-0 pr-0 md:pr-12" data-aos="fade-right">
                    <div class="inline-block bg-secondary-500/10 text-secondary-600 font-bold text-sm px-4 py-2 rounded-full mb-4">FAQ</div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-8">Tentang PPMH IQ Test</h2>

                    <!-- FAQ Accordion -->
                    <div class="space-y-4">
                        <!-- FAQ Item 1 -->
                        <div class="border rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300">
                            <button class="w-full flex justify-between items-center p-5 bg-secondary-500 text-white font-medium faq-toggle">
                                <span>Apakah test IQ ini memerlukan biaya?</span>
                                <div class="icon-plus block">
                                    <!-- Icon plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                </div>
                                <div class="icon-minus hidden">
                                    <!-- Icon minus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                                    </svg>
                                </div>
                            </button>
                            <div class="faq-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                                <div class="p-5 bg-white text-gray-700">
                                    <p>
                                        Tidak, Ayah/Bunda. Layanan tes IQ ini sepenuhnya gratis dan dapat digunakan tanpa dipungut biaya apa pun. Ayah/Bunda bisa mengaksesnya dengan mudah kapan saja dan di mana saja untuk mendukung perkembangan buah hati tercinta.
                                    </p>
                                </div>
                            </div>
                        </div>


                        <!-- FAQ Item 2 -->
                        <div class="border rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300">
                            <button class="w-full flex justify-between items-center p-5 bg-secondary-500 text-white font-medium faq-toggle">
                                <span>Apakah anak perlu persiapan sebelum mengikuti tes?</span>
                                <div class="icon-plus block">
                                    <!-- Icon plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                </div>
                                <div class="icon-minus hidden">
                                    <!-- Icon minus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                                    </svg>
                                </div>
                            </button>
                            <div class="faq-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                                <div class="p-5 bg-white text-gray-700">
                                    <p>
                                        Tidak perlu persiapan khusus. Anak cukup dalam kondisi sehat, tidak lelah, dan nyaman saat mengikuti tes. Pastikan lingkungan tenang dan bebas dari gangguan saat anak mengerjakan tes untuk hasil optimal.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 3 -->
                        <div class="border rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300">
                            <button class="w-full flex justify-between items-center p-5 bg-secondary-500 text-white font-medium faq-toggle">
                                <span>Berapa lama waktu yang dibutuhkan untuk tes?</span>
                                <div class="icon-plus block">
                                    <!-- Icon plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                </div>
                                <div class="icon-minus hidden">
                                    <!-- Icon minus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                                    </svg>
                                </div>
                            </button>
                            <div class="faq-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                                <div class="p-5 bg-white text-gray-700">
                                    <p>
                                        Tes ini dirancang agar bisa diselesaikan dalam waktu 20-30 menit, tergantung kecepatan anak dalam menjawab. Tidak ada batasan waktu yang ketat sehingga anak dapat mengerjakan dengan nyaman.
                                    </p>
                                </div>
                            </div>
                        </div>


                        <!-- FAQ Item 4 -->
                        <div class="border rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300">
                            <button class="w-full flex justify-between items-center p-5 bg-secondary-500 text-white font-medium faq-toggle">
                                <span>Bagaimana hasil tes akan disampaikan?</span>
                                <div class="icon-plus block">
                                    <!-- Icon plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                </div>
                                <div class="icon-minus hidden">
                                    <!-- Icon minus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                                    </svg>
                                </div>
                            </button>
                            <div class="faq-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                                <div class="p-5 bg-white text-gray-700">
                                    <p>
                                        Hasil tes akan langsung ditampilkan setelah anak menyelesaikan semua soal. Ayah/Bunda juga akan menerima laporan lengkap melalui email yang berisi profil kecerdasan anak beserta rekomendasi pengembangan yang sesuai.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="md:w-1/2 flex justify-center items-center" data-aos="fade-left">
                    <div class="relative overflow-hidden">
                        <div class="absolute -top-0 -left-0 w-24 h-24 bg-primary-500/10 rounded-full animate-pulse"></div>
                        <img src="images/FAQ.png" alt="Gambar" class="w-full h-full object-cover rounded-2xl shadow-xl transform hover:scale-[1.02] transition-all duration-500">
                        <div class="absolute -bottom-0 -right-0 w-20 h-20 bg-secondary-500/10 rounded-full animate-pulse" style="animation-delay: 1.5s;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-texture bg-cover bg-center relative">
        <div class="absolute inset-0 bg-gradient-to-r from-primary-500/10 to-secondary-500/10"></div>
        <div class="container mx-auto px-6 sm:px-8 lg:px-16 relative z-10">
            <div class="flex flex-col items-center justify-center text-center max-w-3xl mx-auto">
                <div class="inline-block bg-secondary-500/10 text-secondary-600 font-bold text-sm px-4 py-2 rounded-full mb-6">MULAI SEKARANG</div>
                <div class="relative w-full mx-auto mb-10">
                    <img src="images/CTA.png" alt="Anak-anak Belajar" class="mx-auto rounded-2xl max-w-xl w-full">
                </div>

                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-6">Penasaran Tentang Tumbuh Kembang Si Kecil?</h2>
                <p class="text-gray-700 mb-10 text-lg md:text-xl max-w-2xl">Temukan potensi tersembunyi anak Anda dan bantu mereka tumbuh sesuai dengan tipe kecerdasan alami mereka.</p>

                <a href="#" class="bg-secondary-500 hover:bg-secondary-600 text-white font-semibold py-4 px-10 rounded-full inline-flex items-center transition-all duration-300 transform hover:scale-105 hover:shadow-xl group">
                    Ikuti Tes Sekarang
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 group-hover:ml-4 transition-all duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'components/footer.php'; ?>
    <!-- End Of Footer -->

    <!-- Back To Top -->
    <?php include 'components/BacktoTop.php'; ?>
    <!-- End Of Back To Top -->

</body>

</html>
<script src="js/script.js"></script>