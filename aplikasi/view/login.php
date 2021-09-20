<?php include '../control/process_login.php' ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Login</title>
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
<!--static chart-->
</head>
<body>	
<div class="login-page">
    <div class="login-main">  	
    	 <div class="login-head">
			</div>
			<div class="login-block">
				<form action="login.php" method="POST">
					<h1>Login</h1>
					<br>
					<br>
					<input type="text" name="email" placeholder="Email" required>
					<input type="password" name="password" class="lock" placeholder="Password">
					<input type="radio" id="bos" name="verify" value="2">
					<label for="bos">Perusahaan</label><br>
					<input type="radio" id="siswa" name="verify" value="3">
					<label for="siswa">Siswa</label><br>
					<br>
					<input type="submit" name="submit" value="Login">	
					
					<br>
					<!--<button type="submit" name="daftar_siswa" value="Daftar Siswa">Daftar Siswa<a href="daftar_siswa.php"></button></a>-->
					<table width="100%">
						<tr >
							<td   style="padding-right: 20px; " width="50%" >
					<a href="daftar_siswa.php" type="button" name="submit" style="text-align: center;">Daftar Siswa</a>
								
							</td>
							<td  style="padding-left: 20px;" width="50%">
					<a href="daftar_bos.php" type="button" name="submit" style="text-align: center;:">Daftar Bos</a>
								
							</td>
						</tr>
					</table>

					<!--<a href="daftar_bos.php"><button type="submit" name="daftar_bos" value="Daftar Bos">Daftar Bos</button></a>-->

				
				</form>
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


                      
						
