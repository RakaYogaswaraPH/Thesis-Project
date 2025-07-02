<?php
include '../../config/config.php';
include '../../config/request.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);


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
  <title>PPMH | Daftar Pengguna</title>
</head>

<body class="font-[poppins] text-gray-700 antialiased">
  <div id="root">
    <!-- Navbar -->
    <?php include '../../components/admin/Navbar.php'; ?>
    <!-- End Of Navbar -->
    <div class="relative md:ml-64 bg-gray-50">
      <nav class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4">
        <div class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4">
          <a class="text-white text-xl uppercase hidden lg:inline-block font-semibold">Daftar Pengguna</a>
          <!-- Navbar -->
          <?php include '../../components/admin/Profile.php'; ?>
          <!-- End Of Navbar -->
        </div>
      </nav>

      <!-- Header -->
      <div class="relative bg-pink-600 md:pt-20 pb-32 pt-12">
      </div>

      <div class="px-4 md:px-10 mx-auto w-full -m-24">
        <div class="flex flex-wrap mt-4">
          <div class="w-full mb-12 px-4">
            <div
              class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
              <div class="rounded-t mb-0 px-4 py-3 border-0">
                <div class="flex flex-wrap items-center">
                  <div
                    class="relative w-full max-w-full flex-grow flex-1">
                    <h3 class="font-semibold text-lg text-gray-700">
                      Daftar Guru
                    </h3>
                  </div>
                  <button onclick="openAddModal('guru')" class="bg-green-600 text-white text-sm px-4 py-2 rounded hover:bg-green-700 transition">
                    + Tambah Pengguna
                  </button>
                </div>
              </div>

              <div class="block w-full overflow-x-auto">
                <table
                  class="items-center w-full bg-transparent border-collapse">
                  <thead>
                    <tr>
                      <th
                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-gray-50 text-gray-500 border-gray-100">
                        No
                      </th>
                      <th
                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-gray-50 text-gray-500 border-gray-100">
                        Nama Guru
                      </th>
                      <th
                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-gray-50 text-gray-500 border-gray-100">
                        Jabatan
                      </th>
                      <th
                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-gray-50 text-gray-500 border-gray-100">
                        Nomor Telepon
                      </th>
                      <th
                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-gray-50 text-gray-500 border-gray-100"></th>
                    </tr>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $query_guru = mysqli_query($connect, "SELECT * FROM guru_detail");

                    if (mysqli_num_rows($query_guru) > 0) {
                      while ($row = mysqli_fetch_assoc($query_guru)) {
                    ?>
                        <tr>
                          <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"><?= $no++ ?></td>
                          <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"><?= htmlspecialchars($row['nama_guru']) ?></td>
                          <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"><?= htmlspecialchars($row['jabatan']) ?></td>
                          <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"><?= htmlspecialchars($row['nomor_telepon']) ?></td>
                          <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-right">
                            <a href="#!" class="text-gray-500 block py-1 px-3" onclick="openDropdown(event,'dropdown-guru-<?= $row['user_id'] ?>')">
                              <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48" id="dropdown-guru-<?= $row['user_id'] ?>">
                              <a href="#!" data-id="<?= $row['user_id'] ?>" onclick="openEditModal('guru', this)" class="text-sm py-2 px-4 block w-full whitespace-nowrap text-gray-700">Ubah</a>
                              <a href="#!" data-id="<?= $row['user_id'] ?>" onclick="openDeleteModal('guru', this)" class="text-sm py-2 px-4 block w-full whitespace-nowrap text-gray-700">Hapus</a>
                            </div>
                          </td>
                        </tr>
                      <?php
                      }
                    } else {
                      ?>
                      <tr>
                        <td colspan="5" class="text-center text-gray-500 py-4">
                          Data guru kosong.
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="w-full mb-12 px-4">
            <div
              class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-pink-900 text-white">
              <div class="rounded-t mb-0 px-4 py-3 border-0">
                <div class="flex flex-wrap items-center">
                  <div
                    class="relative w-full max-w-full flex-grow flex-1">
                    <h3 class="font-semibold text-lg text-white">
                      Daftar Siswa
                    </h3>
                  </div>
                  <button onclick="openAddModal('siswa')" class="bg-green-600 text-white text-sm px-4 py-2 rounded hover:bg-green-700 transition">
                    + Tambah Siswa
                  </button>
                </div>
              </div>
              <div class="block w-full overflow-x-auto">
                <!-- Projects table -->
                <table
                  class="items-center w-full bg-transparent border-collapse">
                  <thead>
                    <tr>
                      <th
                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-pink-800 text-pink-300 border-pink-700">
                        No
                      </th>
                      <th
                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-pink-800 text-pink-300 border-pink-700">
                        Nama Siswa
                      </th>
                      <th
                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-pink-800 text-pink-300 border-pink-700">
                        Kelas
                      </th>
                      <th
                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-pink-800 text-pink-300 border-pink-700">
                        Jenis Kelamin
                      </th>
                      <th
                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-pink-800 text-pink-300 border-pink-700">
                        Nama Orang Tua
                      </th>
                      <th
                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-pink-800 text-pink-300 border-pink-700">
                        Nomor Telepon
                      </th>
                      <th
                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-pink-800 text-pink-300 border-pink-700"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $query_siswa = mysqli_query($connect, "SELECT * FROM pengguna_detail");

                    if (mysqli_num_rows($query_siswa) > 0) {
                      while ($row = mysqli_fetch_assoc($query_siswa)) {
                    ?>
                        <tr>
                          <td class="border-t-0 px-6 py-4 text-xs"><?= $no++ ?></td>
                          <td class="border-t-0 px-6 py-4 text-xs"><?= htmlspecialchars($row['nama_anak']) ?></td>
                          <td class="border-t-0 px-6 py-4 text-xs"><?= htmlspecialchars($row['kelas']) ?></td>
                          <td class="border-t-0 px-6 py-4 text-xs"><?= htmlspecialchars($row['jenis_kelamin']) ?></td>
                          <td class="border-t-0 px-6 py-4 text-xs"><?= htmlspecialchars($row['nama_orangtua']) ?></td>
                          <td class="border-t-0 px-6 py-4 text-xs"><?= htmlspecialchars($row['nomor_telepon']) ?></td>
                          <td class="border-t-0 px-6 py-4 text-xs text-right">
                            <a href="#!" class="text-white block py-1 px-3" onclick="openDropdown(event,'dropdown-siswa-<?= $row['user_id'] ?>')">
                              <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48" id="dropdown-siswa-<?= $row['user_id'] ?>">
                              <a href="#!" data-id="<?= $row['user_id'] ?>" onclick="openEditModal('siswa', this)" class="text-sm py-2 px-4 block w-full text-gray-700">Ubah</a>
                              <a href="#!" data-id="<?= $row['user_id'] ?>" onclick="openDeleteModal('siswa', this)" class="text-sm py-2 px-4 block w-full text-gray-700">Hapus</a>
                            </div>
                          </td>
                        </tr>
                      <?php
                      }
                    } else {
                      ?>
                      <tr>
                        <td colspan="5" class="text-center text-pink-200 py-4">
                          Data siswa kosong.
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
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


  <!-- Modal Tambah Guru -->
  <div id="modal-add-guru" class="hidden fixed inset-0 backdrop-blur-xs bg-opacity-50 z-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded shadow-lg w-full max-w-md">
      <h2 class="text-lg font-semibold mb-4">Tambah Guru Baru</h2>
      <form method="POST">
        <input type="hidden" name="aksi" value="tambah_guru">
        <div class="mb-4">
          <label class="block text-sm">Email</label>
          <input type="email" name="email" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
          <label class="block text-sm">Password</label>
          <input type="password" name="password" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
          <label class="block text-sm">Nama Guru</label>
          <input type="text" name="nama_guru" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
          <select name="jabatan" class="w-full border rounded p-2" required>
            <option value="">-- Pilih Jabatan --</option>
            <option value="Wali Kelas">Wali Kelas</option>
            <option value="Guru Pendamping">Guru Pendamping</option>
          </select>
        </div>
        <div class="mb-4">
          <label class="block text-sm">Nomor Telepon</label>
          <input type="text" name="nomor_telepon" class="w-full border rounded p-2" required>
        </div>
        <div class="flex justify-end gap-2">
          <button type="button" onclick="closeModal('modal-add-guru')" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 transition rounded">Batal</button>
          <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 transition text-white rounded">Tambah</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal Edit Guru -->
  <div id="modal-edit-guru" class="hidden fixed inset-0 backdrop-blur-xs bg-opacity-50 z-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded shadow-lg w-full max-w-md">
      <h2 class="text-lg font-semibold mb-4">Edit Guru</h2>
      <form method="POST">
        <input type="hidden" name="aksi" value="edit_guru">
        <input type="hidden" id="edit-user-id" name="user_id">
        <div class="mb-4">
          <label class="block text-sm">Nama Guru</label>
          <input type="text" id="edit-nama-guru" name="nama_guru" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
          <select id="edit-jabatan" name="jabatan" class="w-full border rounded p-2" required>
            <option value="">-- Pilih Jabatan --</option>
            <option value="Wali Kelas">Wali Kelas</option>
            <option value="Guru Pendamping">Guru Pendamping</option>
          </select>
        </div>
        <div class="mb-4">
          <label class="block text-sm">Nomor Telepon</label>
          <input type="text" id="edit-telepon-guru" name="nomor_telepon" class="w-full border rounded p-2" required>
        </div>
        <div class="flex justify-end gap-2">
          <button type="button" onclick="closeModal('modal-edit-guru')" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 transition rounded">Batal</button>
          <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 transition text-white rounded">Simpan</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal Hapus Guru -->
  <div id="modal-delete-guru" class="hidden fixed inset-0 backdrop-blur-xs bg-opacity-50 z-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded shadow-lg w-full max-w-sm text-center">
      <form method="POST">
        <input type="hidden" name="aksi" value="hapus_guru">
        <input type="hidden" id="delete-guru-id" name="user_id">
        <p class="mb-4 text-sm">Apakah Anda yakin ingin menghapus data guru ini?</p>
        <div class="flex justify-center gap-2">
          <button type="button" onclick="closeModal('modal-delete-guru')" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 transition rounded">Batal</button>
          <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 transition text-white rounded">Hapus</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal Tambah Siswa -->
  <div id="modal-add-siswa" class="hidden fixed inset-0 backdrop-blur-xs bg-opacity-50 z-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded shadow-lg w-full max-w-md">
      <h2 class="text-lg font-semibold mb-4">Tambah Siswa Baru</h2>
      <form method="POST">
        <input type="hidden" name="aksi" value="tambah_siswa">
        <div class="mb-4">
          <label class="block text-sm">Email</label>
          <input type="email" name="email" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
          <label class="block text-sm">Password</label>
          <input type="password" name="password" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
          <label class="block text-sm">Nama Siswa</label>
          <input type="text" name="nama_anak" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
          <label class="block text-sm">Kelas</label>
          <select name="kelas" class="w-full border rounded p-2" required>
            <option value="">-- Pilih Kelas --</option>
            <option value="A1">A1</option>
            <option value="B1">B1</option>
            <option value="B2">B2</option>
          </select>
        </div>
        <div class="mb-4">
          <label class="block text-sm">Jenis Kelamin</label>
          <select name="jenis_kelamin" class="w-full border rounded p-2" required>
            <option value="">-- Pilih Jenis Kelamin --</option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>
        <div class="mb-4">
          <label class="block text-sm">Nama Orang Tua</label>
          <input type="text" name="nama_orangtua" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
          <label class="block text-sm">Nomor Telepon</label>
          <input type="text" name="nomor_telepon" class="w-full border rounded p-2" required>
        </div>
        <div class="flex justify-end gap-2">
          <button type="button" onclick="closeModal('modal-add-siswa')" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 transition rounded">Batal</button>
          <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 transition text-white rounded">Tambah</button>
        </div>
      </form>
    </div>
  </div>


  <!-- Modal Edit Siswa -->
  <div id="modal-edit-siswa" class="hidden fixed inset-0 backdrop-blur-xs bg-opacity-50 z-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded shadow-lg w-full max-w-md">
      <h2 class="text-lg font-semibold mb-4">Edit Siswa</h2>
      <form method="POST">
        <input type="hidden" name="aksi" value="edit_siswa">
        <input type="hidden" id="edit-siswa-id" name="user_id">
        <div class="mb-4">
          <label class="block text-sm">Nama Siswa</label>
          <input type="text" id="edit-nama-anak" name="nama_anak" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
          <label class="block text-sm">Kelas</label>
          <select id="edit-kelas" name="kelas" class="w-full border rounded p-2" required>
            <option value="">-- Pilih Kelas --</option>
            <option value="A1">A1</option>
            <option value="B1">B1</option>
            <option value="B2">B2</option>
          </select>
        </div>
        <div class="mb-4">
          <label class="block text-sm">Jenis Kelamin</label>
          <select id="edit-jenis-kelamin" name="jenis_kelamin" class="w-full border rounded p-2" required>
            <option value="">-- Pilih Jenis Kelamin --</option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>

          </select>
        </div>
        <div class="mb-4">
          <label class="block text-sm">Nama Orang Tua</label>
          <input type="text" id="edit-nama-orangtua" name="nama_orangtua" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
          <label class="block text-sm">Nomor Telepon</label>
          <input type="text" id="edit-telepon" name="nomor_telepon" class="w-full border rounded p-2" required>
        </div>
        <div class="flex justify-end gap-2">
          <button type="button" onclick="closeModal('modal-edit-siswa')" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 transition rounded">Batal</button>
          <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 transition text-white rounded">Simpan</button>
        </div>
      </form>
    </div>
  </div>


  <!-- Modal Hapus Siswa -->
  <div id="modal-delete-siswa" class="hidden fixed inset-0 backdrop-blur-xs bg-opacity-50 z-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded shadow-lg w-full max-w-sm text-center">
      <form method="POST">
        <input type="hidden" name="aksi" value="hapus_siswa">
        <input type="hidden" id="delete-siswa-id" name="user_id">
        <p class="mb-4 text-sm">Apakah Anda yakin ingin menghapus data siswa ini?</p>
        <div class="flex justify-center gap-2">
          <button type="button" onclick="closeModal('modal-delete-siswa')" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 transition rounded">Batal</button>
          <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 transition text-white rounded">Hapus</button>
        </div>
      </form>
    </div>
  </div>


</body>

</html>

<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
<script>
  function openAddModal() {
    document.getElementById('modal-add-guru').classList.remove('hidden');
  }

  /* Make dynamic date appear */
  (function() {
    if (document.getElementById("get-current-year")) {
      document.getElementById("get-current-year").innerHTML =
        new Date().getFullYear();
    }
  })();
  /* Sidebar - Side navigation menu on mobile/responsive mode */
  function toggleNavbar(collapseID) {
    document.getElementById(collapseID).classList.toggle("hidden");
    document.getElementById(collapseID).classList.toggle("bg-white");
    document.getElementById(collapseID).classList.toggle("m-2");
    document.getElementById(collapseID).classList.toggle("py-3");
    document.getElementById(collapseID).classList.toggle("px-6");
  }

  /* Function for dropdowns */
  let currentDropdown = null;
  let currentPopper = null;

  function openDropdown(event, dropdownID) {
    if (currentDropdown && currentDropdown.id !== dropdownID) {
      currentDropdown.classList.add('hidden');
      currentDropdown.classList.remove('block');
      if (currentPopper) {
        currentPopper.destroy();
        currentPopper = null;
      }
    }

    const trigger = event.target.closest("a");
    const dropdown = document.getElementById(dropdownID);
    const isHidden = dropdown.classList.contains("hidden");
    dropdown.classList.toggle("hidden", !isHidden);
    dropdown.classList.toggle("block", isHidden);

    if (isHidden) {
      currentPopper = Popper.createPopper(trigger, dropdown, {
        placement: "bottom-start"
      });
      currentDropdown = dropdown;
    } else {
      if (currentPopper) {
        currentPopper.destroy();
        currentPopper = null;
      }
      currentDropdown = null;
    }
  }

  function openAddModal(type) {
    document.getElementById(`modal-add-${type}`).classList.remove('hidden');
  }

  function openEditModal(type, el) {
    const row = el.closest('tr');
    const id = el.getAttribute('data-id');
    if (type === 'guru') {
      document.getElementById('edit-user-id').value = id;
      document.getElementById('edit-nama-guru').value = row.children[1].textContent.trim();
      document.getElementById('edit-jabatan').value = row.children[2].textContent.trim();
      document.getElementById('edit-telepon-guru').value = row.children[3].textContent.trim();
    } else { // siswa
      document.getElementById('edit-siswa-id').value = id;
      document.getElementById('edit-nama-anak').value = row.children[1].textContent.trim();
      document.getElementById('edit-kelas').value = row.children[2].textContent.trim();
      document.getElementById('edit-jenis-kelamin').value = row.children[3].textContent.trim();
      document.getElementById('edit-nama-orangtua').value = row.children[4].textContent.trim();
      document.getElementById('edit-telepon').value = row.children[5].textContent.trim();
    }
    document.getElementById(`modal-edit-${type}`).classList.remove('hidden');
  }

  function openDeleteModal(type, el) {
    const id = el.getAttribute('data-id');
    document.getElementById(`delete-${type}-id`).value = id;
    document.getElementById(`modal-delete-${type}`).classList.remove('hidden');
  }

  function closeModal(modalId) {
    document.getElementById(modalId).classList.add('hidden');
  }
</script>