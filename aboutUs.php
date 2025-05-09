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
    <?php include 'components/navbar.php'; ?>
    <!-- End Of Navbar -->

    <!-- Hero Section -->
    <section class="w-full py-24 flex flex-col items-center justify-center text-center px-4 relative">
        <div class="absolute inset-0 w-full h-full overflow-hidden">
            <img src="images/background.png" alt="Background" class="w-full h-auto min-h-full object-cover object-center" />
        </div>
        <div class="relative z-10">
            <h1 class="text-teal-600 font-semibold mb-4 text-2xl sm:text-3xl md:text-4xl">Tentang Kami</h1>
            <img src="images/Logos.png" alt="Logo PPMH" class="w-48 h-48 mb-4 mx-auto" />

            <h1 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-black">POS PAUD MAWAR HIDAYAH (PPMH)</h1>
            <p class="mt-6 text-lg sm:text-xl font-semibold text-gray-700">Mewujudkan Pribadi Yang Taqwa, Cendekia, Dan Berbudaya</p>
        </div>
    </section>

    <!-- Transitional Title Section -->
    <section class="text-center py-8 bg-white">
        <h3 class="text-xl sm:text-2xl md:text-3xl font-semibold text-gray-800">
            Mencetak Generasi Belajar Baru Yang Unggul
        </h3>
        <div class="w-24 h-1 bg-orange-300 rounded-full mt-2 mx-auto"></div>
    </section>

    <!-- About Us Section -->
    <section class="container mx-auto px-8 py-10">
        <div class="max-w-screen-xl mx-auto flex flex-col md:flex-row items-center gap-10">
            <!-- Text Content -->
            <div class="md:w-1/2">
                <h2 class="text-2xl md:text-3xl font-bold mb-4">POS PAUD MAWAR HIDAYAH</h2>
                <p class="text-gray-700 text-base leading-relaxed">
                    Sebuah lembaga pendidikan anak usia dini yang memberikan pelayanan pada anak usia dini secara menyeluruh yang mencakup layanan gizi, kesehatan, pendidikan, pengasuhan, dan perlindungan, untuk mengoptimalkan semua aspek perkembangan anak.
                </p>
            </div>
            <!-- Image -->
            <div class="md:w-1/2 flex justify-center md:justify-end pr-4">
                <img src="images/about.png" alt="Tentang Kami" class="w-full max-w-md" />
            </div>
        </div>
    </section>

    <!-- Visi dan Misi Section -->
    <section class="container mx-auto px-8 py-10">
        <div class="max-w-screen-xl mx-auto flex flex-col md:flex-row items-center gap-10">
            <!-- Image Section -->
            <div class="md:w-1/2">
                <img src="images/images.png" alt="Kolase Kegiatan" class="w-full h-auto rounded-xl" />
            </div>

            <!-- Text Section -->
            <div class="md:w-1/2">
                <h2 class="text-2xl md:text-3xl font-bold mb-6">VISI DAN MISI</h2>

                <div class="mb-4">
                    <p class="font-semibold text-gray-800 mb-1">VISI:</p>
                    <p class="text-gray-700">Terwujud Pribadi Yang Taqwa, Cendekia, Dan Berbudaya</p>
                </div>

                <div>
                    <p class="font-semibold text-gray-800 mb-1">MISI:</p>
                    <ol class="list-decimal list-inside text-gray-700 space-y-2">
                        <li>Merancang pembelajaran yang menarik dan menyenangkan yang mampu memotivasi peserta didik untuk selalu belajar dan menemukan pembelajaran.</li>
                        <li>Membangun lingkungan sekolah yang membentuk peserta didik memiliki akhlak mulia melalui rutinitas kegiatan keagamaan dan menerapkan ajaran agama melalui cara berinteraksi di sekolah.</li>
                        <li>Membangun lingkungan sekolah yang berorientasi dalam kebhinekaan global, mencintai budaya lokal dan menjunjung nilai gotong royong.</li>
                        <li>Mengembangkan kemandirian, nalar kritis dan kreativitas yang memfasilitasi keragaman minat dan bakat peserta didik.</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

<!-- Contact Us Section -->
<section class="w-full px-8 py-10 bg-cover bg-center bg-no-repeat" style="background-image: url('images/Textures.png');">
    <div class=" container px-8 py-8 relative max-w-screen-xl mx-auto flex flex-col md:flex-row items-center gap-10">
        <!-- Map -->
        <div class="w-full md:w-1/2 rounded-xl overflow-hidden shadow-lg">
            <a href="https://www.google.com/maps?q=-6.996603,107.552297" target="_blank" rel="noopener noreferrer">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15838.69023821016!2d107.552297!3d-6.996603!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwNTknNDguNiJTIDEwN8KwMzMnMDguMyJF!5e0!3m2!1sen!2sid!4v1715238700000!5m2!1sen!2sid"
                    width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </a>
        </div>

        <!-- Contact Info -->
        <div class="w-full md:w-1/2">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6">Kenali Kami Lebih Jauh</h2>

            <div class="mb-4">
                <p class="font-semibold text-gray-800 mb-1">Lokasi :</p>
                <p class="text-gray-700">
                    JL. Terusan Kopo Km, 13,5 Kp. Leuweung Kaleng RT 01/04 Desa Katapang Kec Katapang Kab Bandung
                </p>
            </div>

            <div>
                <p class="font-semibold text-gray-800 mb-1">Kontak :</p>
                <p class="text-gray-700">ppmh@gmail.com</p>
                <p class="text-gray-700">081322466549</p>
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