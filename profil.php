<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Profil Pegawai</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/styles.css">
	<script src="js/jquery-1.9.1.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<style>
	body {
		
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
		background: #C2E6BF;
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

		<section id="home">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-2">
						<div class="panel panel-sidebar">
							<div class="panel-body">
								<ul>
									<li><a href="profil.php?logout=true">Logout</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<div class="panel panel-default atas">
							<div class="panel-heading">
								<h3>Profile</h3>
								<hr>
							</div>
							
							<?php 
								include("koneksi.php");
								session_start();

								if (isset($_GET['page'])) {
									$limit = ($_GET['page'] - 1) * 2;
								} else {
									$limit = 0;
								}

								$kdpegawai = $_SESSION["user_id"];
								$sql = "select * from tkaryawan where kdpegawai='$kdpegawai'";
								$hasil = mysqli_query($koneksi, $sql);
								$baris = mysqli_fetch_array($hasil);
								function logout(){
								session_destroy();
									header('location: home.php');
								}
								if(isset($_GET['logout'])){
									logout();
								}	

								echo '
									<div class="kotak">
										<div class="avatar">
											<img src="'.$baris[7].'" class="img-responsive">
										</div>
										<div class="detail">
										<p>'.$baris[0].'</p>
										<p>'.$baris[1].'</p>
										<p>'.$baris[2].'</p>
										<p>'.$baris[4].'</p>
										<p>'.$baris[5].'</p>
										<p>'.$baris[6].'</p>
										<p>'.$baris[8].'</p>
										<ul class="action">
											<li><a href="form.php?kdpegawai=' . $baris[0] . '">Edit</a></li>
											<li><a href="gpass.php?kdpegawai=' . $baris[0] .'">Ganti Password</a></li>
										</ul>
										<br>
										</div>
									</div>
								';
							?>
						</div>
					</div>
				</div>
			</div>
		</section>
			
		<footer id="footer">
		</footer>
	</div>
</body>
</html>