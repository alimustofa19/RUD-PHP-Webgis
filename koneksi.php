<?php
$username = "mvdemo"; // sesuaikan dengan username oracle
$password = "mvdemo"; // sesuaikan dengan password oracle
$host = "localhost/xe"; // sesauikan dengan nama database
$koneksi = oci_connect($username, $password, $host) or die('connection failed');
if(!empty($koneksi)){
	echo"";
}else{
	echo"Koneksi Gagal";
}
?>