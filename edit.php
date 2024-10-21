<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Peserta</title>
    </head>
<body>
    <h1 id="edit">Edit Data Peserta</h1>

    <?php
    include 'koneksi.php'; // Pastikan file koneksi sudah benar

    // Cek apakah parameter 'id' tersedia di URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Query untuk mendapatkan data berdasarkan ID
        $query = "SELECT * FROM register WHERE id=$id";
        $result = $conn->query($query);

        // Jika data ditemukan
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "Data tidak ditemukan.";
            exit;
        }
    } else {
        echo "ID tidak ditemukan di URL.";
        exit;
    }
    ?>

    <form method="POST" action="">
        <!-- Input tersembunyi untuk ID -->
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        
        <table>
            <tr>
                <td>Nama: <input type="text" name="nama" value="<?php echo $row['nama']; ?>"></td>
            </tr>
            <tr>
                <td>Email: <input type="email" name="email" value="<?php echo $row['email']; ?>"></td>
            </tr>
            <tr>
                <td>Institusi: <input type="text" name="institusi" value="<?php echo $row['institusi']; ?>"></td>
            </tr>
            <tr>
                <td>Alamat: <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>"></td>
            </tr>
            <tr>
                <td>Asal Negara: <input type="text" name="asal_negara" value="<?php echo $row['asal_negara']; ?>"></td>
            </tr>
        </table>
        <input type="submit" value="Perbarui Data">
    </form>

    <a href="hasil.php">Kembali</a>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // Ambil data dari form
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $institusi = $_POST['institusi'];
        $alamat = $_POST['alamat'];
        $asal_negara = $_POST['asal_negara'];

        // Sanitasi data sebelum digunakan di dalam query
        $id = $conn->real_escape_string($id);
        $nama = $conn->real_escape_string($nama);
        $email = $conn->real_escape_string($email);
        $institusi = $conn->real_escape_string($institusi);
        $alamat = $conn->real_escape_string($alamat);
        $asal_negara = $conn->real_escape_string($asal_negara);

        // Query untuk memperbarui data
        $query_editdata = "UPDATE register SET 
            nama='$nama', 
            email='$email', 
            institusi='$institusi', 
            alamat='$alamat', 
            asal_negara='$asal_negara' 
            WHERE id=$id";

        // Eksekusi query
        if ($conn->query($query_editdata) === TRUE) {
            echo "Data peserta berhasil diperbarui";
        } else {
            echo "Error: " . $query_editdata . "<br>" . $conn->error;
        }
        
        // Tutup koneksi
        $conn->close();
    }
    ?>
</body>
</html>
