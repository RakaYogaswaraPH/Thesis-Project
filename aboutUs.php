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
    <!-- End Of Navbar -->

    <!-- Mobile Bottom Navigation -->
    <?php include 'components/mobileNavbar.php'; ?>
    <!-- End Of Mobile Navbar -->

    <!-- Hero Section -->
    <section class="relative bg-cover bg-center min-h-[70vh] flex items-center pt-20 pb-20" style="background-image: url('images/background.png');" id="aboutUs">
        <div class="absolute inset-0 bg-gradient-to-t from-white/50 to-white/20"></div>
        <div class="container mx-auto px-6 sm:px-8 lg:px-16 relative z-10">
            <div class="flex flex-col items-center text-center">
                <div class="inline-block bg-primary-500/10 text-primary-600 font-bold text-lg px-6 py-2 rounded-full mb-6">TENTANG KAMI</div>

                <div class="relative mb-6 group">
                    <div class="absolute -inset-4 bg-secondary-500/10 rounded-full blur-xl opacity-70 group-hover:opacity-100 transition duration-500"></div>
                    <img src="images/Logos.png" alt="Logo PPMH" class="w-40 h-40 md:w-48 md:h-48 relative z-10">
                </div>

                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4 leading-tight">POS PAUD MAWAR HIDAYAH <span class="text-primary-500">(PPMH)</span></h1>
                <p class="text-lg md:text-xl text-gray-700 max-w-2xl mx-auto font-medium">
                    Mewujudkan Pribadi Yang <span class="text-primary-500 font-semibold">Taqwa</span>,
                    <span class="text-secondary-500 font-semibold">Cendekia</span>, Dan
                    <span class="text-primary-500 font-semibold">Berbudaya</span>
                </p>
            </div>
        </div>
    </section>

    <!-- Transitional Title Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-6 sm:px-8 lg:px-16">
            <div class="text-center">
                <h3 class="text-2xl md:text-3xl font-bold text-gray-800">
                    Mencetak Generasi Belajar Baru Yang <span class="text-secondary-500">Unggul</span>
                </h3>
                <div class="w-24 h-1.5 bg-secondary-500 rounded-full mt-3 mx-auto"></div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section class="py-16 bg-texture bg-cover bg-center relative">
        <div class="absolute inset-0 bg-primary-500/5"></div>
        <div class="container mx-auto px-6 sm:px-8 lg:px-16 relative z-10">
            <div class="flex flex-col md:flex-row items-center gap-10">
                <!-- Text Content -->
                <div class="md:w-1/2" data-aos="fade-right">
                    <div class="inline-block bg-secondary-500/10 text-secondary-600 font-bold text-sm px-4 py-2 rounded-full mb-4">PROFIL KAMI</div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">POS PAUD MAWAR HIDAYAH</h2>
                    <p class="text-gray-700 text-lg leading-relaxed mb-6">
                        Sebuah lembaga pendidikan anak usia dini yang memberikan pelayanan pada anak usia dini secara menyeluruh yang mencakup:
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-primary-500 flex items-center justify-center text-white shrink-0">
                                <i class="fas fa-utensils"></i>
                            </div>
                            <span class="ml-3 text-gray-700">Layanan gizi dan kesehatan</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-primary-500 flex items-center justify-center text-white shrink-0">
                                <i class="fas fa-book-open"></i>
                            </div>
                            <span class="ml-3 text-gray-700">Pendidikan yang berfokus pada anak</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-primary-500 flex items-center justify-center text-white shrink-0">
                                <i class="fas fa-hands-helping"></i>
                            </div>
                            <span class="ml-3 text-gray-700">Pengasuhan dan perlindungan</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-primary-500 flex items-center justify-center text-white shrink-0">
                                <i class="fas fa-brain"></i>
                            </div>
                            <span class="ml-3 text-gray-700">Pengembangan aspek kognitif dan motorik</span>
                        </div>
                    </div>
                </div>

                <!-- Image -->
                <div class="md:w-1/2 flex justify-center md:justify-end" data-aos="fade-left">
                    <div class="relative">
                        <div class="absolute -top-6 -right-6 w-24 h-24 bg-secondary-500/20 rounded-full animate-pulse"></div>
                        <img src="images/about.png" alt="Tentang Kami" class="w-full max-w-md rounded-2xl hover:shadow-2xl transition-all duration-500">
                        <div class="absolute -bottom-6 -left-6 w-20 h-20 bg-primary-500/20 rounded-full animate-pulse delay-700"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Visi dan Misi Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6 sm:px-8 lg:px-16">
            <div class="flex flex-col md:flex-row-reverse items-center gap-12">
                <!-- Text Section -->
                <div class="md:w-1/2" data-aos="fade-left">
                    <div class="inline-block bg-primary-500/10 text-primary-600 font-bold text-sm px-4 py-2 rounded-full mb-4">TUJUAN KAMI</div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">VISI DAN MISI</h2>

                    <div class="bg-primary-500/5 p-6 rounded-xl mb-6 hover:shadow-md transition-all duration-300">
                        <h3 class="font-bold text-xl text-primary-600 mb-3">VISI:</h3>
                        <p class="text-gray-700 text-lg">Terwujud Pribadi Yang Taqwa, Cendekia, Dan Berbudaya</p>
                    </div>

                    <div class="bg-secondary-500/5 p-6 rounded-xl hover:shadow-md transition-all duration-300">
                        <h3 class="font-bold text-xl text-secondary-600 mb-3">MISI:</h3>
                        <ol class="list-decimal list-inside text-gray-700 space-y-3">
                            <li class="flex items-start">
                                <span class="mr-2">1.</span>
                                <span>Merancang pembelajaran yang menarik dan menyenangkan yang mampu memotivasi peserta didik untuk selalu belajar dan menemukan pembelajaran.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2">2.</span>
                                <span>Membangun lingkungan sekolah yang membentuk peserta didik memiliki akhlak mulia melalui rutinitas kegiatan keagamaan dan menerapkan ajaran agama melalui cara berinteraksi di sekolah.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2">3.</span>
                                <span>Membangun lingkungan sekolah yang berorientasi dalam kebhinekaan global, mencintai budaya lokal dan menjunjung nilai gotong royong.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2">4.</span>
                                <span>Mengembangkan kemandirian, nalar kritis dan kreativitas yang memfasilitasi keragaman minat dan bakat peserta didik.</span>
                            </li>
                        </ol>
                    </div>
                </div>

                <!-- Image Section -->
                <div class="md:w-1/2" data-aos="fade-right">
                    <div class="relative">
                        <div class="absolute -top-6 -left-6 w-24 h-24 bg-primary-500/20 rounded-full animate-pulse"></div>
                        <img src="images/images.png" alt="Kolase Kegiatan" class="w-full h-auto rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-500">
                        <div class="absolute -bottom-6 -right-6 w-20 h-20 bg-secondary-500/20 rounded-full animate-pulse delay-700"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Us Section -->
    <section class="py-16 bg-texture bg-cover bg-center relative">
        <div class="absolute inset-0 bg-gradient-to-r from-primary-500/10 to-secondary-500/10"></div>
        <div class="container mx-auto px-6 sm:px-8 lg:px-16 relative z-10">
            <div class="text-center mb-12">
                <div class="inline-block bg-secondary-500/10 text-secondary-600 font-bold text-sm px-4 py-2 rounded-full mb-4">HUBUNGI KAMI</div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Kenali Kami Lebih Jauh</h2>
                <div class="w-24 h-1 bg-secondary-500 rounded-full mt-3 mx-auto"></div>
            </div>

            <div class="flex flex-col md:flex-row items-center gap-10 mb-10">
                <!-- Map -->
                <div class="md:w-1/2" data-aos="fade-right">
                    <div class="h-full rounded-xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 group">
                        <a href="https://www.google.com/maps?q=-6.996603,107.552297" target="_blank" rel="noopener noreferrer" class="relative block h-full">
                            <div class="absolute inset-0 bg-primary-500/0 group-hover:bg-primary-500/10 transition-all duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
                                <span class="bg-white/90 text-primary-600 px-4 py-2 rounded-lg font-medium">Buka di Google Maps</span>
                            </div>
                            <iframe
                                src="https://www.google.com/maps/embed?..."
                                class="w-full h-full min-h-[450px]"
                                style="border:0;"
                                allowfullscreen
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </a>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="md:w-1/2" data-aos="fade-left">
                    <div class="bg-white p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-500">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Informasi Kontak</h3>

                        <div class="space-y-6">
                            <div class="flex items-start">
                                <div class="w-12 h-12 rounded-full bg-primary-500 flex items-center justify-center text-white shrink-0">
                                    <i class="fas fa-map-marker-alt text-xl"></i>
                                </div>
                                <div class="ml-4">
                                    <h4 class="font-semibold text-lg text-primary-600 mb-1">Lokasi</h4>
                                    <p class="text-gray-700">
                                        JL. Terusan Kopo Km, 13,5 Kp. Leuweung Kaleng RT 01/04 Desa Katapang Kec Katapang Kab Bandung
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="w-12 h-12 rounded-full bg-secondary-500 flex items-center justify-center text-white shrink-0">
                                    <i class="fas fa-envelope text-xl"></i>
                                </div>
                                <div class="ml-4">
                                    <h4 class="font-semibold text-lg text-secondary-600 mb-1">Email</h4>
                                    <p class="text-gray-700">ppmh@gmail.com</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="w-12 h-12 rounded-full bg-primary-500 flex items-center justify-center text-white shrink-0">
                                    <i class="fas fa-phone text-xl"></i>
                                </div>
                                <div class="ml-4">
                                    <h4 class="font-semibold text-lg text-primary-600 mb-1">Telepon</h4>
                                    <p class="text-gray-700">081322466549</p>
                                </div>
                            </div>

                            <div class="pt-4">
                                <a href="#" class="inline-flex items-center bg-secondary-500 hover:bg-secondary-600 text-white font-medium py-3 px-6 rounded-full transition-all duration-300 transform hover:translate-x-1">
                                    Hubungi Kami
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
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
<script src="js/script.js"></script>