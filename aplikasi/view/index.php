<?php 
include '../control/koneksi.php';

session_start();


if ($_SESSION['hak_akses'] == 3) { 
	require ('template/header_siswa.php'); 
 } elseif ($_SESSION['hak_akses'] == 2) {
 	require ('template/header_bos.php');
 } else {
	header("Location:../view/login.php");
 }

include '../../class/lowongan_model.php';
 ?>
<!--inner block start here-->
<div class="inner-block">
	<p>Welcome <?php if ($_SESSION['hak_akses'] == 3) {
						echo "siswa, ",$_SESSION['nama']; ?>
						<br>
						<br>
						<h1>Cari sesuai jurusan</h1>
					<?php } elseif ($_SESSION['hak_akses'] == 2) {
						echo "bos, ",$_SESSION['nama_bos'];
					}
	?>
	</p>
	<br><br><br>		
<!--show lowongan tersedia-->
	<?php if ($_SESSION['hak_akses'] == 3) { ?>
		<?php 
			$sql = "select jurusan from tb_lowongan";
			$ex = mysqli_query($conn,$sql); 
		?>
		<div class="col-md-12 chit-chat-layer1-left">
			<div class="col-md-3 product-grid">
	    		<div class="product-items">
		    		<div class="produ-cost">
		    			<br><br>
		    			<h2 style="color: white; text-align: center;" >Rekayasa Perangkat Lunak</h2>
		    		</div>
	    		</div>
	    	</div>
	    	<div class="col-md-3 product-grid">
	    		<div class="product-items">
		    		<div class="produ-cost">
		    			<br><br>
		    			<h2 style="color: white; text-align: center;" >Teknik Komputer & Jaringan</h2>
		    		</div>
	    		</div>
	    	</div>
	    	<div class="col-md-3 product-grid">
	    		<div class="product-items">
		    		<div class="produ-cost">
		    			<br><br><br><br>
		    			<a href="lihat_lowongan_2.php?GetJurusan=<?php $ex ?>"><h2 style="color: white; text-align: center;" >Animasi</h2>
		    		</div>
	    		</div>
	    	</div>
	    	<div class="col-md-3 product-grid">
	    		<div class="product-items">
		    		<div class="produ-cost">
		    			<br><br><br><br>
		    			<h2 style="color: white; text-align: center;" >Audio Video</h2>
		    		</div>
	    		</div>
	    	</div>
	    	<div class="col-md-3 product-grid">

	    		<div class="product-items">
		    		<div class="produ-cost">
		    			<br><br><br><br>
		    			<h2 style="color: white; text-align: center;" >Multimedia</h2>
		    		</div>
	    		</div>
	    	</div>
			<?php //   }
		//	} ?>
    	</div>
    	<div class="clearfix"> </div>
	<?php } elseif ($_SESSION['hak_akses'] == 2) { ?>
		<div class="col-md-12 chit-chat-layer1-left">
		<?php $i = 1; ?>
		<?php
			$model = new LowonganModel();
			$rowbos = $model->getLowonganBos();
			if (!empty($rowbos)) {
				foreach ($rowbos as $rowbos) {
			/*$get_data = mysqli_query($conn, "select * from tb_lowongan where id_bos = $_SESSION[id_bos] order by judul ");
			while ($display = mysqli_fetch_assoc($get_data)) { 
			$id_lowongan = $display['id_lowongan']; 
			$status = $display['status']; 
			$buktitf = $display['bukti_transfer'];
			$exp = $display['exp'];*/ ?>
			<div class="col-md-3 product-grid">
	    		<div class="product-items">
		    		<div class="produ-cost">
		    			<br>
		    			<h4><b><?php echo $rowbos['judul']; ?></b></h4>
		    			<h5><?php echo $rowbos['nama_perusahaan'] ?></h5>
		    			<br>
		    			<h5>Kuota : <?php echo $rowbos['kuota']," siswa"; ?></h5>
		    			<br>
		    			<h5>Status : <?php if ($rowbos['status'] == 1 && $rowbos['bukti_transfer'] == NULL) {
		    				echo "Belum Bayar";
		    			} elseif ($rowbos['status'] == 1 && $rowbos['bukti_transfer'] != NULL) {
		    				echo "Proses Konfirmasi";
		    			} elseif ($rowbos['status'] == 2) {
		    				// code...
		    				echo "Aktif Sampai ",$rowbos['exp'];
		    			} elseif ($rowbos['status'] == 3) {
		    				// code...
		    			} ?></h5>
		    			<br>
		    			<?php if ($rowbos['status'] == 1 && $rowbos['bukti_transfer'] == NULL) { ?>
		    				<a href='form_pembayaran_bos.php?GetID=<?php echo $rowbos['id_lowongan'] ?>'><input type='submit' value='Bayar biaya' id='detailbtn'></a>	
		    			<?php } elseif ($rowbos['status'] == 1 && $rowbos['bukti_transfer'] != NULL) {
		    				//echo "Proses Konfirmasi";
		    			} ?>
		    		</div>
	    		</div>
	    	
	    	</div>
	    		<?php
	    		}
			
    		 } ?>

    	</div>
	<?php 	} ?>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
	 <p>© 2016 Shoppy. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
</div>	
<!--COPY rights end here-->
</div>
</div>
<?php
if ($_SESSION['hak_akses'] == 3) { 
	require ('template/slider_menu.php'); 
 } elseif ($_SESSION['hak_akses'] == 2) {
 	require ('template/slider_menu_bos.php');
 } ?>