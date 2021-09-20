
<?php 
include '../control/koneksi.php';

	session_start();
	require ('template/header_bos.php'); 


	if (!isset($_SESSION['id_bos'])) {
    	header("Location: login.php");
	}

	$id_lamaran = $_GET['GetID'];



	$query = mysqli_query($conn, "SELECT * FROM tb_lamaran WHERE id_lamaran = '".$id_lamaran."'");
	while ($row=mysqli_fetch_assoc($query)) {
		$id_lamaran_baru = $row['id_lamaran'];
		$id_lowongan = $row['id_lowongan'];
		$id_siswa = $row['id_siswa'];
		$ktp = $row['ktp'];
		$cv = $row['cv'];
		$sis = $row['sis'];
		$raport = $row['raport'];
		$status = $row['status_lamaran'];

		$query_siswa = mysqli_query($conn, "SELECT * FROM user_siswa WHERE id_siswa = '".$id_siswa."'");
		while ($row2=mysqli_fetch_assoc($query_siswa)) {
			
			$nama = $row2['nama'];
			$jenis_kelamin = $row2['jenis_kelamin'];
			$jurusan = $row2['jurusan'];
			$sekolah = $row2['sekolah'];	 
			$alamat = $row2['alamat'];
			$nisn = $row2['nisn'];
			$kota = $row2['kota'];
			$notelp = $row2['no_telp'];
		}

		$query_lowongan = mysqli_query($conn, "SELECT * FROM tb_lowongan WHERE id_lowongan = '".$id_lowongan."'");
		while($row3 = mysqli_fetch_assoc($query_lowongan)){
			$judul = $row3['judul'];
		}
		
	}


?>
<style type="text/css">
	table tr td {
		 padding: 10px;
	}
</style>
<!--inner block start here-->
<div class="inner-block">
	<table>
		<tr>
			<td>Nama </td>
			<td>:</td>
			<td><?php echo $nama ?></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>:</td>
			<td><?php echo $jenis_kelamin; ?></td>
		</tr>
		<tr>
			<td>Sekolah</td>
			<td>:</td>
			<td><?php echo $sekolah; ?></td>
		</tr>
		<tr>
			<td>Jurusan</td>
			<td>:</td>
			<td><?php echo $jurusan; ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><?php echo $alamat; ?></td>
		</tr>
		<tr>
			<td>NISN</td>
			<td>:</td>
			<td><?php echo $nisn; ?></td>
		</tr>
		<tr>
			<td>Kota </td>
			<td>: </td>
			<td><?php echo $kota; ?></td>
		</tr>
		<tr>
			<td>Nomor Telepon </td>
			<td>: </td>
			<td><?php echo $notelp; ?></td>
		</tr>
		<tr>
			<td>KTP(kartu pelajar)</td>
			<td> : </td>
			<td><a href="../../asset/document/<?=$ktp; ?>" target="_blank"><?= $ktp; ?></a></td>
		</tr>
		<tr>
			<td>CV</td>
			<td>:</td>
			<td><a href="../../asset/document/<?= $cv; ?>" target="_blank"><?= $cv; ?></a></td>
		</tr>
		<tr>
			<td>Surat Izin Sekolah</td>
			<td>:</td>
			<td><a href="../../asset/document/<?= $sis; ?>" target="_blank"><?= $sis; ?></a></td>
		</tr>
		<tr>
			<td>Raport</td>
			<td>:</td>
			<td><a href="../../asset/document/<?= $raport; ?>" target="_blank"><?= $raport; ?></a></td>
		</tr>
		
	</table>
	<input type="hidden" name="id_lowongan" value="<?php echo $id_lowongan_hidden ?>">
	<br>
	

						
	<a href="lihat_lamaran_bos.php" style="text-decoration: none; list-style: none;"><button name="update" class="btn">back</button></a>
	<form action="../control/proses_status_lamaran.php?GetID=<?php echo $id_lamaran_baru ?>" method="POST">

		<input type="hidden" name="status_terima" value="2">
		<input type="hidden" name="status_tolak" value="3">
		
		<button name="tolak" class="btn">Tolak Siswa</button>
		<button name="terima" class="btn">Terima Siswa</button>
	</form>

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
