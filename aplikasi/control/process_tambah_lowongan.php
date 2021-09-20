<?php

include 'koneksi.php';

session_start();

if (isset($_POST['submit'])) {
	# code...
	$id_bos = $_SESSION['id_bos'];
	$judul = $_POST['judul'];
	$jurusan = $_POST['jurusan'];
	$alamat = $_POST['alamat'];
	$jpelamar = $_POST['jumlah'];	
	$kota = $_POST['addkota'];
	$detail = $_POST['detail'];
	$tanggal = $_POST['tanggal'];
	$status = $_POST['status'];
	date_default_timezone_set('Asia/Jakarta');
	$date = date("Y-m-d H:i:s");	

	$rand = rand();
	$ekstensi = array('png','jpg','jpeg');
	$filenama = $_FILES['foto']['name'];
	$ukuran = $_FILES['foto']['size'];
	$ext = pathinfo($filenama, PATHINFO_EXTENSION);

	if (!in_array($ext, $ekstensi)) {
		echo "<script>alert('ekstensi tidak diperbolehkan.')</script>";
	
	}else {
		if ($ukuran < 1044000) {

			$xx = $rand.'_'.$filenama;
			move_uploaded_file($_FILES['foto']['tmp_name'], '../../asset/gambar/'.$rand.'_'.$filenama);

			$insertData = "INSERT INTO tb_lowongan
			(`id_lowongan`, `id_bos`, `judul`, `jurusan`, `detail`, `alamat`, `gambar`, `kota`, `tanggal`, `kuota`, `status`) 
			VALUES (NULL, $id_bos, '$judul', '$jurusan', '$detail', '$alamat', '$xx', '$kota', '$date', '$jpelamar', '$status')";

			$insertResult = mysqli_query($conn,$insertData);
		
			if ($insertResult) {
				# code...
				echo "<script>alert('Berhasil membuat lowongan baru.')</script>";
				header("Location:index.php");
			}else {
				//echo "ada yang error";
				var_dump($insertResult);
				die();
			}
	
		}

	}
}
?>