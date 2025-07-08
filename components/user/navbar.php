<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<nav class="hidden md:block sticky top-0 bg-white shadow-md z-50">
    <div class="container mx-auto px-6 py-3 flex items-center justify-between">

        <!-- Logo -->
        <div class="flex items-center font-[fredoka] group">
            <img src="../../src/images/Logo.png" alt="PPMH Logo" class="h-16 w-16 transition-transform duration-300 group-hover:scale-110">
            <div class="ml-3">
                <span class="text-2xl font-bold text-primary-500 underline leading-none">PPMH</span>
                <div class="text-base text-primary-400">Taking learning fun</div>
            </div>
        </div>

        <!-- Navigasi -->
        <div class="flex-1 flex justify-center">
            <div class="hidden md:flex space-x-8 text-md">
                <a href="<?= $currentPage == 'beranda.php' ? '#homepage' : 'beranda.php#homepage'; ?>"
                    class="text-gray-700 hover:text-primary-500 font-semibold transition-colors duration-300 relative after:absolute after:bottom-0 after:left-0 after:bg-primary-500 after:h-0.5 after:w-0 hover:after:w-full after:transition-all after:duration-300">
                    Beranda
                </a>
                <a href="<?= $currentPage == 'tes_kecerdasan.php' ? '#aboutUs' : 'tes_kecerdasan.php#aboutUs'; ?>"
                    class="text-gray-700 hover:text-primary-500 font-semibold transition-colors duration-300 relative after:absolute after:bottom-0 after:left-0 after:bg-primary-500 after:h-0.5 after:w-0 hover:after:w-full after:transition-all after:duration-300">
                    Tes Kecerdasan
                </a>
                <a href="<?= $currentPage == 'intelligenceType.php' ? '#type' : 'intelligenceType.php#type'; ?>"
                    class="text-gray-700 hover:text-primary-500 font-semibold transition-colors duration-300 relative after:absolute after:bottom-0 after:left-0 after:bg-primary-500 after:h-0.5 after:w-0 hover:after:w-full after:transition-all after:duration-300">
                    Statistik Tes
                </a>
                <a href="<?= $currentPage == 'riwayat_tes.php' ? '#test' : 'riwayat_tes.php#test'; ?>"
                    class="text-gray-700 hover:text-primary-500 font-semibold transition-colors duration-300 relative after:absolute after:bottom-0 after:left-0 after:bg-primary-500 after:h-0.5 after:w-0 hover:after:w-full after:transition-all after:duration-300">
                    Riwayat Tes
                </a>
            </div>
        </div>

        <!-- Profil -->
        <div class="flex items-center">
            <?php include 'profile.php'; ?>
        </div>

    </div>
</nav>