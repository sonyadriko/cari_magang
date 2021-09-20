<?php 
	//include '../control/process_tambah_lowongan.php';

	session_start();

	

	require ('template/header_bos.php'); 
	if (!isset($_SESSION['id_bos'])) {
    	header("Location: login.php");
	}

	include '../../class/bos_model.php';
	$model = new BosModel();
	$insert = $model->addLowongan();


?>
<!--inner block start here-->
<div class="signup-page-main">
     <div class="signup-main">  	
    	 <div class="signup-head">
			</div>
			<div class="signup-block">
				<h2>Buat Lowongan Baru</h2>
				<br>
				<br>
				<form action="tambah_lowongan.php" method="POST" enctype="multipart/form-data">
					
					<p>Judul</p>
					<input type="text" name="judul" placeholder="Judul" required>
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
					<p>Alamat</p>
					<input type="text" name="alamat" placeholder="Alamat" required>
					<p>Jumlah pelamar yang dibutuhkan</p>
					<input type="number" name="jumlah" placeholder="0" style="width: 410px;" required>
					<br>
					<br>
					<p>Kota</p>
                        	<select class="form-control" name="addkota" id="addkota" required>
                          		<option>Kota</option>
                          		<option value="kediri">Kediri</option>
                          		<option value="Lamongan">Lamongan</option>
                          		<option value="Madiun">Madiun</option>
                          		<option value="Malang">Malang</option>
                          		<option value="Mojokerto">Mojokerto</option>
                          		<option value="Pasuruan">Pasuruan</option>
                          		<option value="Sidoarjo">Sidoarjo</option>
                          		<option value="Surabaya">Surabaya</option>
                        	</select>         
                        	<br>
					<p>Detail Lowongan</p>

                    	
					<div class="inbox-details-body">
						<textarea rows="6" name="detail" value="Detail :" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Detail';}">Detail</textarea>
					</div>
					<br>	
					<input type="hidden" name="tanggal" value="<?php $timestamp = date("Y-m-d H:i:s"); ?>">
					<input type="hidden" name="status" value="1">
				
					<input type="submit" name="add_lowongan" value="Buat lowongan">
																		
				</form>
				<div class="sign-down">
					
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
