<?php
session_start();
if (!isset($_SESSION['pengguna'])) {
    header("Location: ../../login.php");
    exit;
}

$pengguna = $_SESSION['pengguna'];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Beranda Pengguna</title>
</head>

<body>
    <h1>Selamat datang, <?= htmlspecialchars($pengguna['nama']) ?>!</h1>
    <p>Email: <?= htmlspecialchars($pengguna['email']) ?></p>
    <p>Role: <?= htmlspecialchars($pengguna['role']) ?></p>

    <a href="logout.php" style="color: red; font-weight: bold;">Logout</a>
</body>

</html>