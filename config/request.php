<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['aksi'])) {
    $aksi = $_POST['aksi'];

    switch ($aksi) {
        case 'tambah_guru':
            $result = tambahGuru($connect, $_POST);
            if ($result === true) {
                echo "<script>alert('Guru berhasil ditambahkan'); window.location.href='daftar_pengguna.php';</script>";
            } else {
                echo "<script>alert('$result'); history.back();</script>";
            }
            break;

        case 'edit_guru':
            if (editGuru($connect, $_POST)) {
                echo "<script>alert('Data berhasil diubah'); window.location.href='daftar_pengguna.php';</script>";
            } else {
                echo "<script>alert('Gagal mengubah data'); history.back();</script>";
            }
            break;

        case 'hapus_guru':
            hapusGuru($connect, $_POST['user_id']);
            echo "<script>alert('Data berhasil dihapus'); window.location.href='daftar_pengguna.php';</script>";
            break;

        case 'tambah_siswa':
            $result = tambahSiswa($connect, $_POST);
            if ($result === true) {
                echo "<script>alert('Siswa berhasil ditambahkan'); window.location.href='daftar_pengguna.php';</script>";
            } else {
                echo "<script>alert('$result'); history.back();</script>";
            }
            break;

        case 'hapus_siswa':
            hapusSiswa($connect, $_POST['user_id']);
            echo "<script>alert('Data siswa dihapus'); window.location.href='daftar_pengguna.php';</script>";
            break;

        case 'edit_siswa':
            $result = editSiswa($connect, $_POST);
            if ($result === true) {
                echo "<script>alert('Data siswa berhasil diubah'); window.location.href='daftar_pengguna.php';</script>";
            } else {
                echo "<script>alert('Gagal mengubah data: $result'); history.back();</script>";
            }
            break;
    }
    exit;
}
