<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPMH | Ikuti Tes Kecerdasan</title>
    <link rel="stylesheet" href="./src/styles/style.css">
    <link rel="icon" href="./src/images/Logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="font-[fredoka] text-gray-800 overflow-x-hidden">

    <!-- Navbar -->
    <?php include 'components/navbar.php'; ?>

    <!-- Hero Section: Penawaran Tes -->
    <section class="relative bg-hero bg-cover bg-center min-h-screen flex items-center pt-20 pb-20 md:pt-0 md:pb-0" style="background-image: url('./src/images/Hero_background.png');">
        <div class="absolute inset-0 bg-gradient-to-r from-white/70 to-white/30"></div>
        <div class="container mx-auto px-6 sm:px-8 lg:px-16 relative z-10">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 fade-in">
                    <div class="inline-block bg-primary-500/10 text-primary-600 font-bold text-sm md:text-lg px-4 py-2 rounded-full mb-6">
                        Ayo Gabung Sekarang !
                    </div>
                    <h1 class="text-4xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                        Dukung <span class="text-primary-500">Tumbuh Kembang Anak</span> Anda
                    </h1>
                    <p class="text-gray-600 mb-10 text-lg md:text-xl max-w-lg">
                        Daftarkan akun untuk mulai mengikuti tes dan dapatkan hasil tipe kecerdasan anak yang bisa membantu Anda mendampingi mereka lebih tepat.
                    </p>
                    <a href="register.php" class="bg-secondary-500 hover:bg-secondary-600 text-white font-bold py-4 px-8 rounded-full flex items-center transition-all duration-300 transform hover:translate-x-2 hover:shadow-xl">
                        Daftar Sekarang
                        <i class="fas fa-user-plus ml-3"></i>
                    </a>
                </div>

                <div class="md:w-1/2 mt-12 md:mt-0 fade-in-delay-1">
                    <div class="relative">
                        <div class="absolute -top-6 -left-6 w-24 h-24 bg-primary-500/20 rounded-full animate-pulse"></div>
                        <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-secondary-500/20 rounded-full animate-pulse delay-700"></div>
                        <img src="./src/images/Hero_image.png" alt="Tes Kecerdasan Anak" class="w-full h-full object-cover rounded-2xl transform hover:scale-[1.02] transition-all duration-500" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer (optional jika kamu punya) -->
    <?php include 'components/footer.php'; ?>

</body>

</html>