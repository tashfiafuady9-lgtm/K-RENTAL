<?php
session_start();
include '../koneksi.php';

$id = $_GET['id'];
$aksi = $_GET['aksi'];

$data = mysqli_query($conn,
"SELECT * FROM pembayaran
WHERE id_pembayaran='$id'");

$row = mysqli_fetch_assoc($data);

if($aksi == "terima"){

    mysqli_query($conn,
    "UPDATE pembayaran
    SET status_pembayaran='Berhasil'
    WHERE id_pembayaran='$id'");

    mysqli_query($conn,
    "UPDATE penyewaan
    SET status_sewa='Diproses'
    WHERE id_penyewaan='".$row['id_penyewaan']."'");

}

if($aksi == "tolak"){

    mysqli_query($conn,
    "UPDATE pembayaran
    SET status_pembayaran='Ditolak'
    WHERE id_pembayaran='$id'");

    mysqli_query($conn,
    "UPDATE penyewaan
    SET status_sewa='Ditolak'
    WHERE id_penyewaan='".$row['id_penyewaan']."'");

}

header("Location: index.php");
exit;
?>