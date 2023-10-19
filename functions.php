<?php
$conn = mysqli_connect('localhost', 'root', '', 'sebelas');

function query($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function tambah($data)
{
	//ambil data dari tiap elemen dalam form
	global $conn;
	$kode_guru = htmlspecialchars($data["kode_guru"]);
	$nama = htmlspecialchars($data["nama"]);
	$hari = htmlspecialchars($data["hari"]);
	$mapel = htmlspecialchars($data["mapel"]);
	$waktu = htmlspecialchars($data["waktu"]);

	$gambar = upload();
	if (!$gambar) {
		return false;
	}

	//query insert data
	$query = "INSERT INTO sebelas11
		VALUES
	('', '$kode_guru', '$nama', '$hari', '$mapel', '$waktu', '$gambar')
	";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function ubah($data)
{
	global $conn;
	$id = $data["id"];
	$kode_guru = htmlspecialchars($data["kode_guru"]);
	$nama_guru = htmlspecialchars($data["nama_guru"]);
	$hari = htmlspecialchars($data["hari"]);
	$mapel = htmlspecialchars($data["mapel"]);
	$waktu = htmlspecialchars($data["waktu"]);
	$gambarlama = htmlspecialchars($data["gambarlama"]);

	// cek apakah file gambar ada atau tidak
	if ($_FILES["gambar"]["error"] === 4) {
		$gambar = $gambarlama;
	} else {
		$gambar = upload();
	}
	//query insert data
	$query = "UPDATE sebelas11 SET
		kode_guru = '$kode_guru',
		nama_guru = '$nama_guru',
		hari = '$hari',
		mapel = '$mapel',
		waktu = '$waktu',
		gambar = '$gambar'
		WHERE id = $id
	";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function upload()
{
	$nama_gambar = $_FILES["gambar"]["name"];
	$size_gambar = $_FILES["gambar"]["size"];
	$tmp_gambar = $_FILES["gambar"]["tmp_name"];
	$error_gambar = $_FILES["gambar"]["error"];

	// cek apakah gambar ada atau tidak 
	if ($error_gambar === 4) {
		echo "
			<script>
				alert('Tolong masukan foto');
			</script>
		";
		return false;
	}

	// cek apakah gambar/file seusai ekstensi
	$ekstensigambarvalid = ['jpg', 'png', 'jpeg'];
	$ekstensigambar = explode(".", $nama_gambar);
	$ekstensigambar = strtolower(end($ekstensigambar));
	if (!in_array($ekstensigambar, $ekstensigambarvalid)) {
		echo "
		<script>
			alert('yang anda upload bukan photo');
		</script>
		";
		return false;
	}

	// cek apakah gambar terlalu besar atau tidak
	if ($size_gambar < 5000) {
		echo "
		<script>
			alert('size foto terlalu besar');
		</script>
		";
		return false;
	}

	$namaFileBaru = uniqid();
	$namaFileBaru .= "." . $ekstensigambar;
	var_dump($namaFileBaru);

	move_uploaded_file($tmp_gambar, "img/" . $namaFileBaru);
	return $namaFileBaru;
}

function hapus($data)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM sebelas11 WHERE id=$data;");
	return mysqli_affected_rows($conn);
}
?>