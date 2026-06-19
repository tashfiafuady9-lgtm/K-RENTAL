<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "rental_hp_konser"
);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>