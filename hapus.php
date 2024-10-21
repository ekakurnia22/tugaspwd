<?php 
include 'koneksi.php';
$id = $_GET['id'];

$query_hapusdata = "DELETE from register where id = '$id'";
    $hapusdata = mysqli_query($conn, $query_hapusdata);
    if ($hapusdata) {
        $status = 'berhasil';
         $msg = "Data berhasil di hapus..";
    } else {
        $status = 'error';
        $msg = "Gagal Menghapus data...";
    }

header("location:hasil.php?pesan=hapus");
?>