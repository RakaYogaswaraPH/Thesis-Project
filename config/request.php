<?php
//* Auth Handler *\\
// Login Handler
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["login"])) {
    $email = mysqli_real_escape_string($connect, $_POST["email"]);
    $password = $_POST["password"];

    $query = mysqli_query($connect, "SELECT * FROM users WHERE email='$email'");

    if (mysqli_num_rows($query) === 1) {
        $user = mysqli_fetch_assoc($query);

        if (password_verify($password, $user['password'])) {
            $user_id = $user['id'];
            $role = $user['role'];

            if ($role === 'pengguna') {
                $detail = mysqli_query($connect, "SELECT * FROM pengguna_detail WHERE user_id = '$user_id'");
                $data = mysqli_fetch_assoc($detail);

                $_SESSION['pengguna'] = [
                    'id' => $user_id,
                    'email' => $user['email'],
                    'nama_anak' => $data['nama_anak'],
                    'role' => $role
                ];

                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil Login',
                        text: 'Selamat datang, {$data['nama_anak']}!',
                        timer: 1800,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = 'pages/pengguna/beranda.php';
                    });
                </script>";
                exit;
            }

            if ($role === 'guru') {
                $detail = mysqli_query($connect, "SELECT * FROM guru_detail WHERE user_id = '$user_id'");
                $data = mysqli_fetch_assoc($detail);

                $_SESSION['guru'] = [
                    'id' => $user_id,
                    'email' => $user['email'],
                    'nama_guru' => $data['nama_guru'],
                    'jabatan' => $data['jabatan'],
                    'role' => $role
                ];

                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Login Guru Berhasil',
                        text: 'Halo, {$data['nama_guru']}!',
                        timer: 1800,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = 'pages/guru/dashboard.php';
                    });
                </script>";
                exit;
            }

            if ($role === 'admin') {
                $detail = mysqli_query($connect, "SELECT * FROM admin_detail WHERE user_id = '$user_id'");
                $data = mysqli_fetch_assoc($detail);

                $_SESSION['admin'] = [
                    'id' => $user_id,
                    'email' => $user['email'],
                    'nama_admin' => $data['nama_admin'],
                    'role' => $role
                ];

                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Login Admin Berhasil',
                        text: 'Selamat datang, {$data['nama_admin']}!',
                        timer: 1800,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = 'pages/admin/dashboard.php';
                    });
                </script>";
                exit;
            }
        } else {
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Password Salah!',
                    text: 'Coba periksa kembali.',
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    history.back();
                });
            </script>";
            exit;
        }
    } else {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Email tidak ditemukan',
                text: 'Silakan periksa kembali.',
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                history.back();
            });
        </script>";
        exit;
    }
}

// Register Handler
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["register"])) {
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    $re_password = mysqli_real_escape_string($connect, $_POST['re_password']);
    $nama_anak = mysqli_real_escape_string($connect, $_POST['nama_anak']);
    $kelas = $_POST['kelas'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $nama_orangtua = mysqli_real_escape_string($connect, $_POST['nama_orangtua']);
    $telepon = mysqli_real_escape_string($connect, $_POST['nomor_telepon']);

    if ($password !== $re_password) {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Oops!',
            text: 'Password tidak cocok!'
        }).then(() => {
            history.back();
        });
        </script>";
        exit;
    }

    $cek = mysqli_query($connect, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>
        Swal.fire({
            icon: 'warning',
            title: 'Email sudah digunakan!',
            text: 'Silakan gunakan email lain.'
        }).then(() => {
            history.back();
        });
        </script>";
        exit;
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($connect, "INSERT INTO users (email, password, role) VALUES ('$email', '$hash', 'pengguna')");
    $user_id = mysqli_insert_id($connect);

    mysqli_query($connect, "INSERT INTO pengguna_detail (user_id, nama_anak, kelas, jenis_kelamin, nama_orangtua, nomor_telepon)
        VALUES ('$user_id', '$nama_anak', '$kelas', '$jenis_kelamin', '$nama_orangtua', '$telepon')");

    $_SESSION['pengguna'] = [
        'id' => $user_id,
        'nama_anak' => $nama_anak,
        'email' => $email,
        'role' => 'pengguna'
    ];

    echo "<script>
    Swal.fire({
        icon: 'success',
        title: 'Pendaftaran Berhasil!',
        text: 'Selamat datang $nama_anak!'
    }).then(() => {
        window.location.href = 'pages/pengguna/beranda.php';
    });
    </script>";
    exit;
}

// CRUD Handler
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['aksi'])) {
    $aksi = $_POST['aksi'];

    switch ($aksi) {
        case 'tambah_guru':
            $result = tambahGuru($connect, $_POST);
            if ($result === true) {
                echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Guru berhasil ditambahkan'
                }).then(() => {
                    window.location.href = 'daftar_pengguna.php';
                });
                </script>";
            } else {
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: " . json_encode($result) . "
                }).then(() => {
                    history.back();
                });
                </script>";
            }
            break;

        case 'edit_guru':
            if (editGuru($connect, $_POST)) {
                echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Data guru berhasil diubah'
                }).then(() => {
                    window.location.href = 'daftar_pengguna.php';
                });
                </script>";
            } else {
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Gagal mengubah data guru'
                }).then(() => {
                    history.back();
                });
                </script>";
            }
            break;

        case 'hapus_guru':
            hapusGuru($connect, $_POST['user_id']);
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Dihapus!',
                text: 'Data guru berhasil dihapus'
            }).then(() => {
                window.location.href = 'daftar_pengguna.php';
            });
            </script>";
            break;

        case 'tambah_siswa':
            $result = tambahSiswa($connect, $_POST);
            if ($result === true) {
                echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Siswa berhasil ditambahkan'
                }).then(() => {
                    window.location.href = 'daftar_pengguna.php';
                });
                </script>";
            } else {
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: " . json_encode($result) . "
                }).then(() => {
                    history.back();
                });
                </script>";
            }
            break;

        case 'hapus_siswa':
            hapusSiswa($connect, $_POST['user_id']);
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Dihapus!',
                text: 'Data siswa berhasil dihapus'
            }).then(() => {
                window.location.href = 'daftar_pengguna.php';
            });
            </script>";
            break;

        case 'edit_siswa':
            $result = editSiswa($connect, $_POST);
            if ($result === true) {
                echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Data siswa berhasil diubah'
                }).then(() => {
                    window.location.href = 'daftar_pengguna.php';
                });
                </script>";
            } else {
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: " . json_encode($result) . "
                }).then(() => {
                    history.back();
                });
                </script>";
            }
            break;
    }
    exit;
}
