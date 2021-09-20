<?php 
	include '../control/koneksi.php';
	session_start();
	require ('template/header_siswa.php'); 

	//include '../control/process_daftar_lowongan.php';
	$id = $_SESSION['id_siswa'];

	if (!isset($_SESSION['id_siswa'])) {
    	header("Location: login.php");
	}

	$id_lowongan = $_GET['GetID'];

	//get profile siswa
	include '../../class/siswa_model.php';
	$model = new SiswaModel();
	$row = $model-> getProfileSiswa($id);

	//apply internship
	$model = new SiswaModel();
	$insert = $model->applyInternship($id_lowongan);

	$getdetaillowongan = mysqli_query($conn, "SELECT * FROM tb_lowongan WHERE id_lowongan = '".$id_lowongan."'");
	while ($row3=mysqli_fetch_assoc($getdetaillowongan)) {
		# code...
		$id_lowongan_baru = $row3['id_lowongan'];
		$id_bos_baru = $row3['id_bos'];
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
			     
				 <h2>Daftar Magang</h2>
				 <form action="" method="POST" enctype="multipart/form-data">

				 <table>

				 	<tr>
				 		<td style="padding-left: 200px;  padding-top: 25px;">Kartu Pelajar </td>
						<td style="padding-top: 25px;"> : </td>

				 		<td style=" padding-top: 25px;"> 
				 			<div class="form-group compose-right">
								<div class="btn btn-default btn-file">
									<i class="fa fa-paperclip"> </i> Kartu Pelajar
									<input type="file" name="ktp">
								</div>
							</div>
						</td>
				 	</tr>
				 	<tr>
				 		<td style="padding-left: 200px;  padding-top: 25px;">Curriculum Vitae </td>
						<td style="padding-top: 25px;"> : </td>

				 		<td style=" padding-top: 25px;">
				 			<div class="form-group compose-right">
								<div class="btn btn-default btn-file">
									<i class="fa fa-paperclip"> </i> Curriculum Vitae
									<input type="file" name="cv">
								</div>
							</div>
						</td>
				 	</tr>
				 	<tr>
				 		<td style="padding-left: 200px;  padding-top: 25px;">Surat Izin Sekolah </td>
						<td style="padding-top: 25px;"> : </td>

				 		<td style=" padding-top: 25px;"> 
				 			<div class="form-group compose-right">
								<div class="btn btn-default btn-file">
									<i class="fa fa-paperclip"> </i> Surat Izin Sekolah
									<input type="file" name="sis">
								</div>
							</div>
						</td>
				 	</tr>
				 	<tr>
				 		<td style="padding-left: 200px;  padding-top: 25px;">Rekap Nilai Raport </td>
						<td style="padding-top: 25px;"> : </td>

				 		<td style=" padding-top: 25px;"> 
				 			<div class="form-group compose-right">
								<div class="btn btn-default btn-file">
									<i class="fa fa-paperclip"> </i> Nilai Raport
									<input type="file" name="raport">
								</div>
							</div>
						</td>
				 	</tr>

				</table>
				<input type="hidden" name="id_lowongan_baruuu" value="<?php echo $id_lowongan_baru ?>">
				<input type="hidden" name="id_bos_baruuu" value="<?php echo $id_bos_baru ?>">
				<input type="hidden" name="status" value="1">
				<br>
				<p style="text-align: left;">*file dalam bentuk pdf/doc	</p>
				<br>
				
				<button name="submit_lowongan">Daftar Magang</button>



				 <br>
				 <br>
				 <br>
				
				</form>
				<a href="index.php" style="text-decoration: none; list-style: none;"><button name="back" class="btn">back</button></a>
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
