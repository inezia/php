<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Home</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	
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
								<h3>Home</h3>
								<hr>
							</div>	
							<div class="panel-body">
								<p>
									Selamat Datang
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
			
		<footer id="footer">
		</footer>
	</div>
	<script src="js/jquery-1.9.1.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>