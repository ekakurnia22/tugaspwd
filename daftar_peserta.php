<?php
$query_sql = "SELECT * FROM registrasi";
$result = $conn->query($query_sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Id: " . $row["id"]. "Nama: ". $row["nama"]. "E-mail". $row["email"]. "Institusi: ". $row["institusi"]. "Alamat". $row["alamat"]. "Negara Asal: ". $row["asal_negara"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
