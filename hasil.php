<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Peserta</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form id="daftar">
    <table border="1">
        <h1 id="daftar">Daftar Peserta</h1>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>E-mail</th>
            <th>Institusi</th>
            <th>Alamat</th>
            <th>Asal Negara</th>
            <th>Pilihan</th>
        </tr>
    </form>

        <?php 
        include 'koneksi.php';
        $no = 1;
        $data = mysqli_query($conn,"select * from register");
        if (!$data) {
            die("Query error: " . mysqli_error($conn)); 
        }
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['nama']; ?></td>
				<td><?php echo $d['email']; ?></td>
				<td><?php echo $d['institusi']; ?></td>
                <td><?php echo $d['alamat']; ?></td>
                <td><?php echo $d['asal_negara']; ?></td>
				<td>
					<a href="edit.php?id=<?php echo $d['id']; ?>">EDIT</a>
					<a href="hapus.php?id=<?php echo $d['id']; ?>">HAPUS</a>
				</td>
			</tr>
			<?php 
		}
        
		?>
    </table>
    <a href="tambah.php">+ TAMBAH MAHASISWA</a>
</body>
</html>
