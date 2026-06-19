<?php
session_start();
include '../koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn,
"SELECT *
FROM detail_penyewaan
WHERE id_penyewaan='$id'");

$row = mysqli_fetch_assoc($data);

$id_hp = $row['id_hp'];

mysqli_query($conn,
"UPDATE penyewaan
SET status_sewa='Selesai'
WHERE id_penyewaan='$id'");

mysqli_query($conn,
"UPDATE handphone
SET status='Tersedia'
WHERE id_hp='$id_hp'");

header("Location: index.php");
exit;
?>