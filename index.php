<?php
require 'functions.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>
        <center>DATA DIRIKU</center>
    </h2>
    <center><a href="tambahform.php">Tambahkan Guru</a></center>
    <table border="1" align="center" cellpadding="10" style="margin: 20px auto;">
        <tr>
            <td>Aksi</td>
            <td>Nomor</td>
            <td>Kode Guru</td>
            <td>Nama Guru</td>
            <td>Hari</td>
            <td>Mapel</td>
            <td>Waktu</td>
            <td>Gambar</td>
        </tr>

        <?php
        $query = mysqli_query($conn, "SELECT * FROM sebelas11");
        $nomor = 1;
        while ($row = mysqli_fetch_assoc($query)):
            ?>
            <tr>
                <td>
                    <a href="hapus.php?id=<?= $row["id"] ?>&gambar=<?= $row["gambar"] ?>">Delete</a> | <a
                        href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a>
                </td>
                <td>
                    <center>
                        <?= "$nomor" ?>
                    </center>
                </td>
                <td>
                    <?= "$row[kode_guru]" ?>
                </td>
                <td>
                    <?= "$row[nama_guru]" ?>
                </td>
                <td>
                    <?= "$row[hari]" ?>
                </td>
                <td>
                    <?= "$row[mapel]" ?>
                </td>
                <td>
                    <?= "$row[waktu]" ?>
                </td>
                <td>
                    <img src="img/<?= $row["gambar"] ?>" width="100px">
                </td>
            </tr>
            <?php $nomor++; ?>
        <?php endwhile; ?>
    </table>
</body>

</html>