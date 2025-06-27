<?php
$connect = mysqli_connect("localhost", "root", "", "db_ppmh");
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

//* Users Config *\\
// Login Handler
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["login"])) {
    $email = mysqli_real_escape_string($connect, $_POST["email"]);
    $password = $_POST["password"];

    $query = mysqli_query($connect, "SELECT * FROM pengguna WHERE email='$email'");

    if (mysqli_num_rows($query) === 1) {
        $user = mysqli_fetch_assoc($query);

        if (password_verify($password, $user['password'])) {
            $_SESSION['pengguna'] = [
                'id' => $user['id'],
                'nama' => $user['nama_pengguna'],
                'email' => $user['email'],
                'role' => $user['role']
            ];

            echo "<script>
                alert('Login berhasil! Selamat datang, " . htmlspecialchars($user['nama_pengguna']) . "');
                window.location.href = './pages/pengguna/home.php';
            </script>";
            exit;
        } else {
            echo "<script>alert('Password salah!'); window.history.back();</script>";
            exit;
        }
    } else {
        echo "<script>alert('Email tidak ditemukan!'); window.history.back();</script>";
        exit;
    }
}

// Register Handler
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["register"])) {
    $nama = mysqli_real_escape_string($connect, $_POST['nama_pengguna']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $telepon = mysqli_real_escape_string($connect, $_POST['nomor_telepon']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    $re_password = mysqli_real_escape_string($connect, $_POST['re_password']);

    if ($password !== $re_password) {
        echo "<script>
            alert('Password dan konfirmasi tidak cocok!');
            window.history.back();
        </script>";
        exit;
    }

    $cek = mysqli_query($connect, "SELECT * FROM pengguna WHERE email='$email'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>
            alert('Email sudah terdaftar!');
            window.history.back();
        </script>";
        exit;
    }

    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO pengguna (nama_pengguna, email, nomor_telepon, password, role) VALUES ('$nama', '$email', '$telepon', '$password_hash', 'pengguna')";
    $result = mysqli_query($connect, $query);

    if ($result) {
        // Ambil data pengguna yang baru dibuat
        $user_id = mysqli_insert_id($connect); // ambil ID terakhir yang dibuat
        $user = [
            'id' => $user_id,
            'nama' => $nama,
            'email' => $email,
            'telepon' => $telepon,
            'role' => 'pengguna'
        ];

        // Simpan ke session
        $_SESSION['pengguna'] = $user;

        echo "<script>
            alert('Pendaftaran berhasil!');
            window.location.href = './pages/pengguna/home.php';
        </script>";
        exit;
    } else {
        $error = addslashes(mysqli_error($connect));
        echo "<script>
            alert('Gagal menambahkan data: $error');
            window.history.back();
        </script>";
        exit;
    }
}
