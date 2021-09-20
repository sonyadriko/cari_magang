	<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
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
	/*
	$getdata = mysqli_query($conn, "SELECT * FROM user_siswa WHERE id_siswa = '$_SESSION[id_siswa]'");
	while ($row=mysqli_fetch_assoc($getdata)) {
		# code...
		$id_siswa = $row['id_siswa'];
		$nama = $row['nama'];
		$jkelamin = $row['jenis_kelamin'];
		$sekolah = $row['sekolah'];
		$jurusan = $row['jurusan'];
		$alamat = $row['alamat'];
		$nisn = $row['nisn'];
		$kota = $row['kota'];
		$email = $row['email'];
		$gambar = $row['foto_siswa'];
	}
	$getFoto = mysqli_query($conn, "SELECT * FROM user_siswa WHERE id_siswa = $_SESSION[id_siswa] ");
	while ($displayfoto=mysqli_fetch_array($getFoto)) {
		$foto_profile = $displayfoto['foto_siswa'];
	})*/
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
				<span class="malorum-pro"> </span>
			     
				 <h2>Profile</h2>
				 <form action="../control/update_profile.php?id=<?php echo $id_siswa ?>" method="POST">
				 <table>
				 	<tr>
				 		<td style="padding-left: 200px;padding-top: 25px;">Nama </td>
						<td style="padding-top: 25px;"> : </td>
				 		<td style=" padding-top: 25px;"><input type="text" placeholder="Nama" name="nama" value="<?php echo $row['nama'] ?>" required></td>
				 	</tr>
				 	<tr>
				 		<td style="padding-left: 200px;  padding-top: 25px;">Jenis Kelamin </td>
						<td style="padding-top: 25px;"> : </td>
						

				 		<td style=" padding-top: 25px;"><?php echo $row['jenis_kelamin'] ?></td>
				 	</tr>
				 	<tr>
				 		<td style="padding-left: 200px;  padding-top: 25px;">Sekolah </td>
						<td style="padding-top: 25px;"> : </td>
						
				 		<td style=" padding-top: 25px;"><input type="text" placeholder="Nama" name="sekolah" value="<?php echo $row['sekolah'] ?>" required></td>
				 	</tr>
				 	<tr>
				 		<td style="padding-left: 200px;  padding-top: 25px;">Jurusan </td>
						<td style="padding-top: 25px;"> : </td>
				 		<td style=" padding-top: 25px;"> <?php echo $row['jurusan']  ?></td>
				 		<!--<td style=" padding-top: 25px;"><input type="text" placeholder="Nama" name="jurusan" value="<?php echo $row['jurusan'] ?>" required></td>-->
	
				 	</tr>
				 	<tr>
				 		<td style="padding-left: 200px;  padding-top: 25px;">Alamat </td>
						<td style="padding-top: 25px;"> : </td>
	
				 		<td style=" padding-top: 25px;"><input type="text" placeholder="Nama" name="alamat" value="<?php echo $row['alamat'] ?>" required></td>
				 	</tr>
				 	<tr>
				 		<td style="padding-left: 200px;  padding-top: 25px;">NISN </td>
						<td style="padding-top: 25px;"> : </td>
				 		<td style=" padding-top: 25px;"> <?php echo $row['nisn']  ?></td>
		
				 		<!--<td style=" padding-top: 25px;"><input type="text" placeholder="Nama" name="nisn" value="<?php echo $row['nisn'] ?>" required></td>-->
				 	</tr>
				 	<tr>
				 		<td style="padding-left: 200px;  padding-top: 25px;">Kota </td>
						<td style="padding-top: 25px;"> : </td>
						<td style=" padding-top: 25px;"> <?php echo $row['kota']  ?></td>

				 		<!--<td style=" padding-top: 25px;"><input type="text" placeholder="Nama" name="kota" value="<?php echo $row['kota'] ?>" required></td>-->

				 	</tr>
				 	<tr>
				 		<td style="padding-left: 200px;  padding-top: 25px;">Email </td>
						<td style="padding-top: 25px;"> : </td>

				 		<td style=" padding-top: 25px;"> <?php echo $row['email']  ?></td>
				 	</tr>

				 </table>
				 <br>
				 <button name="update">Save Profile</button>

				 <br>
				 <br>
				 <br>
				
				</form>
				 <br>
				 <br>
				 <br>
				<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising.</p>
				
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