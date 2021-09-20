<?php 
	include 'koneksi.php';
	session_start();


	if (isset($_POST['terima'])) {
		# code...
		$id_lamaran = $_GET['GetID'];
		$sts_terima = $_POST['status_terima'];
		

		$query_terima = "update tb_lamaran set status_lamaran = '".$sts_terima."' where id_lamaran = '".$id_lamaran."' ";
		$resultTerima = mysqli_query($conn,$query_terima);

		if ($resultTerima) {
			# code...
			echo "<script>alert('Siswa diterima.')</script>";
			header("Location:../view/lihat_lamaran_bos.php");
		}else {
			//echo "ada yang error";
			var_dump($resultTerima);
			
		}

	}
	if (isset($_POST['tolak'])) {
		# code...
		$id_lamaran = $_GET['GetID'];
		$sts_tolak = $_POST['status_tolak'];

		$query_tolak = "update tb_lamaran set status_lamaran = '".$sts_tolak."' where id_lamaran = '".$id_lamaran."' ";
		$resultTolak = mysqli_query($conn, $query_tolak);

		if ($resultTolak) {
			# code...
			echo "<script>alert('Siswa ditolak.')</script>";
			header("Location:../view/lihat_lamaran_bos.php");
		}else {
			//echo "ada yang error";
			var_dump($resultTolak);
		
		}

	}
	?>