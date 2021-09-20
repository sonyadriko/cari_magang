<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php 
include '../control/koneksi.php';

	session_start();
	require ('template/header_bos.php'); 


	if (!isset($_SESSION['id_bos'])) {
    	header("Location: login.php");
	}
?>
<!--inner block start here-->
<div class="inner-block">
	<p>Welcome <?php if ($_SESSION['hak_akses'] == 3) {
						echo "siswa, ",$_SESSION['nama']; 
					} elseif ($_SESSION['hak_akses'] == 2) {
						echo "bos, ",$_SESSION['nama_bos'];
					}
	?>
	</p>
	<br><br>
<!--market updates updates-->
	<div class="col-md-12 chit-chat-layer1-left">
               <div class="work-progres">
                            <div class="chit-chat-heading">
                                  Lamaran Saya
                            </div>
                            <br>
                            <div class="table-responsive">
                            	<?php
  																$nomor = 1;

                            		if ($nomor>0) {
                            	?>
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>No</th>
                                      <th>Judul Lowongan</th>
                                      <th>Nama</th>
                                      <th>Jurusan</th>                                   
                                                                      
                                      <th>Sekolah</th>
                                      <th>Kota</th>
                                      <th>Status</th>
                                      <th>Detail</th>
                                  </tr>
                              </thead>
                              <tbody>
                              	<?php 
																	$get_data = mysqli_query($conn, "select * from tb_lamaran where id_bos = $_SESSION[id_bos] ");
                              		while ($row=mysqli_fetch_array($get_data)){
																		$id_lamaran = $row['id_lamaran'];
																		$id_lowongan = $row['id_lowongan'];
																		$id_siswa = $row['id_siswa'];
																		$status = $row['status_lamaran'];
																		$get_data2 = mysqli_query($conn, "select * from user_siswa where id_siswa = '".$id_siswa."'");
																		while ($row2=mysqli_fetch_array($get_data2)) {
																			# code...
																			$nama = $row2['nama'];
																			$jurusan = $row2['jurusan'];
																			$sekolah = $row2['sekolah'];	
																			$kota = $row2['kota'];

																			$get_data3 = mysqli_query($conn, "select * from tb_lowongan where id_lowongan = '".$id_lowongan."'");
																			while($row3=mysqli_fetch_array($get_data3)){
																				$judul = $row3['judul'];
                              	?>
                              	 <tr>
                                 	<td><?php echo $nomor ?></td>
                                 	<td><?php echo $row3['judul'] ?></td>

                                 	<td><?php echo $row2['nama'] ?></td>
                                 	<td><?php echo $row2['jurusan'] ?></td>                                                          
                                 	<td><?php echo $row2['sekolah'] ?></td>
                                 	<td><?php echo $row2['kota'] ?></td>
                                 	<td><?php if ($row['status_lamaran'] == 1) {
                                 		echo "Proses";
                                 	} elseif ($row['status_lamaran'] == 2) {
                                 		echo "Diterima";
                                 	} elseif ($row['status_lamaran'] == 3) {
                                 		echo "Ditolak";
                                 	} ?></td>
																	<td><a href='detail_lamaran_bos.php?GetID=<?php echo $row['id_lamaran'] ?>'><input type='submit' value='Detail Lamaran' id='EditStatusBtn'></a></td>
                              </tr>
                              <?php
                              $nomor++;
                         		}
                         	}
                         }
                        }else{
                        	echo "Belum ada siswa yang melamar";
                        }
                       	?>	
                        </tbody>
                    </table>
                </div>
            </div>
     	</div>
     	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	
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
<?php require('template/slider_menu_bos.php'); ?>
