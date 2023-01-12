<html>
<head>
    <title> Update Data Kabupaten Tegal</title>
    <link rel="stylesheet" href="update.css">
</head>

<body>
    <nav class="navbar">
        <div class="logo">
            <h4>Kabupaten Tegal</h4>
        </div>
        <ul>
            <li><a href="home-out.php">Home</a></li>
            <li><a href="data.php">Data Lahan Sawah</a></li>
            <li><a href="map-forafterlog.php">Peta Lahan Sawah</a></li>
        </ul>
    </nav>
    <h2>Form Edit Data Lahan Sawah</h2>
    <?php
    require_once 'koneksi.php';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $stid = oci_parse($koneksi,"SELECT id, nama_kec, luas_ha, bknlhnswh, lhn_swh FROM kota_tgl WHERE ID = '$id'");
        oci_execute($stid);
        while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
	?>

    <form action="proses-update.php" method="post">
        <div>
            <table>
                <tr>
                    <td>ID</td>
                    <td>:</td>
                    <td><input type="text" name="id" disabled value="<?= $row['ID'] ?>"></td>
                </tr>
                <tr>
                    <td>Nama Kecamatan</td>
                    <td>:</td>
                    <td><input type="text" name="nama_kec" value="<?= $row['NAMA_KEC'] ?>"></td>
                </tr>
                <tr>
                    <td>Luas Wilayah</td>
                    <td>:</td>
                    <td><input type="text" name="luas_ha" disabled value="<?= $row['LUAS_HA'] ?>"></td>
                </tr>
                <tr>
                    <td>Bukan Lahan Sawah</td>
                    <td>:</td>
                    <td><input type="text" name="bknlhnswh" value="<?= $row['BKNLHNSWH'] ?>"></td>
                </tr>
                <tr>
                    <td>Lahan Sawah</td>
                    <td>:</td>
                    <td><input type="text" name="lhn_swh" value="<?= $row['LHN_SWH'] ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><button type="submit"  class="submit" name="submit">Update</button></td>
                </tr>
            </table>
        </form>
        <?php }
		} ?>
    </body>
</html>