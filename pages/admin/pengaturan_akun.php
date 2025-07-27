<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: ../../login.php");
  exit;
}

$pengguna = $_SESSION['admin'];
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" href="../../src/images/Logo.png" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../src/styles/style.css" />
  <link rel="stylesheet" href="../../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" />
  <title>PPMH | Pengaturan Akun</title>
</head>

<body class="font-[poppins] text-gray-700 antialiased">
  <div id="root">
    <?php include '../../components/admin/Navbar.php'; ?>
    <div class="relative md:ml-64 bg-gray-50">
      <nav class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4">
        <div class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4">
          <a class="text-white text-2xl uppercase hidden lg:inline-block font-semibold mt-6">Pengaturan Akun</a>
          <?php include '../../components/admin/Profile.php'; ?>
        </div>
      </nav>

      <div class="relative bg-secondary-400 md:pt-32 pb-20 pt-12"></div>

      <!-- Form Pengguna -->
      <div class="px-4 md:px-10 mx-auto w-full -m-24">
        <div class="flex flex-wrap">
          <div class="w-full lg:w-8/12 px-4">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-white border border-gray-200">
              <div class="rounded-t-lg bg-gradient-to-r from-primary-500 to-primary-400 text-white mb-0 px-6 py-6">
                <div class="text-center flex justify-between items-center">
                  <h6 class="text-xl font-bold"><i class="fas fa-user-cog mr-2"></i> Akun Saya</h6>
                </div>
              </div>

              <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                <form action="../../config/update_admin.php" method="POST">
                  <h6 class="text-primary-500 text-sm mt-3 mb-6 font-bold uppercase"><i class="fas fa-info-circle mr-2"></i>Informasi Pengguna</h6>
                  <div class="flex flex-wrap">
                    <div class="w-full lg:w-6/12 px-4">
                      <div class="relative w-full mb-3">
                        <label class="block uppercase text-gray-600 text-xs font-bold mb-2">Nama Pengguna</label>
                        <div class="flex items-center border rounded shadow bg-white px-3">
                          <i class="fas fa-user text-gray-400 mr-2"></i>
                          <input name="nama_admin" type="text" required value="<?= htmlspecialchars($pengguna['nama_admin']) ?>" class="border-0 py-3 placeholder-gray-300 text-gray-600 bg-white text-sm w-full focus:outline-none" />
                        </div>
                      </div>
                    </div>
                    <div class="w-full lg:w-6/12 px-4">
                      <div class="relative w-full mb-3">
                        <label class="block uppercase text-gray-600 text-xs font-bold mb-2">Alamat Email</label>
                        <div class="flex items-center border rounded shadow bg-white px-3">
                          <i class="fas fa-envelope text-gray-400 mr-2"></i>
                          <input name="email" type="email" required value="<?= htmlspecialchars($pengguna['email']) ?>" class="border-0 py-3 placeholder-gray-300 text-gray-600 bg-white text-sm w-full focus:outline-none" />
                        </div>
                      </div>
                    </div>
                    <div class="w-full px-4">
                      <div class="relative w-full mb-3">
                        <label class="block uppercase text-gray-600 text-xs font-bold mb-2">Password Lama</label>
                        <div class="flex items-center border rounded shadow bg-white px-3">
                          <i class="fas fa-lock text-gray-400 mr-2"></i>
                          <input name="old_password" type="password" placeholder="Masukkan password lama..." class="border-0 py-3 placeholder-gray-300 text-gray-600 bg-white text-sm w-full focus:outline-none" />
                        </div>
                      </div>
                      <div class="relative w-full mb-3">
                        <label class="block uppercase text-gray-600 text-xs font-bold mb-2">Password Baru</label>
                        <div class="flex items-center border rounded shadow bg-white px-3">
                          <i class="fas fa-key text-gray-400 mr-2"></i>
                          <input name="new_password" type="password" placeholder="Masukkan password baru..." class="border-0 py-3 placeholder-gray-300 text-gray-600 bg-white text-sm w-full focus:outline-none" />
                        </div>
                      </div>
                      <div class="relative w-full mb-6">
                        <label class="block uppercase text-gray-600 text-xs font-bold mb-2">Konfirmasi Password</label>
                        <div class="flex items-center border rounded shadow bg-white px-3">
                          <i class="fas fa-check-circle text-gray-400 mr-2"></i>
                          <input name="confirm_password" type="password" placeholder="Konfirmasi password baru..." class="border-0 py-3 placeholder-gray-300 text-gray-600 bg-white text-sm w-full focus:outline-none" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="text-right mt-4">
                    <button type="submit" class="bg-primary-500 text-white active:bg-primary-600 font-bold uppercase text-xs px-6 py-2 rounded shadow hover:shadow-lg transition duration-150">
                      <i class="fas fa-save mr-2"></i> Simpan Perubahan
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- Profil Pengguna -->
          <div class="w-full lg:w-4/12 px-4 mb-32">
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-10 shadow-xl rounded-lg overflow-hidden">
              <div class="h-24"></div>

              <div class="px-6 -mt-16">
                <div class="flex justify-center">
                  <div class="relative">
                    <img alt="Profile" src="../../src/images/Profile.png"
                      class="shadow-xl rounded-full w-32 h-32 object-cover border-4 border-white" />
                  </div>
                </div>

                <div class="text-center mt-6">
                  <h3 class="text-xl font-semibold text-gray-800">
                    <i class="fas fa-user mr-2 text-primary-500"></i><?= htmlspecialchars($pengguna['nama_admin']) ?>
                  </h3>
                  <div class="mt-2">
                    <span class="inline-flex items-center px-3 py-1 text-xs font-semibold bg-primary-100 text-primary-700 rounded-full uppercase tracking-wide">
                      <i class="fas fa-user-shield mr-1"></i> Pengelola Paud
                    </span>
                  </div>
                </div>

                <div class="mt-6 py-4 border-t border-gray-200 text-center">
                  <p class="text-gray-500 text-sm">POS PAUD MAWAR HIDAYAH</p>
                </div>
              </div>
            </div>
          </div>

        </div>
        <?php include '../../components/admin/footer.php'; ?>
      </div>
    </div>
    <?php if (isset($_SESSION['flash_message'])): ?>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      <script>
        document.querySelector('form').addEventListener('submit', function(e) {
          e.preventDefault();
          Swal.fire({
            title: 'Simpan perubahan?',
            text: "Pastikan data yang kamu ubah sudah benar.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya, simpan',
            cancelButtonText: 'Batal',
            reverseButtons: true
          }).then((result) => {
            if (result.isConfirmed) {
              e.target.submit();
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