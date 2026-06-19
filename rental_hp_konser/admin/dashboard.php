<?php
session_start();

include '../koneksi.php';

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../login.php");
    exit;
}

$total_hp = mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM handphone")
);

$hp_tersedia = mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM handphone WHERE status='Tersedia'")
);

$total_customer = mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM users WHERE role='customer'")
);

$total_penyewaan = mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM penyewaan")
);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
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
        <h2 class="title">Halo, <?= $_SESSION['nama']; ?></h2>
        <p>Selamat datang di Dashboard Admin</p>

        <div class="row mt-4">
            <div class="col-md-3 mb-3">
                <div class="card card-custom p-3 text-center">
                    <h5>Total HP</h5>
                    <h2>
                        <?= $total_hp; ?>
                    </h2>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card card-custom p-3 text-center">
                    <h5>HP Tersedia</h5>
                    <h2>
                        <?= $hp_tersedia; ?>
                    </h2>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card card-custom p-3 text-center">
                    <h5>Customer</h5>
                    <h2>
                        <?= $total_customer; ?>
                    </h2>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card card-custom p-3 text-center">
                    <h5>Penyewaan</h5>
                    <h2>
                        <?= $total_penyewaan; ?>
                    </h2>
                </div>
            </div>
        </div>
        <hr>
        
        <!-- Menu Admin -->
        <div class="row">
            <div class="col-md-3 mb-3">
                <a href="../merek/index.php" class="btn btn-custom w-100">Kelola Merek</a>
            </div>

            <div class="col-md-3 mb-3">
                <a href="../handphone/index.php" class="btn btn-custom w-100">Kelola HP</a>
            </div>

            <div class="col-md-3 mb-3">
                <a href="../admin_penyewaan/index.php" class="btn btn-custom w-100">Data Penyewaan</a>
            </div>

            <div class="col-md-3 mb-3">
                <a href="../pembayaran/index.php" class="btn btn-custom w-100">Pembayaran</a>
            </div>
        </div>

        <a href="../logout.php" class="btn btn-danger">Logout</a>
    </div>
</div>
</body>
</html>