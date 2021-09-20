<?php

include 'koneksi.php';
	
//session_start();

if (isset($_POST['submit'])) {
	# code...
	//$id_lowongan = $_POST['id_lowongan_baru'];
	//$id_lowongan = $_GET['GetID'];
	
	$id_siswa = $_SESSION['id_siswa'];
	$id_lowongan_baru = $_POST['id_lowongan_baruuu'];
	$id_bos = $_POST['id_bos_baruuu'];
	$status = $_POST['status'];

	$rand = rand();
	$ekstensi = array('pdf','doc');

	$filektp = $_FILES['ktp']['name'];
	$filecv = $_FILES['cv']['name'];
	$filesis = $_FILES['sis']['name'];
	$fileraport = $_FILES['raport']['name'];

	$ukuranktp = $_FILES['ktp']['size'];
	$ukurancv = $_FILES['cv']['size'];
	$ukuransis = $_FILES['sis']['size'];
	$ukuranraport = $_FILES['raport']['size'];

	$file_tmp_ktp = $_FILES['ktp']['tmp_name'];	
	$file_tmp_cv = $_FILES['cv']['tmp_name'];	
	$file_tmp_sis = $_FILES['sis']['tmp_name'];	
	$file_tmp_raport = $_FILES['raport']['tmp_name'];	

	$ext_ktp = pathinfo($filektp, PATHINFO_EXTENSION);
	$ext_cv = pathinfo($filecv, PATHINFO_EXTENSION);
	$ext_sis = pathinfo($filesis, PATHINFO_EXTENSION);
	$ext_raport = pathinfo($fileraport, PATHINFO_EXTENSION);

	if (!in_array($ext_ktp, $ekstensi)) {
		echo "<script>alert('ekstensi tidak diperbolehkan.')</script>";
	}else if (!in_array($ext_cv, $ekstensi)) {
		echo "<script>alert('ekstensi tidak diperbolehkan.')</script>";
	}else if (!in_array($ext_sis, $ekstensi)) {
		echo "<script>alert('ekstensi tidak diperbolehkan.')</script>";
	}else if (!in_array($ext_raport, $ekstensi)) {
		echo "<script>alert('ekstensi tidak diperbolehkan.')</script>";
	}else {
		if ($ukuranktp < 1044000) {
			if ($ukurancv < 1044000) {
				if ($ukuransis < 1044000) {
						if ($ukuranraport < 1044000) {
						# code...
						$xktp = $rand.'_'.$filektp;
						move_uploaded_file($file_tmp_ktp, 'document/'.$rand.'_'.$filektp);

						$xcv = $rand.'_'.$filecv;
						move_uploaded_file($file_tmp_cv, 'document/'.$rand.'_'.$filecv);

						$xsis = $rand.'_'.$filesis;
						move_uploaded_file($file_tmp_sis, 'document/'.$rand.'_'.$filesis);

						$xraport = $rand.'_'.$fileraport;
						move_uploaded_file($file_tmp_raport, 'document/'.$rand.'_'.$fileraport);

						//$insertfile = "INSERT INTO tb_lamaran (`id_lamaran`, `ktp`) VALUES (NULL, '$xktp')";

						$insertData = "INSERT INTO tb_lamaran
						(`id_lamaran`, `id_lowongan`, `id_bos`, `id_siswa`, `ktp`, `cv`, `sis`, `raport`, `status_lamaran`) 
						VALUES (NULL, '$id_lowongan_baru' ,'$id_bos', '$id_siswa', '$xktp', '$xcv', '$xsis', '$xraport', '$status')";

						$insertResult = $this->conn->query($insertData);
						//$insertResult = mysqli_query($conn,$insertData);

						//$insertResult = mysqli_query($conn,$insertfile);
					
						if ($insertResult) {
							# code...
							echo "<script>alert('Berhasil membuat lowongan baru.')</script>";
							header("Location:index.php");
						}else {
							echo "ada yang error";
							var_dump($insertResult);
							echo "<script>alert('Gagal membuat lowongan baru.')</script>";
						}
	
					}
				}
			}

			
		}

	}
}
?>