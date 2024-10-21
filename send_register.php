<?php
require 'koneksi.php';

$nama = $_POST["nama"];
$email = $_POST["email"];
$institusi = $_POST["institusi"];
$alamat = $_POST["alamat"];
$asal_negara = $_POST["asal_negara"];

$query_sql = "INSERT INTO register(nama, email, institusi, alamat, asal_negara) VALUES ('$nama', '$email', '$institusi', '$alamat', '$asal_negara')";

if (mysqli_query($conn, $query_sql)) {
    header("Location: hasil.php");
} else {
    echo "Pendaftaran Gagal : " . mysqli_error($conn);
}
