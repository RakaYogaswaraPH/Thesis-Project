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
            <h1 class="text-teal-600 font-semibold mb-4 text-2xl sm:text-3xl md:text-4xl">Tipe Kecerdasan</h1>
            <img src="images/Kids.png" alt="Logo PPMH" class="w-6xl h-5xl mb-4 mx-auto" />
            <p class="mt-6 text-lg sm:text-2xl font-semibold text-gray-700">Yuk kenali tipe kecerdasan mereka!</p>
        </div>
    </section>

    <!-- Tipe Kecerdasan Section -->
    <section class="bg-[#FFFDF5] py-20 px-4">
        <div class="max-w-screen-xl mx-auto text-center">
            <h3 class="text-xl sm:text-2xl md:text-3xl font-semibold text-gray-800">
                Yuk kenali tipe kecerdasan mereka!
                </h2>
                <div class="w-28 h-1 bg-orange-300 rounded-full mt-2 mx-auto mb-16"></div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-16 text-left">
                    <!-- Si Imajinatif (kiri atas) -->
                    <div class="flex items-center space-x-8">
                        <img src="images/kids1.png" alt="Si Imajinatif" class="w-64 h-64 object-contain" />
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-2">Si Imajinatif</h3>
                            <p class="text-gray-700 text-base leading-relaxed">
                                Suka menggambar, mewarnai, dan membangun hal-hal dari imajinasi. Dunia mereka penuh warna!
                            </p>
                        </div>
                    </div>

                    <!-- Si Pencerita (kanan atas) -->
                    <div class="flex items-center md:flex-row-reverse text-right">
                        <img src="images/kids2.png" alt="Si Logis Kecil" class="w-64 h-64 object-contain ml-6" />
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-2">Si Pencerita</h3>
                            <p class="text-gray-700 text-base leading-relaxed">
                                Pintar bercerita, cepat tangkap kosa kata baru, dan suka ngobrol atau membaca buku.
                            </p>
                        </div>
                    </div>

                    <!-- Si Cerdik (kiri bawah) -->
                    <div class="flex items-center space-x-8">
                        <img src="images/kids3.png" alt="Si Cerdik" class="w-64 h-64 object-contain" />
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-2">Si Cerdik</h3>
                            <p class="text-gray-700 text-base leading-relaxed">
                                Suka bertanya “kenapa?” dan tertarik sama pola, angka, dan eksperimen. Ilmuwan mini!
                            </p>
                        </div>
                    </div>

                    <!-- Si Logis Kecil -->
                    <div class="flex items-center md:flex-row-reverse text-right">
                        <img src="images/kids4.png" alt="Si Logis Kecil" class="w-64 h-64 object-contain ml-6" />
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-2">Si Logis Kecil</h3>
                            <p class="text-gray-700 text-base leading-relaxed">
                                Suka bertanya “kenapa?” dan tertarik sama pola, angka, dan eksperimen. Ilmuwan mini!
                            </p>
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