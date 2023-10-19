<?php
require 'functions.php';
$id = $_GET["id"];
$gambar = $_GET["gambar"];
if (hapus($id) > 0) {
	echo "
		<script>
		alert('Data Berhasil Dihapus!');
		document.location.href = 'index.php';
		</script>
		";
	unlink("img/$gambar");
} else {
	echo "
		<script>
		alert('Data Gagal dihapus!');
		document.location.href = 'index.php';
		</script>
		";
}
?>