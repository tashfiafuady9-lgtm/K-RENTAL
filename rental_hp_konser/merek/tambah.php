<?php
session_start();
include '../koneksi.php';

if(isset($_POST['simpan'])){

    $nama_merek = $_POST['nama_merek'];

    mysqli_query($conn,
    "INSERT INTO merek(nama_merek)
    VALUES('$nama_merek')");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Merek</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Tambah Merek</h1>

    <form method="POST">
        <div class="mb-3">
            <label>Nama Merek</label>
            <input type="text" name="nama_merek" class="form-control"required>
        </div>

        <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>