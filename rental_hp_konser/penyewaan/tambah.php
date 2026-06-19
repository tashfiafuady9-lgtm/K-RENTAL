<?php
session_start();
include '../koneksi.php';

$hp = mysqli_query($conn,
"SELECT * FROM handphone
WHERE status='Tersedia'");

if(isset($_POST['simpan'])){

    $id_user = $_SESSION['id_user'];
    $tanggal_sewa = $_POST['tanggal_sewa'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $id_hp = $_POST['id_hp'];

    mysqli_query($conn,
    "INSERT INTO penyewaan(
    id_user,
    tanggal_sewa,
    tanggal_kembali
    )
    VALUES(
    '$id_user',
    '$tanggal_sewa',
    '$tanggal_kembali'
    )");

    $id_penyewaan = mysqli_insert_id($conn);

    mysqli_query($conn,
    "INSERT INTO detail_penyewaan(
    id_penyewaan,
    id_hp
    )
    VALUES(
    '$id_penyewaan',
    '$id_hp'
    )");

    mysqli_query($conn,
    "UPDATE handphone
    SET status='Disewa'
    WHERE id_hp='$id_hp'");

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Sewa HP</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5">
    <div class="card">
    <div class="card-header">
        <h1>Sewa Handphone</h1>
    </div>

    <div class="card-body">
        <form method="POST">

    <div class="mb-3">
        <label>Tanggal Sewa</label>
        <input type="date" name="tanggal_sewa" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Tanggal Kembali</label>
        <input type="date" name="tanggal_kembali" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Pilih HP</label>
        <select name="id_hp" class="form-control" required>
        <option value=""> -- Pilih Handphone --</option>
        <?php while($row=mysqli_fetch_assoc($hp)){ ?>
        <option value="<?= $row['id_hp']; ?>">
        <?= $row['nama_hp']; ?></option>

        <?php } ?>
        </select>
    </div>

        <button type="submit" name="simpan" class="btn btn-success">Sewa</button>
        </form><br>

        <a href="../customer/dashboard.php" class="btn btn-secondary"> ← Kembali ke Dashboard</a>
    </div>
    </div>
</div>
</body>
</html>