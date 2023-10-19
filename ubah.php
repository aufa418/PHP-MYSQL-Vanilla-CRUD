<?php
require 'functions.php';
//langkah 11 ubah bagian input gambar

//koneksi ke DBMS

//ambil data di URL
$id = $_GET["id"];

//query data dataku berdasarkan id
$data = query("SELECT * FROM sebelas11 WHERE id = $id")[0];

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

	//cek apakah data berhasil ditambahkan atau tidak
	if (ubah($_POST) > 0) {
		echo "
		<script>
		alert('Data Berhasil Diubah!');
		document.location.href = 'index.php';
		</script>
		";
	} else {
		echo "
		<script>
		alert('Data Gagal Diubah!');
		document.location.href = 'index.php';
		</script>
		";
	}
}
?>


<!DOCTYPE html>
<html>

<head>
	<title>Ubah Data</title>
	<style>
		form ul li {
			margin: 10px 10px 10px 10px;
		}
	</style>
</head>

<body>
	<h1>Ubah Data</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $data["id"]; ?>">
		<input type="hidden" name="gambarlama" value="<?= $data["gambar"]; ?>">

		<ul>
			<li>
				<label for="kode_guru">Kode guru : </label>
				<input type="text" name="kode_guru" id="kode_guru" value="<?= $data["kode_guru"]; ?>">
			</li>
			<li>
				<label for="nama">Nama Guru : </label>
				<input type="text" name="nama_guru" id="nama" value="<?= $data["nama_guru"]; ?>">
			</li>
			<li>
				<label for="hari">Hari : </label>
				<input type="text" name="hari" id="hari" value="<?= $data["hari"]; ?>">
			</li>
			<li>
				<label for="mapel">Mapel : </label>
				<input type="text" name="mapel" id="mapel" value="<?= $data["mapel"]; ?>">
			</li>

			<li>
				<label for="waktu">Waktu : </label>
				<input type="text" name="waktu" id="waktu" value="<?= $data["waktu"]; ?>">
			</li>

			<li>
				<label for="waktu">Gambar : </label>
				<img src="img/<?= $data["gambar"] ?>" width="100px">
				<br>
				<input type="file" name="gambar" id="gambar" value="<?= $data["gambar"]; ?>">
			</li>

			<li>
				<button type="submit" name="submit">Ubah Data!</button>
				<a href="index.php">Kembali</a>
			</li>
		</ul>

	</form>

</body>

</html>