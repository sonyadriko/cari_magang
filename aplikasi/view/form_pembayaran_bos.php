
<?php 
include '../control/koneksi.php';

	session_start();
	require ('template/header_bos.php'); 


	if (!isset($_SESSION['id_bos'])) {
    	header("Location: login.php");
	}

	$id_lowongan = $_GET['GetID'];

	$query = mysqli_query($conn, "SELECT * FROM tb_lowongan WHERE id_lowongan = '".$id_lowongan."'");
	while ($row=mysqli_fetch_assoc($query)) {
		$id_lowongan_baru = $row['id_lowongan'];
		$judul = $row['judul'];
		$jurusan = $row['jurusan'];
		$detail = $row['detail'];
		$alamat = $row['alamat'];
		$bukti_tf = $row['bukti_transfer'];
		$status = $row['status'];	
	}


?>

<!--inner block start here-->

<div class="inner-block">
	<p>Proses pembayaran agar lowongan aktif selama 14 hari bisa melalui TRANSFER BANK atau E-WALLET</p>
	<br>
	<form action="../control/process_bukti_transfer.php" method="POST" enctype="multipart/form-data">
	<table>
		<tr>
			<td>BCA </td>
			<td>:</td>
			<td>5190171487 A. N. Sony Adi Adriko</td>
		</tr>
		<tr>
			<td>DANA</td>
			<td>:</td>
			<td>085850319392 A. N. Sony Adi Adriko</td>
		</tr>
		<tr>
			<td>OVO</td>
			<td>:</td>
			<td>085850319392 A. N. Sony Adi Adriko</td>
		</tr>
		<tr>
			<td>Nominal sebesar</td>
			<td>:</td>
			<td>Rp. 15.000</td>
		</tr>
		<tr>
			<td>Notes/Berita Acara</td>
			<td>:</td>
			<td><?php echo $_SESSION['nama_bos'], "_", $judul; ?></td>
		</tr>
		<tr>
			<td>Upload Bukti Pembayaran</td>
			<td>:</td>
			<td>
				<div class="form-group compose-right">
					<div class="btn btn-default btn-file">
						<i class="fa fa-paperclip"> </i> Bukti Pembayaran
						<input type="file" name="foto">
					</div>
				</div>
			</td>
		</tr>

		
	</table>

	<input type="hidden" name="id_lowongan_baru" value="<?php echo $id_lowongan_baru ?>">
	<input type="hidden" name="tanggal" value="<?php echo date("Y-m-d"); ?>">


	<br>
	<p style="font-style: italic;"><b>Pastikan nominal dan notes / berita acara sesuai</b> </p>
	<input type="hidden" name="id_lowongan" value="<?php echo $id_lowongan_hidden ?>">
	<br>				

	<button name="upload" class="btn">Kirim Bukti Transfer</button>
	</form>
	<a href="index.php" style="text-decoration: none; list-style: none;"><button name="update" class="btn">back</button></a>


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
 