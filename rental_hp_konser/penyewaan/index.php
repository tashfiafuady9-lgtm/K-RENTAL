<?php
session_start();
include '../koneksi.php';

$id_user = $_SESSION['id_user'];

$data = mysqli_query($conn,
"SELECT penyewaan.*, handphone.nama_hp
FROM penyewaan

JOIN detail_penyewaan
ON penyewaan.id_penyewaan =
detail_penyewaan.id_penyewaan

JOIN handphone
ON detail_penyewaan.id_hp =
handphone.id_hp
WHERE penyewaan.id_user='$id_user'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Penyewaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5">
    <h1>Riwayat Penyewaan</h1>
    <table class="table table-bordered">

    <tr>
    <th>No</th>
    <th>Handphone</th>
    <th>Tanggal Sewa</th>
    <th>Tanggal Kembali</th>
    <th>Status</th>
    <th>Aksi</th>
    </tr>

    <?php
    $no = 1;
    while($row = mysqli_fetch_assoc($data)){
    ?>

    <tr>
    <td><?= $no++; ?></td>
    <td><?= $row['nama_hp']; ?></td>
    <td><?= $row['tanggal_sewa']; ?></td>
    <td><?= $row['tanggal_kembali']; ?></td>
    <td><?= $row['status_sewa']; ?></td>
    <td>

    <a href="../pembayaran/tambah.php?id=<?= $row['id_penyewaan']; ?>" class="btn btn-primary"> Bayar</a>
    </td>
    </tr>

    <?php } ?>
    </table><br>

    <a href="../customer/dashboard.php" class="btn btn-secondary"> ← Kembali ke Dashboard</a>
</div>
</body>
</html>