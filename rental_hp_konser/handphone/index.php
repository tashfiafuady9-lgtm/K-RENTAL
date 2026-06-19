<?php
session_start();
include '../koneksi.php';

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../login.php");
    exit;
}

$data = mysqli_query($conn,
"SELECT handphone.*, merek.nama_merek
FROM handphone
JOIN merek
ON handphone.id_merek = merek.id_merek");
?>

<!DOCTYPE html>
<html>
<head>
<title>Data Handphone</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../css/style.css">
</head>

<body>
<nav class="navbar navbar-custom">
    <div class="container">
        <span class="navbar-brand text-white fw-bold"> Rental HP Konser</span>
    </div>
</nav>

<div class="container mt-5">
    <div class="card card-custom p-4">
    <h2 class="title mb-4"> Data Handphone </h2>
    <a href="tambah.php" class="btn btn-custom mb-3">+ Tambah Handphone</a>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
        <thead>
            <tr>
                <th>No</th>
                <th>Merek</th>
                <th>Nama HP</th>
                <th>Harga Sewa</th>
                <th>Status</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>

            <tbody>
                <?php
                $no = 1;

                while($row = mysqli_fetch_assoc($data)){
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['nama_merek']; ?></td>
                    <td><?= $row['nama_hp']; ?></td>
                    <td> Rp <?= number_format($row['harga_sewa'],0,',','.'); ?></td>
                    <td>
                        <?php
                        if($row['status']=="Tersedia"){
                            echo "<span class='badge bg-success'>Tersedia</span>";
                        }
                        elseif($row['status']=="Disewa"){
                            echo "<span class='badge bg-warning text-dark'>Disewa</span>";
                        }
                        else{
                            echo "<span class='badge bg-danger'>Maintenance</span>";
                        }
                        ?>
                    </td>
                    <td>
                        <img src="../uploads/hp/<?= $row['foto_hp']; ?>" width="100" class="rounded">
                    </td>
                    <td>
                        <a href="edit.php?id=<?= $row['id_hp']; ?>" class="btn btn-warning btn-sm">Edit</a>

                        <a href="hapus.php?id=<?= $row['id_hp']; ?>" class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <a href="../admin/dashboard.php" class="btn btn-secondary mt-3"> ← Kembali ke Dashboard</a>
    </div>
</div>
</body>
</html>