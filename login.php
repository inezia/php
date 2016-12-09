<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
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
						Input Data Pegawai
					</h1>
				</div>
			</div>
		</header>
<?php
				include("koneksi.php");
				session_start();

				if(isset($_POST['login'])){
					$email = $_POST['email'];
					$pass = $_POST['password'];
					$sql = "select * from tkaryawan where email='$email'";
					$hasil = mysqli_query($koneksi, $sql);
					$fetch = mysqli_fetch_array($hasil);
					if (password_verify($pass, $fetch['password'])) {					
						$_SESSION['user_id'] = $fetch['kode'];
						header("location: profil.php");
					}else {
						echo "<p style='color: #FF)))); font-weight:bold; font-size:14px;' > Login Gagal ! </p>";
						echo "<hr>";
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
									<li><a href="form.php">Daftar</a></li>
									<li><a href="login.php">Login</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<div class="panel panel-default atas">
							<div class="panel-heading">
								<h3>Login Data Pegawai</h3>
								<hr>
							</div>
		
						<center>
						<form action="login.php" method="POST">
								<table>
									<tr>
										<td>E-mail</td>
										<td> : </td>
										<td><input type="text" name="email"/></td>
									</tr>
									<tr>
										<td>Password</td>
										<td> : </td>
										<td><input type='password' name='password'/></td>
									</tr>
										<td></td>
										<td></td>
										<td><input type='submit' name="login" value="login"/></td>
									</tr>
								</table>
								</form>
							</center>
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