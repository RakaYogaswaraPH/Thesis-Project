<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<nav class="hidden md:block sticky top-0 bg-white shadow-md z-50">
    <div class="container mx-auto px-6 py-3 flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center group">
            <img src="./src/images/Logo.png" alt="PPMH Logo" class="h-16 w-16 transition-transform duration-300 group-hover:scale-110">
            <div class="ml-3">
                <span class="text-2xl font-bold text-primary-500 underline leading-none">PPMH</span>
                <div class="text-base text-primary-400">Taking learning fun</div>
            </div>
        </div>
        <!-- Navigasi -->
        <div class="hidden md:flex space-x-8 text-lg">
            <!-- Beranda -->
            <a href="<?php echo $currentPage == 'index.php' ? '#homepage' : 'index.php#homepage'; ?>"
                class="text-gray-700 hover:text-primary-500 font-semibold transition-colors duration-300 relative after:absolute after:bottom-0 after:left-0 after:bg-primary-500 after:h-0.5 after:w-0 hover:after:w-full after:transition-all after:duration-300">
                Beranda
            </a>
            <!-- Tentang Kami -->
            <a href="<?php echo $currentPage == 'aboutUs.php' ? '#aboutUs' : 'aboutUs.php#aboutUs'; ?>"
                class="text-gray-700 hover:text-primary-500 font-semibold transition-colors duration-300 relative after:absolute after:bottom-0 after:left-0 after:bg-primary-500 after:h-0.5 after:w-0 hover:after:w-full after:transition-all after:duration-300">
                Tentang Kami
            </a>
            <!-- Tipe Kecerdasan -->
            <a href="<?php echo $currentPage == 'intelligenceType.php' ? '#type' : 'intelligenceType.php#type'; ?>"
                class="text-gray-700 hover:text-primary-500 font-semibold transition-colors duration-300 relative after:absolute after:bottom-0 after:left-0 after:bg-primary-500 after:h-0.5 after:w-0 hover:after:w-full after:transition-all after:duration-300">
                Tipe Kecerdasan
            </a>
            <!-- Tes Kecerdasan -->
            <a href="<?php echo $currentPage == 'index.php' ? '#test' : 'index.php#test'; ?>"
                class="text-gray-700 hover:text-primary-500 font-semibold transition-colors duration-300 relative after:absolute after:bottom-0 after:left-0 after:bg-primary-500 after:h-0.5 after:w-0 hover:after:w-full after:transition-all after:duration-300">
                Tes Kecerdasan
            </a>
        </div>
        <!-- Tombol Autentikasi -->
        <div class="flex space-x-3">
            <!-- Tombol Masuk -->
            <a href="login.php"><button class="bg-secondary-500 hover:bg-secondary-600 text-white text-lg font-semibold py-2.5 px-5 rounded-full transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                    Masuk
                </button></a>
            <!-- Tombol Daftar -->
            <a href="register.php"><button class="bg-primary-500 hover:bg-primary-600 text-white text-lg font-semibold py-2.5 px-5 rounded-full transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                    Daftar
                </button></a>
        </div>
    </div>
</nav>