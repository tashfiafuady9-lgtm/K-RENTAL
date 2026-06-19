<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit;
}

$data = mysqli_query($conn, "SELECT * FROM merek");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Merek</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
<nav class="navbar navbar-custom">
    <div class="container">
    <span class="navbar-brand text-white fw-bold"> Rental HP Konser</span>
    </div>
</nav>

    <div class="card card-custom p-4">
        <h2 class="title">Data Merek HP</h2>
        <a href="tambah.php" class="btn btn-custom mb-3">Tambah Merek</a>

        <table class="table table-bordered table-hover">
            <tr>
                <th>No</th>
                <th>Nama Merek</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no = 1;

            while ($row = mysqli_fetch_assoc($data)) {
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['nama_merek']; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id_merek']; ?>" class="btn btn-warning">Edit </a>
                        <a href="hapus.php?id=<?= $row['id_merek']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus </a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <a href="../admin/dashboard.php" class="btn btn-secondary mt-3">← Kembali ke Dashboard</a>
    </div>
</body>
</html>