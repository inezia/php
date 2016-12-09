<?php
	include("koneksi.php");
	
	$kode = $_GET['kode'];
	unlink("foto/" .$kode . ".jpg");
	$sql = "delete from tkaryawan where kode='$kode'";
	mysqli_query($koneksi, $sql);
	
	header("location: home.php");
?>