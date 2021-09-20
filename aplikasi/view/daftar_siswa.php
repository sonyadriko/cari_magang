<?php 
//include '../control/signup_siswa.php';

include '../../class/siswa_model.php';
$model = new SiswaModel();
$insert = $model->addSiswa();

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Sign Up</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="../../asset/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
<link href="../../asset/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!--js-->
<script src="../../js/jquery-2.1.1.min.js"></script> 
<!--icons-css-->
<link href="../../asset/css/font-awesome.css" rel="stylesheet">
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
<!--//charts-->
</head>
<body>	
<!--inner block start here-->
<div class="signup-page-main">
     <div class="signup-main">  	
    	 <div class="signup-head">
			</div>
			<div class="signup-block">
				
				<h2 style=" font-size: 1.5em; color:#68AE00; text-align: center; margin-bottom: 0.5em; font-family: 'Carrois Gothic', sans-serif;">Daftar Siswa</h2>
				<br>
				<br>
				<form action="daftar_siswa.php" method="POST" enctype="multipart/form-data">
					<p>Nama Lengkap</p>
					<input type="text" name="name" placeholder="Nama Lengkap" required>
					<p>Asal Sekolah</p>
					<input type="text" name="sekolah" placeholder="Sekolah"  required>
					<p>Jurusan</p>
					<select class="form-control" name="jurusan" id="jurusan" required>
                          		<option>Jurusan</option>
                          		<option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                          		<option value="Teknik Komputer & Jaringan">Teknik Komputer & Jaringan</option>
                          		<option value="Animasi">Animasi</option>
                          		<option value="Audio Video">Audio Video</option>
                          		<option value="Multimedia">Multimedia</option>
                        	</select>      
                        	<br>
                        	<p>NISN</p>
					<input type="text" name="nisn" placeholder="NISN" required>
					<!--<input type="text" name="jkelamin" placeholder="Jenis Kelamin" required>-->
					<p>Jenis Kelamin</p>
					<table>
						<tr>
							<td><input type="radio" id="laki" name="jkelamin" value="laki-laki">
					<label for="laki">Laki-Laki</label><br>	</td>
					<td>
						<input type="radio" id="perempuan" name="jkelamin" value="perempuan">
					<label for="perempuan">Perempuan</label><br>
					</td>
						</tr>
					</table>
					
					<br>
					<p>Alamat</p>
					<input type="text" name="alamat" placeholder="Alamat" required>
					<p>Kota</p>
                        	<select class="form-control" name="addkota" id="addkota" required>
                          		<option>Kota</option>
                          		<option value="Lamongan">Lamongan</option>
                          		<option value="Malang">Malang</option>
                          		<option value="Mojokerto">Mojokerto</option>
                          		<option value="Sidoarjo">Sidoarjo</option>
                          		<option value="Surabaya">Surabaya</option>
                        	</select>    
                    	<p>Email</p>
					<input type="text" name="email" placeholder="Email" required>
					<p>Password</p>
					<input type="hidden" name="hak_akses" value="3">

					<?php if (isset($email_error)): ?> 
							<span><?php echo $email_error; ?></span>
					<?php endif ?>	
					
					<input type="password" name="password" class="lock" placeholder="Password" required>
					<p>Foto Siswa</p>
					<div class="form-group compose-right">
						<div class="btn btn-default btn-file">
							<i class="fa fa-paperclip"> </i> Foto Profile
							<input type="file" name="foto_siswa">
						</div>
					</div>
					<br>
					<input type="submit" name="submit" value="Daftar">
																		
				</form>
				<div class="sign-down">
				<h4><a href="login.php"> Ke Halaman Login.</a></h4>
					
				</div>
			</div>
		
    </div>
</div>
<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
	 <p>© 2016 Shoppy. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
</div>	
<!--COPY rights end here-->
<!--scrolling js-->
		<script src="js/jquery.nicescroll.js"></script>
		<script src="js/scripts.js"></script>
		<!--//scrolling js-->
<script src="js/bootstrap.js"> </script>
<!-- mother grid end here-->
</body>
</html>


                      
						
