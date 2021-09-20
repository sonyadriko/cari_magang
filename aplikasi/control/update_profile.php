<?php

include 'koneksi.php';

	if (isset($_POST['update'])) {
		
		$id_siswa = $_GET['id'];
		$nama = $_POST['nama'];
		$sekolah = $_POST['sekolah'];
		$jurusan = $_POST['jurusan'];
		$alamat = $_POST['alamat'];
		$nisn = $_POST['nisn'];
		$kota = $_POST['kota'];
		//$foto = $_POST['foto'];

		//$rand = rand();
		//$ekstensi = array('png','jpg','jpeg');
		//$filenama = $_FILES['foto']['name'];
		//$ukuran = $_FILES['foto']['size'];
		//$ext = pathinfo($filenama, PATHINFO_EXTENSION);

		 
		//$foto = $rand.'_'.$filenama;
		//move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar/'.$rand.'_'.$filenama);

		$query = "update user_siswa set nama = '".$nama."', sekolah = '".$sekolah."', jurusan = '".$jurusan."', alamat = '".$alamat."', nisn = '".$nisn."', kota = '".$kota."' where id_siswa = '".$id_siswa."'"; 
		$result = mysqli_query($conn, $query);

		if ($result) {
			
			header("location:../view/profile.php");
		}else{
			header('please check again');
		}
	}

?>