<?php

session_start();
include '../koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn,
"SELECT * FROM handphone
WHERE id_hp='$id'");

$row = mysqli_fetch_assoc($data);

// hapus file gambar
unlink("../uploads/hp/".$row['foto_hp']);

// hapus data database
mysqli_query($conn,
"DELETE FROM handphone
WHERE id_hp='$id'");

header("Location: index.php");
exit;

?>