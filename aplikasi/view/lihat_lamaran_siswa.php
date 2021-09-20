<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php 
include '../control/koneksi.php';

	session_start();
	require ('template/header_siswa.php'); 

	if (!isset($_SESSION['id_siswa'])) {
    	header("Location: login.php");
	}//elseif (!isset($_SESSION['id_bos'])) {
    	//header("Location: login.php");
	//}
	$getFoto = mysqli_query($conn, "SELECT * FROM user_siswa WHERE id_siswa = $_SESSION[id_siswa] ");
	while ($displayfoto=mysqli_fetch_array($getFoto)) {
		$foto_profile = $displayfoto['foto_siswa'];
	}
?>
<!--inner block start here-->
<div class="inner-block">
	<p>Welcome <?php if ($_SESSION['hak_akses'] == 3) {
						echo "siswa, ",$_SESSION['nama']; ?>
						<br>
						<br>
						<br>
					<?php } elseif ($_SESSION['hak_akses'] == 2) {
						echo "bos, ",$_SESSION['nama_bos'];
					}
	?>
	</p>
<!--market updates updates-->

	<div class="col-md-12 chit-chat-layer1-left">
               <div class="work-progres">
                            <div class="chit-chat-heading">
                                  Lamaran Saya
                                  <br>
                                  <br>
                            </div>
                            <div class="table-responsive">
                            	<?php 
                              		$nomor = 1;
																	if ($nomor > 0) {
																		?>
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>No</th>
                                      <th>Judul</th>
                                      <th>Jurusan</th>                                   
                                                                      
                                      <th>Kota</th>
                                      <th>Kuota</th>
                                      <th>Status</th>
                                  </tr>
                              </thead>
                              <tbody>
																		<?php
																		$get_data = mysqli_query($conn, "select * from tb_lamaran where id_siswa = $_SESSION[id_siswa] ");
                              			while ($row=mysqli_fetch_array($get_data)){
																		$id_lamaran = $row['id_lamaran'];
																		$id_lowongan = $row['id_lowongan'];
																		$status = $row['status_lamaran'];
																		$get_data2 = mysqli_query($conn, "select * from tb_lowongan where id_lowongan = '".$id_lowongan."'");
																		while ($row2=mysqli_fetch_array($get_data2)) {
																			$judul = $row2['judul'];
																			$jurusan = $row2['jurusan'];
																			$kota = $row2['kota'];	
																			$max = $row2['kuota'];		
                              			?>
		                              		<tr>
		                                 		<td><?php echo $nomor ?></td>
		                                 		<td><?php echo $row2['judul'] ?></td>
		                                 		<td><?php echo $row2['jurusan'] ?></td>                                                          
		                                 		<td><?php echo $row2['kota'] ?></td>
		                                 		<td><?php echo $row2['kuota'] ?></td>
		                                 		<td><?php if ($row['status_lamaran'] == 1) {
		                                 			echo "Proses";
		                                 		} elseif ($row['status_lamaran'] == 2) {
		                                 			echo "Diterima";
		                                 		} elseif ($row['status_lamaran'] == 3) {
		                                 			echo "Ditolak";
		                                 		} ?></td>
		                             			</tr>
		                              		<?php
		                              		$nomor++;
		                         					}	
		                       					}
																	}else{
																		echo "Belum melamar magang";
																	}
																	
                       	?>	
                        </tbody>
                    </table>
                </div>
            </div>
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
<?php require('template/slider_menu.php'); ?>