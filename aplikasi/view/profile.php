<?php 
	//include '../control/koneksi.php';

	session_start();
	require ('template/header_siswa.php'); 

	if (!isset($_SESSION['id_siswa'])) {
    	header("Location: login.php");
	}

	include '../../class/siswa_model.php';
	$model = new SiswaModel();
	$id = $_SESSION['id_siswa'];
	$row = $model-> getProfileSiswa($id);

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
				<span><img src="../../asset/gambar/<?php echo $row['foto_siswa'] ?>" alt="" style="width: 105px; height: 105px; display: inline-block; position: absolute; top: -60px; left: 205px; border: 2px solid  #ccc; border-radius: 63px; -webkit-border-radius:63px; -moz-border-radius: 63px;-o-border-radius: 63px;  ">   </span>
			     
				 <h2>Profile</h2>
				 <table>
				 	<tr>
				 		<td style="padding-left: 200px;padding-top: 25px;">Nama </td>
						<td style="padding-top: 25px;"> : </td>

				 		<td style=" padding-top: 25px;"> <?php echo $row['nama'] ?></td>
				 	</tr>
				 	<tr>
				 		<td style="padding-left: 200px;  padding-top: 25px;">Jenis Kelamin </td>
						<td style="padding-top: 25px;"> : </td>

				 		<td style=" padding-top: 25px;"> <?php echo $row['jenis_kelamin'] ?></td>
				 	</tr>
				 	<tr>
				 		<td style="padding-left: 200px;  padding-top: 25px;">Sekolah </td>
						<td style="padding-top: 25px;"> : </td>

				 		<td style=" padding-top: 25px;"> <?php echo $row['sekolah'] ?></td>
				 	</tr>
				 	<tr>
				 		<td style="padding-left: 200px;  padding-top: 25px;">Jurusan </td>
						<td style="padding-top: 25px;"> : </td>

				 		<td style=" padding-top: 25px;"> <?php echo $row['jurusan'] ?></td>
				 	</tr>
				 	<tr>
				 		<td style="padding-left: 200px;  padding-top: 25px;">Alamat </td>
						<td style="padding-top: 25px;"> : </td>

				 		<td style=" padding-top: 25px;"> <?php echo $row['alamat'] ?></td>
				 	</tr>
				 	<tr>
				 		<td style="padding-left: 200px;  padding-top: 25px;">NISN </td>
						<td style="padding-top: 25px;"> : </td>

				 		<td style=" padding-top: 25px;"> <?php echo $row['nisn'] ?></td>
				 	</tr>
				 	<tr>
				 		<td style="padding-left: 200px;  padding-top: 25px;">Kota  </td>
						<td style="padding-top: 25px;"> : </td>

				 		<td style=" padding-top: 25px;"> <?php echo $row['kota'] ?></td>
				 	</tr>
				 	<tr>
				 		<td style="padding-left: 200px;  padding-top: 25px;">Kota  </td>
						<td style="padding-top: 25px;"> : </td>

				 		<td style=" padding-top: 25px;"> <?php echo $row['no_telp'] ?></td>
				 	</tr>
				 	<tr>
				 		<td style="padding-left: 200px;  padding-top: 25px;">Email </td>
						<td style="padding-top: 25px;"> : </td>

				 		<td style=" padding-top: 25px;"> <?php echo $row['email'] ?></td>
				 	</tr>
				</table>
				<br>
				<br>
				<br>
				<br>
				<a href="index.php"><button>Back</button></a>
				<a href="edit_profile.php"><button>Edit Profile</button></a>
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
<?php require('template/slider_menu.php'); ?>