<?php 
include '../control/koneksi.php';

	//session_start();

	if (!isset($_SESSION['id_bos'])) {
    	header("Location: login.php");
	}
	$getFoto = mysqli_query($conn, "SELECT * FROM user_bos WHERE id_bos = $_SESSION[id_bos] ");
	while ($displayfoto=mysqli_fetch_array($getFoto)) {
		$foto_profile = $displayfoto['foto_bos'];
	}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Cari Magang</title>
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
<script src="../../asset/js/jquery-2.1.1.min.js"></script> 
<!--icons-css-->
<link href="../../asset/css/font-awesome.css" rel="stylesheet"> 
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
<!--static chart-->
<script src="../../asset/js/Chart.min.js"></script>
<!--//charts-->

<!--skycons-icons-->
<script src="../../asset/js/skycons.js"></script>
<!--//skycons-icons-->
</head>
<body>	
<div class="page-container">	
   <div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here-->
				<div class="header-main">
					<div class="header-left">
							<div class="logo-name">
									 <a href="index.php"> <h1>Cagang</h1> 
									<!--<img id="logo" src="" alt="Logo"/>--> 
								  </a> 								
							</div>
							<!--search-box
								<div class="search-box">
									<form>
										<input type="text" placeholder="Search..." required="">	
										<input type="submit" value="">					
									</form>
								</div>//end-search-box-->
							<div class="clearfix"> </div>
						 </div>
						<div class="profile_details">		
							<ul>
								<li class="dropdown profile_details_drop">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										<div class="profile_img">	
											<span class="prfil-img"><img src="../../asset/gambar/<?php echo $foto_profile ?>" alt="" width="50px" height="50px" style="border-radius: 25px;"> </span> 
											<div class="user-name">
												<p><?php if ($_SESSION['hak_akses'] == 3) {
													# code...
													echo $_SESSION['nama']; 
													} elseif ($_SESSION['hak_akses'] == 2) {
														# code...
														echo $_SESSION['nama_bos'];
												} ?>
												<br>
												<span><?php if ($_SESSION['hak_akses'] == 3) {
													echo "Siswa";
												} elseif ($_SESSION['hak_akses'] == 2) {
													# code...
													echo "Bos";
												} ?></span>
											</div>
											<i class="fa fa-angle-down lnr"></i>
											<i class="fa fa-angle-up lnr"></i>
											<div class="clearfix"></div>	
										</div>	
									</a>
									<ul class="dropdown-menu drp-mnu">
										<li> <a href="profile_bos.php"><i class="fa fa-user"></i> Profile</a> </li> 
										<li> <a href="../control/logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
									</ul>
								</li>
							</ul>
						</div>
				     <div class="clearfix"> </div>	
				</div>
<!--heder end here-->
<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>