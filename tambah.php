<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Peserta</title>
</head>
<body>
    <h1>Tambahkan Data Peserta</h1>
    <?php
    // Sertakan file koneksi ke database
    include 'koneksi.php';

    // Cek apakah form disubmit
    if (isset($_POST['submit'])) {
        // Ambil data dari form
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $institusi = $_POST['institusi'];
        $alamat = $_POST['alamat'];
        $asal_negara = $_POST['asal_negara'];

        // Query untuk menambahkan data ke tabel register
        $query_tambahdata = "INSERT INTO register (nama, email, institusi, alamat, asal_negara) 
                             VALUES ('$nama', '$email', '$institusi', '$alamat', '$asal_negara')";

        // Eksekusi query
        if ($conn->query($query_tambahdata) === TRUE) {
            echo "Data peserta berhasil ditambahkan.";
        } else {
            echo "Error: " . $query_tambahdata . "<br>" . $conn->error;
        }
        
        // Tutup koneksi
        $conn->close();
    }
    ?>
    <!-- Form untuk menambahkan data peserta -->
    <form method="POST" action="">
        <table>
            <tr>
                <td>Nama:</td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr>
                <td>Institusi:</td>
                <td><input type="text" name="institusi" required></td>
            </tr>
            <tr>
                <td>Alamat:</td>
                <td><input type="text" name="alamat" required></td>
            </tr>
            <tr>
                <td>Asal Negara:</td>
                <td><input type="text" name="asal_negara" required></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="Tambahkan"></td>
            </tr>
        </table>
    </form>
    <a href="hasil.php">Kembali</a><br>
    
</body>
</html>
