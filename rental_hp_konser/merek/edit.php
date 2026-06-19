<?php
session_start();
include '../koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM merek WHERE id_merek='$id'");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {

    $nama_merek = $_POST['nama_merek'];

    mysqli_query(
        $conn,
        "UPDATE merek
        SET nama_merek='$nama_merek'
        WHERE id_merek='$id'"
    );

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Merek</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Merek</h1>
        <form method="POST">

            <div class="mb-3">
                <label>Nama Merek</label>
                <input type="text" name="nama_merek" class="form-control" value="<?= $row['nama_merek']; ?>" required>
            </div>

            <button type="submit" name="update" class="btn btn-warning">Update</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>