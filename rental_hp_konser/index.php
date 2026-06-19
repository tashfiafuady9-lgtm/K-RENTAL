<?php
session_start();

include 'koneksi.php';

$handphone = mysqli_query($conn,
"SELECT handphone.*, merek.nama_merek
FROM handphone
JOIN merek
ON handphone.id_merek = merek.id_merek");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental HP Konser</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center text-white fw-bold"
            href="index.php">
            <img src="K-RENTAL.png" alt="K-Rental" class="logo me-2"> K-RENTAL
            </a>

        <div class="ms-auto">
            <?php if(isset($_SESSION['id_user'])){ ?>
            <span class="text-white fw-bold me-3">
            Halo, <?= $_SESSION['nama']; ?> 
            </span>

            <?php if($_SESSION['role'] == 'admin'){ ?>
            <a href="admin/dashboard.php" class="btn btn-light me-2"> Dashboard</a>

            <?php } else { ?>
            <a href="customer/dashboard.php" class="btn btn-light me-2">Dashboard</a>

            <?php } ?>
            <a href="logout.php"class="btn btn-danger">Logout</a>

            <?php } else { ?>
            <a href="login.php" class="btn btn-light me-2">Login</a>
            <a href="register.php" class="btn btn-light">Register</a>

            <?php } ?>
        </div>
        </div>
    </nav>

<!-- Hero Section -->
    <section class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="hero-title"> Capture Every Moment, Keep Every Memory</h1>
                <p class="hero-text">Abadikan konser favoritmu dengan iPhone dan Android flagship berkualitas tinggi.</p>
                <a href="login.php" class="btn btn-custom btn-lg">Sewa Sekarang</a>
            </div>

            <div class="col-lg-6 text-center">
                <img src="K-RENTAL.png" alt="K-Rental" class="hero-image">
            </div>
        </div>
    </section>

<!-- Fitur -->
    <section class="container mb-5">
        <h2 class="text-center mb-5 fw-bold"> Tentang K-RENTAL</h2>

        <div class="row g-4">
            <div class="col-md-4">
            <div class="card card-custom h-100 p-4 text-center">
                <h5>Kamera Premium</h5>
                <p>Nikmati kualitas foto dan video terbaik untuk mengabadikan konser favoritmu.</p>
            </div>
            </div>

            <div class="col-md-4">
            <div class="card card-custom h-100 p-4 text-center">
                <h5>Booking Cepat</h5>
                <p> Proses penyewaan mudah dan cepat langsung dari website.</p>
            </div>
            </div>

            <div class="col-md-4">
            <div class="card card-custom h-100 p-4 text-center">
                <h5>Pembayaran Mudah</h5>
                <p>Mendukung DANA, OVO, GoPay dan Transfer Bank.</p>
            </div>
            </div>
        </div>
    </section>

    <section id="daftarhp" class="container mb-5">
        <h2 class="text-center fw-bold mb-5">Daftar Handphone Tersedia</h2>
        <div class="row">
            <?php while($hp = mysqli_fetch_assoc($handphone)){ ?>

            <div class="col-md-4 mb-4">
            <div class="card hp-card h-100">
                <img src="uploads/hp/<?= $hp['foto_hp']; ?>" class="hp-image">

            <div class="card-body">
                <h5 class="fw-bold"> <?= $hp['nama_hp']; ?></h5>
                <p class="text-muted"><?= $hp['nama_merek']; ?></p>
                <p>💰 Harga Sewa: <br><b> Rp <?= number_format($hp['harga_sewa'],0,',','.'); ?></b></p>

                <?php
                if($hp['status']=="Tersedia"){
                ?>
                <span class="badge bg-success">Tersedia</span>

                <?php
                }else if($hp['status']=="Disewa"){
                ?>
                <span class="badge bg-warning text-dark">Disewa</span>

                <?php
                }else{
                ?>
                <span class="badge bg-danger">Maintenance</span>

                <?php } ?>
            </div>
            </div>
            </div>

            <?php } ?>
        </div>
    </section>

<!-- Footer -->
    <footer class="footer-custom">
        <div class="container">
        <div class="row">
        <div class="col-md-4 mb-4">
            <h4>K-RENTAL</h4>
            <p> K-Rental adalah layanan penyewaan handphone iPhone dan Android untuk konser. Capture Every Moment, Keep Every Memory.</p>
        </div>

        <div class="col-md-4 mb-4">
            <h4>Navigasi</h4>
            <ul class="footer-links">
            <li><a href="index.php">Beranda</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
            <li><a href="#daftarhp">Daftar Handphone</a></li>
            </ul>
        </div>

        <div class="col-md-4 mb-4">
            <h4>Kontak</h4>
            <p>📧 tashfiafuady9@gmail.com</p>
            <p>📱 0877-7444-1215</p>
            <p>📍 Jakarta, Indonesia</p>
        </div>
        </div><hr>

        <div class="text-center"> © 2026 K-RENTAL</div>
        </div>
    </footer>
</body>
</html>