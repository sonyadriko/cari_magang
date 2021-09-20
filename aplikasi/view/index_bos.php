<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">
	<p>Welcome <?php if ($_SESSION['hak_akses'] == 3) {
						echo "siswa, ",$_SESSION['nama']; 
					} elseif ($_SESSION['hak_akses'] == 2) {
						echo "bos, ",$_SESSION['nama_bos'];
					}
	?>
	</p>
<!--market updates updates-->

	<div class="col-md-12 chit-chat-layer1-left">
               <div class="work-progres">
                            <div class="chit-chat-heading">
                                  Lowongan Terbaru
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>No</th>
                                      <th>Judul</th>
                                      <th>Jurusan</th>                                   
                                                                      
                                      <th>Kota</th>
                                      <th>Kuota</th>
                                      <th>Detail</th>
                                  </tr>
                              </thead>
                              <tbody>
                              	<?php 
                              		$nomor = 1;	
									$get_data = mysqli_query($conn, "select * from tb_lowongan where id_bos = $_SESSION[id_bos] order by judul ");
                              		while ($display=mysqli_fetch_array($get_data)){
										$id_lowongan = $display['id_lowongan'];
										$judul = $display['judul'];
										$jurusan = $display['jurusan'];
										$kota = $display['kota'];
										$max = $display['kuota'];
                              	?>
                              	 <tr>
                                 	<td><?php echo $nomor ?></td>
                                 	<td><?php echo $judul ?></td>
                                 	<td><?php echo $jurusan ?></td>                                                          
                                 	<td><?php echo $kota ?></td>
                                 	<td><?php echo $max ?></td>
									<td><a href='detail_lowongan.php?GetID=<?php echo $id_lowongan ?>'><input type='submit' value='Detail' id='detailbtn'></a></td>

                              </tr>
                              <?php
                              $nomor++;
                         	}
                       	?>	
                          </tbody>
                      </table>
                  </div>
             </div>
      </div>
<a href="tambah_lowongan.php"><button>tambah lowongan</button></a>
<a href="lihat_lamaran_bos.php"><button>Lihat lamaran</button></a>
      
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

<script>
var toggle = true;
            
$(".sidebar-icon").click(function() {                
  if (toggle)
  {
    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
    $("#menu span").css({"position":"absolute"});
  }
  else
  {
    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
    setTimeout(function() {
      $("#menu span").css({"position":"relative"});
    }, 400);
  }               
                toggle = !toggle;
            });
</script>
<!--scrolling js-->
		<script src="../../asset/js/jquery.nicescroll.js"></script>
		<script src="../../asset/js/scripts.js"></script>
		<!--//scrolling js-->
<script src="../../asset/js/bootstrap.js"> </script>
<!-- mother grid end here-->
</body>
</html>                     