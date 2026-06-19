<?php
session_start();
include '../koneksi.php';

$data = mysqli_query($conn,
"SELECT pembayaran.*,
users.nama,
handphone.nama_hp

FROM pembayaran

JOIN penyewaan
ON pembayaran.id_penyewaan = penyewaan.id_penyewaan

JOIN users
ON penyewaan.id_user = users.id_user

JOIN detail_penyewaan
ON penyewaan.id_penyewaan = detail_penyewaan.id_penyewaan

JOIN handphone
ON detail_penyewaan.id_hp = handphone.id_hp");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5">

    <h1>Data Pembayaran</h1>
    <table class="table table-bordered">
    <tr>
    <th>No</th>
    <th>Customer</th>
    <th>Handphone</th>
    <th>Metode</th>
    <th>Bukti</th>
    <th>Status</th>
    <th>Aksi</th>
    </tr>

    <?php
    $no=1;
    while($row=mysqli_fetch_assoc($data)){
    ?>

    <tr>
    <td><?= $no++; ?></td>
    <td><?= $row['nama']; ?></td>
    <td><?= $row['nama_hp']; ?></td>
    <td><?= $row['metode_pembayaran']; ?></td>
    
    <td>
    <img src="../uploads/pembayaran/<?= $row['bukti_pembayaran']; ?>" width="150">
    </td>

    <td> <?= $row['status_pembayaran']; ?> </td>

    <td>
        <a href="verifikasi.php?id=<?= $row['id_pembayaran']; ?>&aksi=terima" class="btn btn-success">Terima</a>
        <a href="verifikasi.php?id=<?= $row['id_pembayaran']; ?>&aksi=tolak" class="btn btn-danger">Tolak</a>
    </td>
    </tr>
    <?php } ?>
    </table>

    <a href="../admin/dashboard.php" class="btn btn-secondary mt-3"> ← Kembali ke Dashboard</a>
</div>
</body>
</html>