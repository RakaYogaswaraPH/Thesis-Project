<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPMH | Tipe Kecerdasan</title>

    <link rel="stylesheet" href="./src/styles/style.css">
    <link rel="icon" href="./src/images/Logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="font-[fredoka]">
    <!-- Navbar -->
    <?php include 'components/navbar.php'; ?>
    <!-- End Of Navbar -->

    <!-- Mobile Bottom Navigation -->
    <?php include 'components/mobileNavbar.php'; ?>
    <!-- End Of Mobile Navbar --

    <!- Hero Section -->
    <section class="w-full py-24 flex flex-col items-center justify-center text-center px-4 relative overflow-hidden" id="type">
        <div class="absolute inset-0 w-full h-full overflow-hidden">
            <img src="./src/images/Background.png" alt="Background" class="w-full h-auto min-h-full object-cover object-center" />
            <div class="absolute inset-0 bg-gradient-to-t from-white/50 to-white/20"></div>

            <!-- Animated bubbles -->
            <div class="absolute w-20 h-20 left-1/4 top-1/3 bg-white bg-opacity-70 rounded-full opacity-40"></div>
            <div class="absolute w-16 h-16 right-1/3 bottom-1/4 bg-white bg-opacity-70 rounded-full opacity-30"></div>
            <div class="absolute w-24 h-24 right-1/4 top-1/4 bg-white bg-opacity-70 rounded-full opacity-50"></div>
        </div>

        <div class="relative z-10">
            <div class="inline-block bg-white bg-opacity-70 rounded-full px-8 py-2 mb-6 shadow-md">
                <h1 class="text-teal-600 font-bold text-2xl sm:text-3xl md:text-4xl">Tipe Kecerdasan</h1>
            </div>

            <div>
                <img src="./src/images/Kids.png" alt="Kids with Different Intelligence Types" class="w-auto h-auto max-h-80 mb-4 mx-auto" />
            </div>

            <div class="mt-10 bg-white bg-opacity-85 rounded-xl px-6 py-4 max-w-2xl mx-auto shadow-lg">
                <p class="text-lg sm:text-2xl font-semibold text-gray-700">Setiap anak memiliki kecerdasan unik mereka sendiri!</p>
                <p class="text-md text-gray-600 mt-2">Kenali tipe kecerdasan anak untuk membantu mereka berkembang optimal</p>
            </div>
        </div>

        <div class="absolute bottom-5 left-0 right-0 flex justify-center animate-bounce">
            <a href="#intelligence-types" class="text-teal-500 bg-white bg-opacity-70 rounded-full p-2 shadow-md">
                <i class="fas fa-chevron-down text-2xl"></i>
            </a>
        </div>
    </section>

    <!-- Tipe Kecerdasan Section -->
    <section id="intelligence-types" class="bg-[#FFFDF5] py-20 px-4">
        <div class="max-w-screen-xl mx-auto text-center">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800">
                Jenis-Jenis Kecerdasan Anak
            </h2>
            <p class="text-gray-600 mt-3 max-w-2xl mx-auto">
                Setiap anak memiliki kecenderungan kecerdasan yang berbeda. Mengenali dan mengembangkan kecerdasan ini akan sangat membantu perkembangan mereka.
            </p>
            <div class="w-28 h-1 bg-orange-300 rounded-full mt-6 mx-auto mb-16"></div>

            <!-- Intelligence Type Tabs -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <div class="intelligence-tab px-6 py-3 bg-yellow-100 rounded-full font-semibold text-yellow-700 shadow hover:shadow-md transition-all duration-300 hover:-translate-y-1 cursor-pointer active-tab" data-target="imaginative">
                    <i class="fas fa-paint-brush mr-2"></i> Si Imajinatif
                </div>
                <div class="intelligence-tab px-6 py-3 bg-blue-100 rounded-full font-semibold text-blue-700 shadow hover:shadow-md transition-all duration-300 hover:-translate-y-1 cursor-pointer" data-target="storyteller">
                    <i class="fas fa-book-open mr-2"></i> Si Pencerita
                </div>
                <div class="intelligence-tab px-6 py-3 bg-green-100 rounded-full font-semibold text-green-700 shadow hover:shadow-md transition-all duration-300 hover:-translate-y-1 cursor-pointer" data-target="clever">
                    <i class="fas fa-puzzle-piece mr-2"></i> Si Cerdik
                </div>
                <div class="intelligence-tab px-6 py-3 bg-purple-100 rounded-full font-semibold text-purple-700 shadow hover:shadow-md transition-all duration-300 hover:-translate-y-1 cursor-pointer" data-target="logical">
                    <i class="fas fa-calculator mr-2"></i> Si Logis Kecil
                </div>
            </div>

            <!-- Intelligence Type Content -->
            <div class="max-w-4xl mx-auto">
                <!-- Si Imajinatif Content -->
                <div class="intelligence-content active fade-in" id="imaginative-content">
                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="flex flex-col md:flex-row items-center">
                            <div class="md:w-1/3">
                                <img src="./src/images/kids1.png" alt="Si Imajinatif" class="w-64 h-64 object-contain" />
                            </div>
                            <div class="md:w-2/3 text-left md:pl-8 mt-6 md:mt-0">
                                <h3 class="text-3xl font-bold text-yellow-600 mb-4">Si Imajinatif</h3>
                                <p class="text-gray-700 text-lg leading-relaxed mb-6">
                                    Anak dengan kecerdasan visual-spasial yang tinggi. Mereka memiliki imajinasi yang kaya dan dapat dengan mudah membayangkan segala sesuatu dalam pikiran mereka. Mereka suka:
                                </p>
                                <ul class="space-y-2 text-gray-700">
                                    <li class="flex items-start">
                                        <i class="fas fa-star text-yellow-500 mt-1 mr-2"></i>
                                        <span>Menggambar, melukis, dan aktivitas seni visual lainnya</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-star text-yellow-500 mt-1 mr-2"></i>
                                        <span>Membangun dengan balok, lego, dan materi tiga dimensi</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-star text-yellow-500 mt-1 mr-2"></i>
                                        <span>Bermain pura-pura dan menciptakan dunia imajinatif</span>
                                    </li>
                                </ul>

                                <div class="mt-6 pt-4 border-t border-gray-200">
                                    <p class="font-semibold text-gray-800 mb-2">Aktivitas yang Disarankan:</p>
                                    <div class="flex flex-wrap gap-2">
                                        <span class="bg-yellow-100 text-yellow-700 rounded-full px-3 py-1 text-sm font-medium hover:bg-yellow-200 transition-colors duration-300">Seni dan Kerajinan</span>
                                        <span class="bg-yellow-100 text-yellow-700 rounded-full px-3 py-1 text-sm font-medium hover:bg-yellow-200 transition-colors duration-300">Bermain Peran</span>
                                        <span class="bg-yellow-100 text-yellow-700 rounded-full px-3 py-1 text-sm font-medium hover:bg-yellow-200 transition-colors duration-300">Desain</span>
                                        <span class="bg-yellow-100 text-yellow-700 rounded-full px-3 py-1 text-sm font-medium hover:bg-yellow-200 transition-colors duration-300">Fotografi</span>
                                        <span class="bg-yellow-100 text-yellow-700 rounded-full px-3 py-1 text-sm font-medium hover:bg-yellow-200 transition-colors duration-300">Permainan Konstruksi</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Si Pencerita Content -->
                <div class="intelligence-content fade-in" id="storyteller-content">
                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="flex flex-col md:flex-row items-center">
                            <div class="md:w-1/3">
                                <img src="./src/images/kids2.png" alt="Si Pencerita" class="w-64 h-64 object-contain" />
                            </div>
                            <div class="md:w-2/3 text-left md:pl-8 mt-6 md:mt-0">
                                <h3 class="text-3xl font-bold text-blue-600 mb-4">Si Pencerita</h3>
                                <p class="text-gray-700 text-lg leading-relaxed mb-6">
                                    Anak dengan kecerdasan linguistik yang tinggi. Mereka pandai menggunakan kata-kata dan bahasa untuk mengekspresikan diri. Mereka suka:
                                </p>
                                <ul class="space-y-2 text-gray-700">
                                    <li class="flex items-start">
                                        <i class="fas fa-star text-blue-500 mt-1 mr-2"></i>
                                        <span>Membaca buku dan cerita dengan antusias</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-star text-blue-500 mt-1 mr-2"></i>
                                        <span>Bercerita dan menciptakan kisah mereka sendiri</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-star text-blue-500 mt-1 mr-2"></i>
                                        <span>Belajar kata-kata baru dan bermain dengan bahasa</span>
                                    </li>
                                </ul>

                                <div class="mt-6 pt-4 border-t border-gray-200">
                                    <p class="font-semibold text-gray-800 mb-2">Aktivitas yang Disarankan:</p>
                                    <div class="flex flex-wrap gap-2">
                                        <span class="bg-blue-100 text-blue-700 rounded-full px-3 py-1 text-sm font-medium hover:bg-blue-200 transition-colors duration-300">Storytelling</span>
                                        <span class="bg-blue-100 text-blue-700 rounded-full px-3 py-1 text-sm font-medium hover:bg-blue-200 transition-colors duration-300">Drama</span>
                                        <span class="bg-blue-100 text-blue-700 rounded-full px-3 py-1 text-sm font-medium hover:bg-blue-200 transition-colors duration-300">Menulis Jurnal</span>
                                        <span class="bg-blue-100 text-blue-700 rounded-full px-3 py-1 text-sm font-medium hover:bg-blue-200 transition-colors duration-300">Permainan Kata</span>
                                        <span class="bg-blue-100 text-blue-700 rounded-full px-3 py-1 text-sm font-medium hover:bg-blue-200 transition-colors duration-300">Puisi</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Si Cerdik Content -->
                <div class="intelligence-content fade-in" id="clever-content">
                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="flex flex-col md:flex-row items-center">
                            <div class="md:w-1/3">
                                <img src="./src/images/kids3.png" alt="Si Cerdik" class="w-64 h-64 object-contain" />
                            </div>
                            <div class="md:w-2/3 text-left md:pl-8 mt-6 md:mt-0">
                                <h3 class="text-3xl font-bold text-green-600 mb-4">Si Cerdik</h3>
                                <p class="text-gray-700 text-lg leading-relaxed mb-6">
                                    Anak dengan kecerdasan interpersonal yang tinggi. Mereka pandai memahami orang lain dan bekerja sama dalam kelompok. Mereka suka:
                                </p>
                                <ul class="space-y-2 text-gray-700">
                                    <li class="flex items-start">
                                        <i class="fas fa-star text-green-500 mt-1 mr-2"></i>
                                        <span>Bermain dalam kelompok dan bersosialisasi</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-star text-green-500 mt-1 mr-2"></i>
                                        <span>Memecahkan konflik dan menjadi penengah</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-star text-green-500 mt-1 mr-2"></i>
                                        <span>Menunjukkan empati dan perhatian pada orang lain</span>
                                    </li>
                                </ul>

                                <div class="mt-6 pt-4 border-t border-gray-200">
                                    <p class="font-semibold text-gray-800 mb-2">Aktivitas yang Disarankan:</p>
                                    <div class="flex flex-wrap gap-2">
                                        <span class="bg-green-100 text-green-700 rounded-full px-3 py-1 text-sm font-medium hover:bg-green-200 transition-colors duration-300">Permainan Kelompok</span>
                                        <span class="bg-green-100 text-green-700 rounded-full px-3 py-1 text-sm font-medium hover:bg-green-200 transition-colors duration-300">Proyek Kolaboratif</span>
                                        <span class="bg-green-100 text-green-700 rounded-full px-3 py-1 text-sm font-medium hover:bg-green-200 transition-colors duration-300">Bermain Peran</span>
                                        <span class="bg-green-100 text-green-700 rounded-full px-3 py-1 text-sm font-medium hover:bg-green-200 transition-colors duration-300">Diskusi Kelompok</span>
                                        <span class="bg-green-100 text-green-700 rounded-full px-3 py-1 text-sm font-medium hover:bg-green-200 transition-colors duration-300">Kegiatan Sosial</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Si Logis Kecil Content -->
                <div class="intelligence-content fade-in" id="logical-content">
                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="flex flex-col md:flex-row items-center">
                            <div class="md:w-1/3">
                                <img src="./src/images/kids4.png" alt="Si Logis Kecil" class="w-64 h-64 object-contain" />
                            </div>
                            <div class="md:w-2/3 text-left md:pl-8 mt-6 md:mt-0">
                                <h3 class="text-3xl font-bold text-purple-600 mb-4">Si Logis Kecil</h3>
                                <p class="text-gray-700 text-lg leading-relaxed mb-6">
                                    Anak dengan kecerdasan logika-matematika yang tinggi. Mereka memiliki kemampuan berpikir analitis dan suka memecahkan masalah. Mereka suka:
                                </p>
                                <ul class="space-y-2 text-gray-700">
                                    <li class="flex items-start">
                                        <i class="fas fa-star text-purple-500 mt-1 mr-2"></i>
                                        <span>Bereksplorasi dan bereksperimen dengan konsep sains</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-star text-purple-500 mt-1 mr-2"></i>
                                        <span>Bermain dengan pola, angka, dan teka-teki</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-star text-purple-500 mt-1 mr-2"></i>
                                        <span>Mengajukan pertanyaan "mengapa" dan mencari jawaban</span>
                                    </li>
                                </ul>

                                <div class="mt-6 pt-4 border-t border-gray-200">
                                    <p class="font-semibold text-gray-800 mb-2">Aktivitas yang Disarankan:</p>
                                    <div class="flex flex-wrap gap-2">
                                        <span class="bg-purple-100 text-purple-700 rounded-full px-3 py-1 text-sm font-medium hover:bg-purple-200 transition-colors duration-300">Eksperimen Sains</span>
                                        <span class="bg-purple-100 text-purple-700 rounded-full px-3 py-1 text-sm font-medium hover:bg-purple-200 transition-colors duration-300">Permainan Strategi</span>
                                        <span class="bg-purple-100 text-purple-700 rounded-full px-3 py-1 text-sm font-medium hover:bg-purple-200 transition-colors duration-300">Teka-teki Logika</span>
                                        <span class="bg-purple-100 text-purple-700 rounded-full px-3 py-1 text-sm font-medium hover:bg-purple-200 transition-colors duration-300">Coding Dasar</span>
                                        <span class="bg-purple-100 text-purple-700 rounded-full px-3 py-1 text-sm font-medium hover:bg-purple-200 transition-colors duration-300">Matematika Kreatif</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cari Tahu Kecerdasan Section -->
    <section class="bg-gradient-to-b from-[#FFFDF5] to-[#FFF5E3] py-16 px-4">
        <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-lg overflow-hidden">
            <div class="flex flex-col md:flex-row">
                <div class="md:w-1/2 bg-teal-500 p-8 text-white flex items-center justify-center">
                    <div class="text-center">
                        <i class="fas fa-lightbulb text-6xl mb-4 text-yellow-300"></i>
                        <h3 class="text-2xl font-bold mb-4">Ingin Tahu Tipe Kecerdasan Anak Anda?</h3>
                        <p class="text-teal-100">Kami dapat membantu menemukan potensi tersembunyi anak Anda dan memberikan rekomendasi aktivitas khusus.</p>
                    </div>
                </div>
                <div class="md:w-1/2 p-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Ikuti Tes Kecerdasan Anak</h3>
                    <p class="text-gray-600 mb-6">
                        Dengan mengikuti tes kecerdasan, Anda akan mendapatkan:
                    </p>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-teal-500 mt-1 mr-2"></i>
                            <span>Profil kecerdasan lengkap anak</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-teal-500 mt-1 mr-2"></i>
                            <span>Rekomendasi aktivitas yang sesuai</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-teal-500 mt-1 mr-2"></i>
                            <span>Tips pengembangan potensi anak</span>
                        </li>
                    </ul>
                    <a href="#" class="inline-block bg-teal-500 hover:bg-teal-600 text-white font-semibold py-3 px-6 rounded-full transition duration-300 transform hover:scale-105 hover:-translate-y-1 shadow-md hover:shadow-lg">
                        Mulai Tes Sekarang <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Tips Untuk Orang Tua -->
    <section class="bg-[#FFFDF5] py-20 px-4">
        <div class="max-w-screen-xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800">
                    Tips Untuk Orang Tua
                </h2>
                <div class="w-28 h-1 bg-orange-300 rounded-full mt-6 mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Tip 1 -->
                <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div class="bg-orange-100 w-16 h-16 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-heart text-2xl text-orange-500"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3 text-center">Dukung Minat Alami</h3>
                    <p class="text-gray-600 text-center">
                        Perhatikan aktivitas yang paling disukai anak dan dukung dengan menyediakan alat dan kesempatan untuk mengembangkannya.
                    </p>
                </div>

                <!-- Tip 2 -->
                <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-balance-scale text-2xl text-blue-500"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3 text-center">Seimbangkan Pengembangan</h3>
                    <p class="text-gray-600 text-center">
                        Meskipun anak memiliki kecerdasan dominan tertentu, tetap penting mengembangkan semua aspek kecerdasan secara seimbang.
                    </p>
                </div>

                <!-- Tip 3 -->
                <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-thumbs-up text-2xl text-green-500"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3 text-center">Berikan Pujian Proses</h3>
                    <p class="text-gray-600 text-center">
                        Puji usaha dan proses anak, bukan hanya hasil akhir. Ini akan membangun mindset berkembang pada anak.
                    </p>
                </div>
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
<script src="./src/js/script.js"></script>