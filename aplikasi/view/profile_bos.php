<?php 
	include '../control/koneksi.php';

	session_start();
	require ('template/header_bos.php'); 

	if (!isset($_SESSION['id_bos'])) {
    	header("Location: login.php");
	}

	$getdata = mysqli_query($conn, "SELECT * FROM user_bos WHERE id_bos = '$_SESSION[id_bos]'");
	while ($row=mysqli_fetch_assoc($getdata)) {
		# code...
		$id_bos = $row['id_bos'];
		$nama = $row['nama'];
		$nama_perusahaan = $row['nama_perusahaan'];
		$bidang = $row['bidang'];
		$alamat = $row['alamat'];
		$kota = $row['kota'];
		$email = $row['email'];
		$foto = $row['foto_bos'];
	}

	
?>

<!--inner block start here-->
<div class="inner-block">
<!--market updates updates-->
<div class="main-page-charts">
	<div class="main-page-chart-layer1">
		<div class="col-md-12 chart-layer1-right"> 
			<div class="user-marorm">
			<div class="malorum-top">				
			</div>
				
			
			
			<div class="malorm-bottom">
				<span><img src="../../asset/gambar/<?php echo $foto ?>" alt="" style="width: 105px; height: 105px; display: inline-block; position: absolute; top: -60px; left: 205px; border: 2px solid  #ccc; border-radius: 63px; -webkit-border-radius:63px; -moz-border-radius: 63px;-o-border-radius: 63px;  ">   </span>
			     
				 <h2>Profile</h2>
				 <table>
				 	<tr>
				 		<td style="padding-left: 200px;padding-top: 25px;">Nama </td>
						<td style="padding-top: 25px;"> : </td>

				 		<td style=" padding-top: 25px;"> <?php echo $nama ?></td>
				 	</tr>
				 	<tr>
				 		<td style="padding-left: 200px;  padding-top: 25px;">Nama Perusahaan </td>
						<td style="padding-top: 25px;"> : </td>

				 		<td style=" padding-top: 25px;"> <?php echo $nama_perusahaan ?></td>
				 	</tr>
				 	<tr>
				 		<td style="padding-left: 200px;  padding-top: 25px;">Bidang </td>
						<td style="padding-top: 25px;"> : </td>

				 		<td style=" padding-top: 25px;"> <?php echo $bidang ?></td>
				 	</tr>
				 	<tr>
				 		<td style="padding-left: 200px;  padding-top: 25px;">Alamat </td>
						<td style="padding-top: 25px;"> : </td>

				 		<td style=" padding-top: 25px;"> <?php echo $alamat ?></td>
				 	</tr>
				 	<tr>
				 		<td style="padding-left: 200px;  padding-top: 25px;">Kota  </td>
						<td style="padding-top: 25px;"> : </td>

				 		<td style=" padding-top: 25px;"> <?php echo $kota ?></td>
				 	</tr>
				 	<tr>
				 		<td style="padding-left: 200px;  padding-top: 25px;">Email </td>
						<td style="padding-top: 25px;"> : </td>

				 		<td style=" padding-top: 25px;"> <?php echo $email ?></td>
				 	</tr>
				</table>
				<br>
				<br>
				<br>
				<br>
				<a href="index.php"><button>Back</button></a>
				 <br>
				 <br>
				 <br>
				
			</div>
		   </div>
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
</div>
</div>
<?php require('template/slider_menu_bos.php'); ?>