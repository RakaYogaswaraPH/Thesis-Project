<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<nav class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 shadow-inner flex justify-around items-center py-3 md:hidden z-50">
    <!-- Beranda -->
    <a href="<?php echo $currentPage == 'index.php' ? '#homepage' : 'index.php#homepage'; ?>"
        class="flex flex-col items-center <?php echo $currentPage == 'index.php' ? 'text-primary-500' : 'text-gray-500'; ?> text-xs hover:text-primary-500 transition-colors duration-300">
        <i class="fas fa-home text-lg"></i>
        <span>Beranda</span>
    </a>

    <!-- Tentang -->
    <a href="<?php echo $currentPage == 'aboutUs.php' ? '#aboutUs' : 'aboutUs.php#aboutUs'; ?>"
        class="flex flex-col items-center <?php echo $currentPage == 'aboutUs.php' ? 'text-primary-500' : 'text-gray-500'; ?> text-xs hover:text-primary-500 transition-colors duration-300">
        <i class="fas fa-users text-lg"></i>
        <span>Tentang</span>
    </a>
    <!-- Kecerdasan -->
    <a href="<?php echo $currentPage == 'intelligenceType.php' ? '#type' : 'intelligenceType.php#type'; ?>"
        class="flex flex-col items-center <?php echo $currentPage == 'intelligenceType.php' ? 'text-primary-500' : 'text-gray-500'; ?> text-xs hover:text-primary-500 transition-colors duration-300">
        <i class="fas fa-brain text-lg"></i>
        <span>Kecerdasan</span>
    </a>
    <!-- Tes IQ -->
    <a href="<?php echo $currentPage == 'index.php' ? '#tes' : 'index.php#tes'; ?>"
        class="flex flex-col items-center <?php echo $currentPage == 'index.php' ? '' : 'text-gray-500'; ?> text-xs hover:text-primary-500 transition-colors duration-300">
        <i class="fas fa-lightbulb text-lg"></i>
        <span>Tes IQ</span>
    </a>

    <!-- Masuk -->
    <a href="login.php"
        class="flex flex-col items-center <?php echo $currentPage == 'login.php' ? 'text-secondary-500' : 'text-gray-500'; ?> text-xs hover:text-secondary-500 transition-colors duration-300">
        <i class="fas fa-sign-in-alt text-lg"></i>
        <span>Masuk</span>
    </a>
</nav>