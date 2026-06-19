<?php
session_start();
include '../koneksi.php';

$id_penyewaan = $_GET['id'];

if(isset($_POST['simpan'])){

    $metode_pembayaran = $_POST['metode_pembayaran'];

    $bukti = $_FILES['bukti']['name'];
    $tmp = $_FILES['bukti']['tmp_name'];

    move_uploaded_file(
        $tmp,
        "../uploads/pembayaran/".$bukti
    );

    mysqli_query($conn,
    "INSERT INTO pembayaran(
    id_penyewaan,
    metode_pembayaran,
    bukti_pembayaran
    )
    VALUES(
    '$id_penyewaan',
    '$metode_pembayaran',
    '$bukti'
    )");

    header("Location: ../penyewaan/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Pembayaran</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card">
    <div class="card-header">
        <h1>Upload Bukti Pembayaran</h1>
    </div>

    <div class="card-body">
        <form method="POST" enctype="multipart/form-data">

    <div class="mb-3">
        <label>Metode Pembayaran</label>
        <select name="metode_pembayaran" class="form-control">
        <option>DANA</option>
        <option>OVO</option>
        <option>GoPay</option>
        <option>Transfer Bank</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Bukti Pembayaran</label>
        <input type="file" name="bukti" class="form-control" required>
    </div>

        <button type="submit" name="simpan" class="btn btn-success">Upload</button>
        </form>
    </div>
    </div>
</div>
</body>
</html>