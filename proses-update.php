<html>
  <head>
    <title>Update Data Kabupaten Tegal</title>
  </head>
</html>
<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $nama = $_POST['nama_kec'];
  $bukan = $_POST['bknlhnswh'];
  $sawah = $_POST['lhn_swh'];
 
  // update data berdasarkan nama kecamatan yg dikirimkan
  
	$query = "UPDATE kota_tgl SET bknlhnswh ='".$bukan."', lhn_swh ='".$sawah."' WHERE nama_kec = '".$nama."' ";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data berubah
    echo "<script>alert('Data Lahan Sawah Berhasil Diubah'); window.location.href='data.php'</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data Lahan Sawah Gagal Diubah'); window.location.href='data.php'</script>";
  }
}