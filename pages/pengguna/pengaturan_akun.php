<?php
include '../../config/config.php';
session_start();
if (!isset($_SESSION['pengguna'])) {
    header("Location: ../../login.php");
    exit;
}
$pengguna = getPenggunaById($_SESSION['pengguna']['id']);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PPMH | Pengaturan Aku</title>
    <link rel="stylesheet" href="../../src/styles/style.css" />
    <link rel="icon" href="../../src/images/Logo.png" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>

<body class="font-[poppins] text-gray-800 bg-secondary-400 overflow-x-hidden">

    <?php include '../../components/user/navbar.php'; ?>
    <?php include '../../components/mobileNavbar.php'; ?>

    <div class="flex items-center justify-center px-4 py-8 mt-20">
        <div class="bg-white rounded-3xl shadow-xl border border-white/30 flex overflow-hidden max-w-[900px] w-full">
            <!-- KIRI -->
            <div class="bg-gradient-to-br from-yellow-100 to-orange-200 w-[35%] flex flex-col items-center justify-center py-8 px-4">
                <div class="w-24 h-24 bg-white border-orange-600 border-4 rounded-full shadow-md flex items-center justify-center mb-4">
                    <i class="fa-solid fa-user fa-2x text-orange-500"></i>
                </div>
                <h2 class="text-lg font-bold text-orange-700"><?= htmlspecialchars($pengguna['nama_anak']) ?></h2>
                <span class="text-sm mt-1 px-3 py-1 bg-white text-emerald-600 font-medium rounded-full shadow">Siswa PAUD</span>
                <p class="text-xs text-gray-600 mt-2 text-center px-2">Pos PAUD Mawar Hidayah</p>
            </div>

            <!-- KANAN -->
            <div class="w-[65%] bg-[#fdfaf5] p-8">
                <div class="flex items-center justify-between mb-4">
                    <h1 class="text-xl font-bold text-gray-800">Pengaturan Akun</h1>
                    <i class="fa-solid fa-user-gear text-lg text-emerald-600"></i>
                </div>

                <form action="../../config/update_user.php" method="post" class="space-y-6 text-sm">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Nama Pengguna -->
                        <div>
                            <label class="block font-medium mb-1 text-gray-700">Nama Pengguna</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                                    <i class="fa-solid fa-user text-xs"></i>
                                </span>
                                <input type="text" name="nama_anak" value="<?= htmlspecialchars($pengguna['nama_anak']) ?>"
                                    class="pl-9 w-full text-sm py-2 px-2 rounded-lg border border-gray-300 shadow-sm focus:ring-emerald-500 focus:border-emerald-500" />
                            </div>
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block font-medium mb-1 text-gray-700">Alamat Email</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                                    <i class="fa-solid fa-envelope text-xs"></i>
                                </span>
                                <input type="email" name="email" value="<?= htmlspecialchars($pengguna['email']) ?>"
                                    class="pl-9 w-full text-sm py-2 px-2 rounded-lg border border-gray-300 shadow-sm focus:ring-emerald-500 focus:border-emerald-500" />
                            </div>
                        </div>

                        <!-- Kelas -->
                        <div>
                            <label class="block font-medium mb-1 text-gray-700">Kelas</label>
                            <select name="kelas"
                                class="w-full text-sm py-2 px-2 rounded-lg border border-gray-300 shadow-sm focus:ring-emerald-500 focus:border-emerald-500">
                                <option value="A1" <?= $pengguna['kelas'] == 'A1' ? 'selected' : '' ?>>A1</option>
                                <option value="B1" <?= $pengguna['kelas'] == 'B1' ? 'selected' : '' ?>>B1</option>
                                <option value="B2" <?= $pengguna['kelas'] == 'B2' ? 'selected' : '' ?>>B2</option>
                            </select>
                        </div>

                        <!-- Jenis Kelamin -->
                        <div>
                            <label class="block font-medium mb-1 text-gray-700">Jenis Kelamin</label>
                            <input type="text" value="<?= htmlspecialchars($pengguna['jenis_kelamin']) ?>" readonly disabled
                                class="w-full text-sm py-2 px-2 rounded-lg border border-gray-200 bg-gray-100 text-gray-500 shadow-sm cursor-not-allowed" />
                        </div>

                        <!-- Nomor Telepon -->
                        <div>
                            <label class="block font-medium mb-1 text-gray-700">Nomor Telepon</label>
                            <input type="text" name="nomor_telepon" value="<?= htmlspecialchars($pengguna['nomor_telepon']) ?>"
                                class="w-full text-sm py-2 px-2 rounded-lg border border-gray-300 shadow-sm focus:ring-emerald-500 focus:border-emerald-500" />
                        </div>
                    </div>

                    <!-- Ganti Password -->
                    <div class="pt-4 border-t border-gray-200 mt-4">
                        <h2 class="text-base font-semibold text-gray-800 mb-2">Ganti Password</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Password Lama -->
                            <div>
                                <label class="block font-medium mb-1 text-gray-700">Password Lama</label>
                                <input type="password" name="old_password" placeholder="Masukkan password lama..."
                                    class="w-full text-sm py-2 px-2 rounded-lg border border-gray-300 shadow-sm focus:ring-emerald-500 focus:border-emerald-500" />
                            </div>

                            <!-- Password Baru -->
                            <div>
                                <label class="block font-medium mb-1 text-gray-700">Password Baru</label>
                                <input type="password" name="new_password" placeholder="Masukkan password baru..."
                                    class="w-full text-sm py-2 px-2 rounded-lg border border-gray-300 shadow-sm focus:ring-emerald-500 focus:border-emerald-500" />
                            </div>

                            <!-- Konfirmasi Password -->
                            <div class="md:col-span-2">
                                <label class="block font-medium mb-1 text-gray-700">Konfirmasi Password</label>
                                <input type="password" name="confirm_password" placeholder="Konfirmasi password baru..."
                                    class="w-full text-sm py-2 px-2 rounded-lg border border-gray-300 shadow-sm focus:ring-emerald-500 focus:border-emerald-500" />
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="text-right pt-4">
                        <button type="submit"
                            class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-6 rounded-lg shadow hover:shadow-md transition duration-200">
                            <i class="fa-solid fa-floppy-disk mr-2"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Tambahkan ini sebelum </body> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Simpan perubahan?',
                text: "Pastikan data yang kamu ubah sudah benar.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, simpan!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    e.target.submit(); // Lanjut submit
                } else {
                    Swal.fire({
                        icon: 'info',
                        title: 'Dibatalkan',
                        text: 'Perubahan tidak jadi disimpan.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                }
            });
        });
    </script>

    <?php if (isset($_SESSION['flash_message'])): ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire({
                    icon: '<?= $_SESSION['flash_message']['icon'] ?>',
                    title: '<?= $_SESSION['flash_message']['title'] ?>',
                    text: '<?= $_SESSION['flash_message']['message'] ?>',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true
                });
            });
        </script>
        <?php unset($_SESSION['flash_message']); ?>
    <?php endif; ?>
</body>

</html>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
<script src="../../src/js/modal.js"></script>