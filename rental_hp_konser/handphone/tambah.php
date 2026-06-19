<?php
session_start();
include '../koneksi.php';

$merek = mysqli_query($conn, "SELECT * FROM merek");

if(isset($_POST['simpan'])){

    $id_merek = $_POST['id_merek'];
    $nama_hp = $_POST['nama_hp'];
    $harga_sewa = $_POST['harga_sewa'];
    $status = $_POST['status'];

    // mengambil nama file
    $foto_hp = $_FILES['foto_hp']['name'];

    // lokasi sementara file
    $tmp = $_FILES['foto_hp']['tmp_name'];

    // pindahkan file ke folder uploads/hp
    move_uploaded_file($tmp, "../uploads/hp/".$foto_hp);

    mysqli_query($conn,
    "INSERT INTO handphone
    VALUES(
    NULL,
    '$id_merek',
    '$nama_hp',
    '$harga_sewa',
    '$status',
    '$foto_hp'
    )");

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Handphone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1>Tambah Handphone</h1>
        </div>

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label>Merek</label>
                    <select name="id_merek" class="form-control" required>
                        <option value="">--Pilih Merek--</option>

                        <?php while($row = mysqli_fetch_assoc($merek)){ ?>

                        <option value="<?= $row['id_merek']; ?>">
                        <?= $row['nama_merek']; ?>
                        </option>

                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Nama Handphone</label>
                    <input type="text" name="nama_hp" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Harga Sewa</label>
                    <input type="number" name="harga_sewa" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="Tersedia">Tersedia</option>
                        <option value="Disewa">Disewa</option>
                        <option value="Maintenance">Maintenance</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Foto HP</label>
                    <input type="file" name="foto_hp" class="form-control" required>
                </div>

                <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
                <a href="index.php" class="btn btn-secondary"> Kembali</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>