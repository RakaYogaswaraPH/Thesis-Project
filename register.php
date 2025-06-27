<?php
session_start();
include './config/config.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPMH | Daftar Akun</title>

    <link rel="stylesheet" href="./src/styles/style.css">
    <link rel="icon" href="./src/images/Logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="font-[fredoka] bg-gradient-to-br from-orange-400 to-teal-400 min-h-screen">
    <!-- Navbar -->
    <?php include 'components/navbar.php'; ?>
    <!-- End Of Navbar -->

    <div class="min-h-screen flex items-center justify-center p-4">
        <!-- Floating elements -->
        <div class="fixed top-20 left-20 w-12 h-12 bg-white/20 rounded-full animate-bounce hidden md:block"></div>
        <div class="fixed bottom-32 right-16 w-8 h-8 bg-white/15 rounded-full animate-bounce hidden md:block" style="animation-delay: 1.5s;"></div>
        <div class="fixed top-1/2 right-10 w-6 h-6 bg-white/10 rounded-full animate-pulse hidden lg:block" style="animation-delay: 3s;"></div>

        <div class="w-full max-w-md">
            <div class="bg-white rounded-2xl shadow-2xl p-8">
                <!-- Header -->
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-gradient-to-r from-orange-500 to-teal-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-plus text-2xl text-white"></i>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-800 mb-2">Daftar ke PPMH</h1>
                    <p class="text-gray-600 text-sm">Bergabunglah dengan komunitas belajar kami</p>
                </div>

                <!-- Form -->
                <form class="space-y-4" id="registerForm" method="POST" action="register.php">
                    <!-- Nama Lengkap -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                        <div class="relative">
                            <input
                                type="text"
                                class="w-full px-4 py-3 pl-12 border-2 border-gray-300 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all"
                                placeholder="Masukkan nama lengkap" name="nama_pengguna"
                                required>
                            <i class="fas fa-user absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                        <div class="relative">
                            <input
                                type="email"
                                class="w-full px-4 py-3 pl-12 border-2 border-gray-300 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all"
                                placeholder="email@example.com" name="email"
                                required>
                            <i class="fas fa-envelope absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                    </div>

                    <!-- Nomor Telepon -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor Telepon</label>
                        <div class="relative">
                            <input
                                type="tel"
                                class="w-full px-4 py-3 pl-12 border-2 border-gray-300 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all"
                                placeholder="08xxxxxxxxxx" name="nomor_telepon"
                                required>
                            <i class="fas fa-phone absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                        <div class="relative">
                            <input
                                type="password"
                                id="password"
                                class="w-full px-4 py-3 pl-12 pr-12 border-2 border-gray-300 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all"
                                placeholder="••••••••" name="password"
                                required>
                            <i class="fas fa-lock absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <button
                                type="button"
                                class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors"
                                onclick="togglePassword('password', 'toggleIcon1')">
                                <i class="fas fa-eye" id="toggleIcon1"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Konfirmasi Password -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Konfirmasi Password</label>
                        <div class="relative">
                            <input
                                type="password"
                                id="confirmPassword"
                                class="w-full px-4 py-3 pl-12 pr-12 border-2 border-gray-300 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all"
                                placeholder="••••••••" name="re_password"
                                required>
                            <i class="fas fa-lock absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <button
                                type="button"
                                class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors"
                                onclick="togglePassword('confirmPassword', 'toggleIcon2')">
                                <i class="fas fa-eye" id="toggleIcon2"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Terms & Conditions -->
                    <div class="flex items-start space-x-3">
                        <input type="checkbox" id="terms" class="w-4 h-4 text-blue-500 border-gray-300 rounded focus:ring-blue-500 mt-1" required>
                        <label for="terms" class="text-sm text-gray-600 leading-relaxed">
                            Saya setuju dengan <a href="#" class="text-teal-500 hover:text-orange-600 font-semibold">Syarat & Ketentuan</a>
                            dan <a href="#" class="text-teal-500 hover:text-orange-600 font-semibold">Kebijakan Privasi</a>
                        </label>
                    </div>

                    <!-- Register Button -->
                    <button
                        type="submit" name="register"
                        class="w-full bg-gradient-to-r from-orange-500 to-teal-600 text-white font-bold py-3 rounded-xl hover:from-teal-600 transform hover:scale-100 transition-all duration-300 flex items-center justify-center group">
                        <span>Daftar Sekarang</span>
                        <i class="fas fa-arrow-right ml-2 group-hover:ml-3 transition-all"></i>
                    </button>

                    <!-- Login Link -->
                    <div class="text-center mt-6">
                        <p class="text-gray-600 text-sm">
                            Sudah punya akun?
                            <a href="login.php" class="text-blue-500 hover:text-blue-600 font-semibold">Masuk sekarang</a>
                        </p>
                    </div>
                </form>
            </div>

            <!-- Back to Home -->
            <div class="text-center mt-6">
                <a href="index.php" class="inline-flex items-center text-white/80 hover:text-white transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>
                    <span>Kembali ke Beranda</span>
                </a>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(fieldId, iconId) {
            const passwordField = document.getElementById(fieldId);
            const toggleIcon = document.getElementById(iconId);

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>

</body>

</html>