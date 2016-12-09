<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Pendaftaran</title>
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
	select{
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
	}
	</style>
</head>
<body>
	<div class="container">
		<header id="welcome">
			<div class="row">
				<div class="col-md-15">
					<h1 class="judul">
						Form Pendaftaran Pegawai
					</h1>
				</div>
			</div>
		</header>
<?php 
	include("koneksi.php");
	
	session_start();
	
	if(isset($_POST['daftar']))
	{
		if($_POST['id'] == '')
		{
			$kdpegawai = $_POST['kdpegawai'];
			$nama = $_POST['nama'];
			$email = $_POST['email'];
			$password = password_hash($_POST['password'],PASSWORD_BCRYPT);
			$jk = $_POST['jk'];
			$kdprov = $_POST['kdprov'];
			$kdkota = $_POST['kdkota'];
			$fotoN = $_FILES['foto']['name'];
			$fotoS = $_FILES['foto']['size'];
			$fotoT = $_FILES['foto']['tmp_name'];
			$sumber = $fotoT;
			$tujuan = "foto/" .$kdpegawai .".jpg";
			move_uploaded_file($sumber, $tujuan);
			$tgl_lahir = $_POST['tgl_lahir'];
			$sql = "insert into tkaryawan values('$kdpegawai', '$nama', '$email', '$password', '$jk', '$kdprov', '$kdkota', '$tujuan', 
					'$tgl_lahir')";
			mysqli_query($koneksi, $sql);
			header("location: home.php");
		}
		else
		{
			$kdpegawai = $_POST['kdpegawai'];
			$nama = $_POST['nama'];
			$email = $_POST['email'];
			$jk = $_POST['jk'];
			$kdprov = $_POST['kdprov'];
			$kdkota = $_POST['kdkota'];
			$fotoN = $_FILES['foto']['name'];
			$fotoS = $_FILES['foto']['size'];
			$fotoT = $_FILES['foto']['tmp_name'];
			$sumber = $fotoT;
			$tujuan = "foto/" .$kdpegawai .".jpg";
			unlink($tujuan);
			$tujuan = "foto/" .$kdpegawai .".jpg";
			move_uploaded_file($sumber, $tujuan);
			$tgl_lahir = $_POST['tgl_lahir'];
			$sql = "update tkaryawan set nama='$nama', email='$email', jk='$jk', kdprov='$kdprov', kdkota='$kdkota', foto='$tujuan, tgl_lahir='tgl_lahir' where kdpegawai='$kdpegawai'";
			mysqli_query($koneksi, $sql);
			header("location: profile.php");
		}
	}
	$baris[0] = "";
	$baris[1] = "";
	$baris[2] = "";
	$baris[3] = "";
	$baris[4] = "";
	$baris[5] = "";
	$baris[6] = "";
	$baris[7] = "";
	$baris[8] = "";
	$baris[9] = "";
	$baris[10] ="";

	if (isset($_GET['kdpegawai'])) 
	{
		$kdpegawai = $_GET['kdpegawai'];

		$sql = "select *from tkaryawan where kdpegawai='$kdpegawai'";
		$hasil = mysqli_query($koneksi, $sql);
		$baris = mysqli_fetch_array($hasil);
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
									<li><a href="login.php">Login</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<div class="panel panel-default atas">
							<div class="panel-heading">
								<h3>Data Pegawai</h3>
								<hr>
							</div>
							<form action="form.php" method="POST" enctype="multipart/form-data">
						 		<table>
						 			<tr>
						 				<td>UserID</td>
						 				<td> : </td>
						 				<td><input type="text" class="form-control" name='kdpegawai' value="<?php if($_GET) { echo $baris[0]; } ?>" /></td>
						 			</tr>
						 			<tr>
						 				<td>Nama</td>
						 				<td> : </td>
						 				<td><input type="text" class="form-control" name="nama" value="<?php if($_GET) { echo $baris[1]; } ?>" /></td>
						 			</tr>
						 			<tr>
						 				<td>Email</td>
						 				<td> : </td>
						 				<td><input type="email" class="form-control" name="email" value="<?php if($_GET) { echo $baris[2]; } ?>" /></td>
						 			</tr>
						 			<?php 
										if (!$_GET) {
											echo '
								 			<tr>
								 				<td>Password</td>
								 				<td> : </td>
								 				<td><input type="password" class="form-control" name="password" value="" /></td>
								 			</tr>';
						 				}
									?>
						 			<tr>
						 				<td>Jenis Kelamin</td>
						 				<td> : </td>
						 				<td>
						 					<?php 
												if ($_GET) {
													if ($baris[4] == 'pria') {
														echo 
															'<input type="radio" name="jk" value="pria" checked> Pria
															<input type="radio" name="jk" value="wanita"> Wanita';
													} else {
														echo 
															'<input type="radio" name="jk" value="pria"> Pria
															<input type="radio" name="jk" value="wanita" checked> Wanita';
														}
													} else {
														echo 
														'<input type="radio" name="jk" value="pria" checked> Pria
														<input type="radio" name="jk" value="wanita"> Wanita';
													}
											?>
						 				</td>
						 			</tr>
						 			<tr>
						 				<td>Nama Provinsi</td>
						 				<td> : </td>
						 				<td>
							 				<select class="form-control" name="kdprov" value="<?php if($_GET) { echo $baris[5]; } ?>">
								 				<option value="Pilih Provinsi">Pilih Provinsi</option>
												<option value="Banten">Banten</option>
												<option value="Jawa Barat">Jawa Barat</option>
												<option value="Jawa Tengah">Jawa Tengah</option>
												<option value="Jawa Timur">Jawa Timur</option>
												<option value="Kalimantan Barat">Kalimantan Barat</option>
												<option value="Kalimantan Selatan">Kalimantan Selatan</option>
												<option value="Kalimantan Tengah">Kalimantan Tengah</option>
												<option value="Kalimantan Timur">Kalimantan Timur</option>
												<option value="Kepulauan Riau">Kepulauan Riau</option>
												<option value="Lampung">Lampung</option>
												<option value="Yogyakarta">Yogyakarta</option>
												<option value="Lokasi Lain-lain">Lokasi Lain-lain</option>
							 				</select>
						 				</td>
						 			</tr>
						 			<tr>
						 				<td>Nama Kota</td>
						 				<td> : </td>
						 				<td>
							 				<select name="kdkota" class="form-control" value="<?php if($_GET) { echo $baris[6]; } ?>">
								 				<option value="Pilih Kota">Pilih Kota</option>
								 				<option value = "Jakarta">Jakarta</option>
								 				<option value = "Tangerang">Tangerang</option>
												<option value = "Bandung">Bandung</option>
												<option value = "Malang">Malang</option>
												<option value = "Kebumen">Kebumen</option>
												<option value = "Tangerang">Bogor</option>
							 				</select>
						 				</td>
						 			</tr>
						 			<tr>
						 				<td>Foto</td>
						 				<td> : </td>
						 				<td><input type='file' name='foto' accept=".jpg, .jpeg, .png, .gif, .bmp"/></td>
						 			</tr>
									<tr>
										<td>Tanggal Lahir</td>
						 				<td> : </td>
						 				<td>
							 				<select name="tgl_lahir" class="form-control" value="<?php if($_GET) { echo $baris[1]; } ?>">
								 				<option value = "pilih">-Tanggal-</option>
								 				<option value = "1">1</option>
								 				<option value = "2">2</option>
												<option value = "3">3</option>
												<option value = "4">4</option>
												<option value = "5">5</option>
												<option value = "6">6</option>
												<option value = "7">7</option>
												<option value = "8">8</option>
												<option value = "9">9</option>
												<option value = "10">10</option>
												<option value = "11">11</option>
												<option value = "12">12</option>
												<option value = "13">13</option>
												<option value = "14">14</option>
												<option value = "15">15</option>
												<option value = "16">16</option>
												<option value = "17">17</option>
												<option value = "18">18</option>
												<option value = "19">19</option>
												<option value = "20">20</option>
												<option value = "21">21</option>
												<option value = "22">22</option>
												<option value = "23">23</option>
												<option value = "24">24</option>
												<option value = "25">25</option>
												<option value = "26">26</option>
												<option value = "27">27</option>
												<option value = "28">28</option>
												<option value = "29">29</option>
												<option value = "30">30</option>
												<option value = "31">31</option>
							 				</select>
											<td><input type="bln_lahir" class="form-control" name="bln_lahir" value="<?php if($_GET) { echo $baris[9]; } ?>" /></td>
											<td><input type="thn_lahir" class="form-control" name="thn_lahir" value="<?php if($_GET) { echo $baris[10]; } ?>" /></td>
									</tr>
						 			
						 			<tr>
						 				<td></td>
						 				<td></td>
						 				<td><input type='submit' name="daftar" value="Daftar"/>
						 				<input type='submit' name="cancel" value="Cancel"> </td>
						 			</tr>
						 			<tr>
						 				<td></td>
						 				<td></td>
						 				<td><input type='hidden' name='id' value="<?php if($_GET) { echo $baris[0]; } ?>"></td>
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
</body>
</html>