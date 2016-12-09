<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Password</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/styles.css">
	<script src="js/jquery-1.9.1.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<style>
	body {
		background: white;
		background-attachment:fixed;
		background-size: cover;		
	}
	.panel-sidebar {
		margin-top: 20px;
		background-color: #eee;
	}
	.panel-sidebar ul {
		list-style: none;
		padding: 0;
	}
	.panel-sidebar ul li {
	}
	.panel-sidebar ul li a {
		display: block;
		padding: 6px 10px;
	}
	#welcome {
	background-color: #A1CAED;
	padding: 15px;
	margin-top: 10px;
	}

	.atas {
		margin-top: 20px;
	}

	.a {
		margin-bottom: 20px;
	}

	.judul {
		padding: 17px;
		color: white;
	}
	#home {
		padding: 20px 50px;
		background: #DDD;
	}
	#footer {
		background-color: #A1CAED;
		padding: 20px 0 10px;
		margin-bottom: 10px;
	}
	.nav-footer {
	text-align: right;
	list-style: none;
	padding: 0;
	}
	.navbar {
		margin-bottom: 0px;
	}
	.nav-footer li {
		display: inline;
	}
	.nav-footer li a {
		padding: 10px 20px;
		text-decoration: none;
		color: white;
	}
	td, th {
    	padding: 3px;
	}
	center{
		background-color : #DDD;
	}
	</style>
</head>
<body>
	<div class="container">
		<header id="welcome">
			<div class="row">
				<div class="col-md-15">
					<h1 class="judul">
						Pegawai
					</h1>
				</div>
			</div>
		</header>
	<center>
		<h2 style="color: #555;">Ganti Password</h2>
		<hr>
	</center>
	<?php
		include("koneksi.php");
		session_start();
		if(isset($_POST['ganti'])) {
			$kode = $_SESSION['user-_id'];
			$old = $_POST['passwordlama'];
			$new = $_POST['passwordbaru'];
			$confirm = $_POST['passwordbaru2'];
			
			$sql = "select *from tKaryawan where kode='$kode'";
			$hasil = mysqli_query($koneksi, $sql);
			$fetch = mysqli_fetch_array($hasil);
			
			$check_old = $fetch['passworrd'];
			
			if(password_vertify($old, $check_old)){
				if($new == $confirm) {
					$password = password_hash($new, PASSWORD_BCRYPT);
					$sql = "update tKaryawan set password='$password' where kode='$kode'";
					mysqli_query($koneksi, $sql);
					echo "<center>";
					echo "<p style='color: #00FF00; font-weight: bold;
					font-size: 14px;' > Ganti Password Berhasil </p>";
					echo "</center>";
					header("location: profil.php");
				}else {
					echo "<center>";
					echo "<p style='color: #FFF0000; font-weight: bold;
					font-size: 14px;' > Ganti Password Gagal </p>";
					echo "</center>";
					}
				}else {
					echo "<p style='color: #FFF0000; font-weight: bold;
					font-size: 14px;' > Ganti Password Gagal";
				}
			}
		?>
		
		<section id="home">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-2">
						<div class="panel panel-sidebar">
							<div class="panel-body">
								<ul>
									<li><a href="home.php">Home</a></li>
									<li><a href="profile.php">Profile</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<div class="panel panel-default atas">
						
						<form action="gpass.php" method="POST">
							<table style="margin-left: 60px;">
								<tr>
									<td>Password Lama</td>
									<td> : </td>
									<td><input type='password' name='passwordlama' /></td>
								</tr>
								<tr>
									<td>Password Baru</td>
									<td> : </td>
									<td><input type='password' name='passwordbaru' /></td>
								</tr>
								<tr>
									<td>Retype Password Baru</td>
									<td> : </td>
									<td><input type='password' name='passwordbaru2' /></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td><input type='submit' name="ganti" value="Ganti"/></td>
								</tr>
							</table>
						</form>
						</div>
					</div>
				</div>
			</div>
		</section>
			
		<footer id="footer">
		</footer>
	</div>
</html>	