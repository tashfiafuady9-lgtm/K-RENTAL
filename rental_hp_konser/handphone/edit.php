<?php
session_start();
include '../koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn,
"SELECT * FROM handphone WHERE id_hp='$id'");

$row = mysqli_fetch_assoc($data);

$merek = mysqli_query($conn,
"SELECT * FROM merek");

if(isset($_POST['update'])){

    $id_merek = $_POST['id_merek'];
    $nama_hp = $_POST['nama_hp'];
    $harga_sewa = $_POST['harga_sewa'];
    $status = $_POST['status'];

    // cek apakah upload foto baru
    if($_FILES['foto_hp']['name'] != ""){
        // hapus foto lama
        unlink("../uploads/hp/".$row['foto_hp']);

        $foto_hp = $_FILES['foto_hp']['name'];
        $tmp = $_FILES['foto_hp']['tmp_name'];

        move_uploaded_file($tmp,
        "../uploads/hp/".$foto_hp);

    }else{

        $foto_hp = $row['foto_hp'];

    }

    mysqli_query($conn,
    "UPDATE handphone
    SET
    id_merek='$id_merek',
    nama_hp='$nama_hp',
    harga_sewa='$harga_sewa',
    status='$status',
    foto_hp='$foto_hp'
    WHERE id_hp='$id'
    ");

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Handphone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1>Edit Handphone</h1>
        </div>

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">

        <div class="mb-3">
            <label>Merek</label>
            <select name="id_merek" class="form-control">
            <?php while($m = mysqli_fetch_assoc($merek)){ ?>
                <option
                value="<?= $m['id_merek']; ?>"

                <?= ($row['id_merek']==$m['id_merek']) ?
                'selected' : ''; ?>>

                <?= $m['nama_merek']; ?>
                </option>
            <?php } ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Nama HP</label>
            <input type="text" name="nama_hp" value="<?= $row['nama_hp']; ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label>Harga Sewa</label>
            <input type="number" name="harga_sewa" value="<?= $row['harga_sewa']; ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option
                value="Tersedia"
                <?= ($row['status']=="Tersedia") ? 'selected' : ''; ?>>Tersedia
                </option>

                <option
                value="Disewa"
                <?= ($row['status']=="Disewa") ? 'selected' : ''; ?>>Disewa
                </option>

                <option
                value="Maintenance"
                <?= ($row['status']=="Maintenance") ? 'selected' : ''; ?>>Maintenance
                </option>
            </select>
        </div>

        <div class="mb-3">
            <label>Foto Lama</label><br>
            <img src="../uploads/hp/<?= $row['foto_hp']; ?>" width="150">
        </div>

        <div class="mb-3">
            <label>Foto Baru (opsional)</label>
            <input type="file" name="foto_hp" class="form-control">
        </div>

        <button type="submit" name="update" class="btn btn-warning"> Update</button>
        <a href="index.php" class="btn btn-secondary"> Kembali</a>
        </form>
        </div>
    </div>
</div>
</body>
</html>