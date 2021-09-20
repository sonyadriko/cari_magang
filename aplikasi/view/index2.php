<?php 
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
						echo "siswa, ",$_SESSION['nama']; 
					} elseif ($_SESSION['hak_akses'] == 2) {
						echo "bos, ",$_SESSION['nama_bos'];
					}
	?>
	</p>

<!-- lowongan tersedia
	inner block start here-->
<div class="inner-block">
	<p>Welcome <?php if ($_SESSION['hak_akses'] == 3) {
						echo "siswa, ",$_SESSION['nama']; 
					} elseif ($_SESSION['hak_akses'] == 2) {
						echo "bos, ",$_SESSION['nama_bos'];
					}
	?>
	</p>
<!--market updates updates-->
	<?php if ($_SESSION['hak_akses'] == 3) { ?>
	<div class="col-md-12 chit-chat-layer1-left">
               <div class="work-progres">
                            <div class="chit-chat-heading">
                                  Lamaran Saya
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>No</th>
                                      <th>Judul Lamaran</th>
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


																	$model = new LowonganModel();
																	$row = $model->getLowongan();
																	if (!empty($row)) {
																		foreach ($row as $row) {
																		//}
																	//}
																	$id_lowongan = $row['id_lowongan']; 
															

                              		$nomor = 1;	

																	$get_data = mysqli_query($conn, "select * from tb_lamaran where id_bos = $_SESSION[id_bos] ");
                              		while ($display=mysqli_fetch_array($get_data)){
																		$id_lamaran = $display['id_lamaran'];
																		$id_lowongan = $display['id_lowongan'];
																		$id_siswa = $display['id_siswa'];
																		$status = $display['status_lamaran'];
																		$get_data2 = mysqli_query($conn, "select * from user_siswa where id_siswa = '".$id_siswa."'");
																		while ($display2=mysqli_fetch_array($get_data2)) {
																			# code...
																			$nama = $display2['nama'];
																			$jurusan = $display2['jurusan'];
																			$sekolah = $display2['sekolah'];	
																			$kota = $display2['kota'];

																			$get_data3 = mysqli_query($conn, "select * from tb_lowongan where id_lowongan = '".$id_lowongan."'");
																			while($display3=mysqli_fetch_array($get_data3)){
																				$judul = $display3['judul'];

                              	?>
                              	 <tr>
                                 	<td><?php echo $nomor ?></td>
                                 	<td><?php echo $judul ?></td>

                                 	<td><?php echo $nama ?></td>
                                 	<td><?php echo $jurusan ?></td>                                                          
                                 	<td><?php echo $sekolah ?></td>
                                 	<td><?php echo $kota ?></td>
                                 	<td><?php if ($status == 1) {
                                 		echo "Proses";
                                 	} elseif ($status == 2) {
                                 		echo "Diterima";
                                 	} elseif ($status == 3) {
                                 		echo "Ditolak";
                                 	} ?></td>
									<td><a href='detail_lamaran_bos.php?GetID=<?php echo $id_lamaran ?>'><input type='submit' value='Detail Lamaran' id='EditStatusBtn'></a></td>

                              </tr>
                              <?php
                              $nomor++;
                         		}
													}

                         }
                       	?>	
                        </tbody>
                    </table>
                </div>
            </div>
     	</div>
	
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
