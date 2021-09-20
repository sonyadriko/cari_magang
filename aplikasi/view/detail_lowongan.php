<?php 
session_start();
if ($_SESSION['hak_akses'] == 3) { 
	require ('template/header_siswa.php'); 
 } ?>
<?php 
//include '../control/koneksi.php';

	//session_start();

	if (!isset($_SESSION['id_siswa'])) {
    	header("Location: login.php");
	}
	//include '../../class/lowongan_model.php';
	//$model = new LowonganModel();
	$id_lowongan = $_GET['GetID'];
	//$row = $model->getDetailLowongan($id_lowongan);


	$query = mysqli_query($conn, "SELECT * FROM tb_lowongan WHERE id_lowongan = '".$id_lowongan."'");
	while ($row=mysqli_fetch_assoc($query)) {
		$id_lowongan_hidden = $row['id_lowongan'];
		$judul = $row['judul'];
		$jurusan = $row['jurusan'];
		$detail = $row['detail'];	 
		$alamat = $row['alamat'];
		$kota = $row['kota'];
		$tanggal = date("j F, Y",strtotime($row['tanggal']));
		$kuota = $row['kuota'];
	}
	$getFoto = mysqli_query($conn, "SELECT * FROM user_siswa WHERE id_siswa = $_SESSION[id_siswa] ");
	while ($displayfoto=mysqli_fetch_array($getFoto)) {
		$foto_profile = $displayfoto['foto_siswa'];
	}
	
	
?>

<!--inner block start here-->
<style type="text/css">
	table tr td {
		font: sans-serif;
		font-size: 16px;
		padding: 5px;
	}
</style>
<div class="inner-block">
	<table>
		<tr>
			<td>Judul </td>
			<td>:</td>
			<td><?php echo $judul ?></td>
		</tr>
		<tr>
			<td>Jurusan</td>
			<td>:</td>
			<td><?php echo $jurusan; ?></td>
		</tr>
		<tr>
			<td>Detail</td>
			<td>:</td>
			<td><?php echo $detail ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><?php echo $alamat ?></td>
		</tr>
		<tr>
			<td>Kota</td>
			<td>:</td>
			<td><?php echo $kota ?></td>
		</tr>
		<!--<tr>
			<td>Tanggal</td>
			<td>:</td>
			<td><?php echo date("j F, Y",strtotime($tanggal)); ?></td>
		</tr>-->
		<tr>
			<td>Kuota</td>
			<td>:</td>
			<td><?php echo $kuota ?></td>
		</tr>
	</table>
	<input type="hidden" name="id_lowongannn" value="<?php echo $id_lowongan_hidden ?>">
	<br>
						
	<a href="index.php" style="text-decoration: none; list-style: none; padding: 10px;"><button name="update" class="btn" style="padding: 16px; font-size: 16px;">back</button></a>
	<a href="daftar_lowongan.php?GetID=<?php echo $id_lowongan_hidden ?>" style="text-decoration: none; list-style: none;"><button name="update" class="btn" style="padding: 16px; font-size: 16px;">Daftar</button></a>

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