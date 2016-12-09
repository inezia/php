<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$name = "dbpegawai";
	
	$koneksi = mysqli_connect($host, $user, $pass, $name);
	
	if(mysqli_connect_errno()) {
		die("Koneksi DB Gagal : " . mysqli_connect_error());
	}
?>