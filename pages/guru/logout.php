<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Logout</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="../../src/js/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../../src/styles/style.css">
</head>

<body class="font-[poppins]">
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil Logout',
            text: 'Anda telah keluar dari akun.',
            showConfirmButton: false,
            timer: 2000
        }).then(() => {
            window.location.href = '../../login.php';
        });
    </script>
</body>

</html>s