function openAddModal(type) {
    const modal = document.getElementById(`modal-add-${type}`);
    const content = modal.querySelector('.modal-content');

    modal.classList.remove('hidden');

    // Jalankan animasi buka (dengan raf agar sinkron dengan repaint)
    requestAnimationFrame(() => {
        content.classList.remove('opacity-0', 'scale-95');
        content.classList.add('opacity-100', 'scale-100');
    });
}

function openEditModal(type, el) {
    const row = el.closest('tr');
    const id = el.getAttribute('data-id');

    if (type === 'guru') {
        document.getElementById('edit-user-id').value = id;
        document.getElementById('edit-nama-guru').value = row.children[1].textContent.trim();
        document.getElementById('edit-jabatan').value = row.children[2].textContent.trim();
        document.getElementById('edit-telepon-guru').value = row.children[3].textContent.trim();
    } else {
        document.getElementById('edit-siswa-id').value = id;
        document.getElementById('edit-nama-anak').value = row.children[1].textContent.trim();
        document.getElementById('edit-kelas').value = row.children[2].textContent.trim();
        document.getElementById('edit-jenis-kelamin').value = row.children[3].textContent.trim();
        document.getElementById('edit-nama-orangtua').value = row.children[4].textContent.trim();
        document.getElementById('edit-telepon').value = row.children[5].textContent.trim();
    }

    const modal = document.getElementById(`modal-edit-${type}`);
    const content = modal.querySelector('.modal-content');

    modal.classList.remove('hidden');

    requestAnimationFrame(() => {
        content.classList.remove('opacity-0', 'scale-95');
        content.classList.add('opacity-100', 'scale-100');
    });
}

function openDeleteModal(type, el) {
    const id = el.getAttribute('data-id');
    const modal = document.getElementById(`modal-delete-${type}`);
    const content = modal.querySelector('.modal-content');

    document.getElementById(`delete-${type}-id`).value = id;
    modal.classList.remove('hidden');

    requestAnimationFrame(() => {
        content.classList.remove('opacity-0', 'scale-95');
        content.classList.add('opacity-100', 'scale-100');
    });
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    const content = modal.querySelector('.modal-content');

    content.classList.remove('opacity-100', 'scale-100');
    content.classList.add('opacity-0', 'scale-95');

    setTimeout(() => {
        modal.classList.add('hidden');
    }, 300);
}

// Tahun dinamis
(function () {
    if (document.getElementById("get-current-year")) {
        document.getElementById("get-current-year").innerHTML =
            new Date().getFullYear();
    }
})();

// Toggle navbar responsif
function toggleNavbar(collapseID) {
    document.getElementById(collapseID).classList.toggle("hidden");
    document.getElementById(collapseID).classList.toggle("bg-white");
    document.getElementById(collapseID).classList.toggle("m-2");
    document.getElementById(collapseID).classList.toggle("py-3");
    document.getElementById(collapseID).classList.toggle("px-6");
}

// Dropdown
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

function openLogoutModal() {
    const modal = document.getElementById('modal-logout-confirm');
    modal.classList.remove('hidden');
    requestAnimationFrame(() => {
        modal.querySelector('.modal-content').classList.remove('scale-95', 'opacity-0');
        modal.querySelector('.modal-content').classList.add('scale-100', 'opacity-100');
    });
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    const content = modal.querySelector('.modal-content');

    content.classList.remove('scale-100', 'opacity-100');
    content.classList.add('scale-95', 'opacity-0');

    setTimeout(() => {
        modal.classList.add('hidden');
    }, 300); // Match transition duration
}

document.addEventListener('click', function (e) {
    // Tutup semua dropdown jika klik di luar elemen dropdown atau tombol trigger-nya
    const allDropdowns = document.querySelectorAll('[id^="dropdown-"], #user-dropdown');

    allDropdowns.forEach(dropdown => {
        const trigger = document.querySelector(`[onclick*="${dropdown.id}"]`);
        if (!dropdown.contains(e.target) && !trigger.contains(e.target)) {
            dropdown.classList.add('hidden');
            dropdown.classList.remove('block');
        }
    });
});