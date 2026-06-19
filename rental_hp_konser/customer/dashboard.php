<?php
session_start();

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'customer'){
    header("Location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
<nav class="navbar navbar-custom">
    <div class="container">
        <a class="navbar-brand text-white fw-bold" href="../index.php">K-RENTAL</a>
    <div>
        <a href="../index.php" class="btn btn-light btn-sm me-2">Home</a>
        <a href="../logout.php" class="btn btn-danger btn-sm">Logout</a>
    </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="card card-custom p-4">
        <h2 class="title">Halo, <?= $_SESSION['nama']; ?> </h2>
        <p>Selamat datang di Dashboard Customer</p>
        <hr>
        <a href="../penyewaan/tambah.php" class="btn btn-custom mb-3 w-100">Sewa HP</a>
        <a href="../penyewaan/index.php" class="btn btn-success mb-3 w-100">Riwayat Penyewaan</a>
        <a href="../logout.php" class="btn btn-danger w-100">Logout</a>
    </div>
</div>
</body>
</html>