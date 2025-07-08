<ul class="relative flex-col md:flex-row list-none items-center hidden md:flex">
    <a class="text-gray-500 block" href="#pablo" onclick="openDropdown(event,'user-dropdown')">
        <div class="flex items-center gap-x-3">
            <!-- Teks Nama Pengguna (Selalu Bold) -->
            <span class="text-md font-medium text-gray-700">
                <?= htmlspecialchars($pengguna['nama_anak']) ?>
            </span>

            <!-- Foto Profil -->
            <span class="w-12 h-12 text-sm text-white bg-gray-200 inline-flex items-center justify-center rounded-full">
                <img alt="..." class="w-full rounded-full align-middle border-none shadow-lg" src="../../src/images/Profile.png" />
            </span>
        </div>
    </a>

    <!-- DROPDOWN -->
    <div
        class="hidden absolute top-full mt-2 right-0 bg-white text-base z-50 py-2 list-none text-left rounded shadow-lg min-w-48"
        id="user-dropdown">

        <!-- Pengaturan Akun -->
        <a href="pengaturan_akun.php"
            class="text-sm py-2 px-4 font-normal flex items-center gap-2 w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100 transition">
            <i class="fas fa-user-cog text-emerald-600"></i> Pengaturan Akun
        </a>

        <!-- Keluar -->
        <a href="javascript:void(0);" onclick="openLogoutModal()"
            class="text-sm py-2 px-4 font-normal flex items-center gap-2 w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100 transition">
            <i class="fas fa-sign-out-alt text-red-600"></i> Keluar
        </a>
    </div>
</ul>


<!-- Modal Konfirmasi Keluar -->
<div id="modal-logout-confirm" class="hidden fixed inset-0 bg-black/40 backdrop-blur-sm z-50 flex items-center justify-center">
    <div class="modal-content bg-white p-6 rounded-2xl shadow-xl w-full max-w-sm transform scale-95 opacity-0 transition duration-300 ease-in-out">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Konfirmasi Keluar</h3>
        <p class="text-sm text-gray-600 mb-6">Apakah Anda yakin ingin keluar dari akun?</p>
        <div class="flex justify-end gap-3">
            <button onclick="closeModal('modal-logout-confirm')" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg transition">
                Batal
            </button>
            <a href="logout.php" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition">
                Ya, Keluar
            </a>
        </div>
    </div>
</div>