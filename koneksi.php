<?php
$servername = "localhost";
$database = "database";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi Gagal : " . $conn->connect_error);
} else {
    echo "";
}

