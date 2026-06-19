<?php

session_start();
include '../koneksi.php';

$id = $_GET['id'];

mysqli_query($conn,
"DELETE FROM merek
WHERE id_merek='$id'");

header("Location: index.php");

?>