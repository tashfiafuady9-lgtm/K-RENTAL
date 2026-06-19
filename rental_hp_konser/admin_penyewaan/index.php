<?php
session_start();
include '../koneksi.php';

$data = mysqli_query($conn,
"SELECT penyewaan.*,
users.nama,
handphone.nama_hp

FROM penyewaan

JOIN users
ON penyewaan.id_user=users.id_user

JOIN detail_penyewaan
ON penyewaan.id_penyewaan=
detail_penyewaan.id_penyewaan

JOIN handphone
ON detail_penyewaan.id_hp=
handphone.id_hp");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Penyewaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5">
    <h1>Data Penyewaan</h1>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Customer</th>
            <th>Handphone</th>
            <th>Tanggal Sewa</th>
            <th>Tanggal Kembali</th>
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
            <td><?= $row['tanggal_sewa']; ?></td>
            <td><?= $row['tanggal_kembali']; ?></td>
            <td><?= $row['status_sewa']; ?></td>
            <td><?php if($row['status_sewa']=="Diproses"){ ?>
                <a href="selesai.php?id=<?= $row['id_penyewaan']; ?>" class="btn btn-success"> Selesai</a>
            <?php } ?>
            </td>
        </tr>
        <?php } ?>
    </table>
    <a href="../admin/dashboard.php" class="btn btn-secondary mt-3"> ← Kembali ke Dashboard</a>
</div>
</body>
</html>