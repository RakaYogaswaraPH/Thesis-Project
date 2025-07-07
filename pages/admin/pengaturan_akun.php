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
    <!-- Navbar -->
    <?php include '../../components/admin/Navbar.php'; ?>
    <!-- End Of Navbar -->
    <div class="relative md:ml-64 bg-gray-50">
      <nav class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4">
        <div class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4">
          <a class="text-white text-xl uppercase hidden lg:inline-block font-semibold">Pengaturan Akun</a>
          <!-- Navbar -->
          <?php include '../../components/admin/Profile.php'; ?>
          <!-- End Of Navbar -->
        </div>
      </nav>

      <!-- Header -->
      <div class="relative bg-secondary-400 md:pt-32 pb-20 pt-12">
      </div>

      <div class="px-4 md:px-10 mx-auto w-full -m-24">
        <div class="flex flex-wrap">
          <div class="w-full lg:w-8/12 px-4">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-100 border-0">
              <div class="rounded-t bg-white mb-0 px-6 py-6">
                <div class="text-center flex justify-between">
                  <h6 class="text-gray-700 text-xl font-bold">
                    Akun Saya
                  </h6>
                  <button
                    class="bg-primary-500 text-white active:bg-primary-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                    type="button">
                    Ubah
                  </button>
                </div>
              </div>
              <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                <form>
                  <h6
                    class="text-gray-400 text-sm mt-3 mb-6 font-bold uppercase">
                    Informasi Pengguna
                  </h6>
                  <div class="flex flex-wrap">
                    <div class="w-full lg:w-6/12 px-4">
                      <div class="relative w-full mb-3">
                        <label
                          class="block uppercase text-gray-600 text-xs font-bold mb-2"
                          htmlFor="grid-password">
                          Username
                        </label>
                        <input
                          type="text"
                          class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                          value="<?= htmlspecialchars($pengguna['nama_admin']) ?>" />
                      </div>
                    </div>
                    <div class="w-full lg:w-6/12 px-4">
                      <div class="relative w-full mb-3">
                        <label
                          class="block uppercase text-gray-600 text-xs font-bold mb-2"
                          htmlFor="grid-password">
                          Email address
                        </label>
                        <input
                          type="email"
                          class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                          value="<?= htmlspecialchars($pengguna['email']) ?>" />
                      </div>
                    </div>
                    <div class="w-full px-4">
                      <div class="relative w-full mb-3">
                        <label
                          class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                          htmlFor="grid-password">
                          Address
                        </label>
                        <input
                          type="text"
                          class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                          value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" />
                      </div>
                    </div>
                  </div>
                  <hr class="mt-6 border-b-1 border-gray-300" />
                  <div class="flex flex-wrap">
                    <div class="w-full lg:w-12/12 px-4">
                      <div class="relative w-full mb-3">
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="w-full lg:w-4/12 px-4 mb-32">
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-10 shadow-xl rounded-lg">
              <div class="px-6">
                <div class="flex flex-wrap justify-center">
                  <div class="w-full px-4 flex justify-center">
                    <div class="relative w-full px-4 flex justify-center">
                      <div class="absolute -top-16 mt-6">
                        <img alt="Profile" src="../../src/images/Profile.png"
                          class="shadow-xl rounded-full w-32 h-32 object-cover border-4 border-white" />
                      </div>
                    </div>
                  </div>
                  <div class="w-full px-4 text-center mt-20">
                    <div class="flex justify-center py-4 lg:pt-4 pt-8">
                    </div>
                  </div>
                </div>

                <div class="text-center mt-12">
                  <h3
                    class="text-xl font-semibold leading-normal mb-2 text-gray-700">
                    <?= htmlspecialchars($pengguna['nama_admin']) ?>
                  </h3>
                  <div
                    class="text-sm leading-normal mt-0 mb-2 text-gray-700 font-bold uppercase">
                    <i class=" mr-2 text-lg text-gray-700"></i>
                    Pengelola Paud
                  </div>
                </div>
                <div
                  class="mt-10 py-10 border-t border-gray-200 text-center">
                  <div class="flex flex-wrap justify-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Navbar -->
        <?php include '../../components/admin/footer.php'; ?>
        <!-- End Of Navbar -->

      </div>
    </div>
  </div>
</body>

</html>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
<script src="../../src/js/modal.js"></script>