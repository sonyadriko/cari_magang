<?php
session_start();


if ($_SESSION['hak_akses'] == 3) { 
	require ('template/header_siswa.php'); 
 }else {
	header("Location:../view/login.php");
 }

include '../../class/lowongan_model.php';
 

?>
<!--inner block start here-->
<div class="inner-block">
	<p>Welcome <?php echo "siswa, ",$_SESSION['nama'];  ?></p>

	<br>
	<br>
	<br>
	
<!--show lowongan tersedia-->
	
	<div class="col-md-12 chit-chat-layer1-left">

	<?php
		$model = new LowonganModel();
		$row = $model->getLowongan();
		if (!empty($row)) {
			foreach ($row as $row) {
			//}	
		//}
	?>
		<?php $id_lowongan = $row['id_lowongan']; ?>
		<div class="col-md-3 product-grid">
    		<div class="product-items">
	    		    <!--<div class="project-eff">
						<div id="nivo-lightbox-demo"> <p> <a href="../../asset/gambar/<?php echo $row['gambar'] ?>" data-lightbox-gallery="gallery1" id="nivo-lightbox-demo"><span class="rollover1"> </span> </a></p></div>     
							<img class="img-responsive" src="../../asset/gambar/<?php echo $row['gambar'] ?>" alt="">
					</div>-->
	    		<div class="produ-cost">
	    			<br>
	    			<h4><b><?php echo $row['judul']; ?></b></h4>
	    			<h5><?php echo $row['nama_perusahaan'] ?></h5>
	    			<br>
	    			<h5><?php echo $row['jurusan'] ?></h5>
	    			<h5>Kuota : <?php echo $row['kuota']; ?></h5>
	    			<br>
	    			<a href='detail_lowongan.php?GetID=<?php echo $row['id_lowongan'] ?>'><input type='submit' value='Detail Lowongan' id='detailbtn'></a>
	    			<br>
	    		</div>
    		</div>
    	</div>
		<?php    }
		} ?>
	</div>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			
	<div class="clearfix"> </div>

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
