<?php

include '../control/koneksi.php';

if (isset($_POST['upload'])) {
	# code...
	//$id_lowongan = $_GET['GetID'];
	$id_lowongan = $_POST['id_lowongan_baru'];
	$tanggal = $_POST['tanggal'];

	$rand = rand();
	$ekstensi = array('png','jpg','jpeg');
	$filenama = $_FILES['foto']['name'];
	$ukuran = $_FILES['foto']['size'];
	$ext = pathinfo($filenama, PATHINFO_EXTENSION);

	if (!in_array($ext, $ekstensi)) {
		echo "<script>alert('ekstensi tidak diperbolehkan.')</script>";
	}else {
		if ($ukuran < 1044000) {

			$bukti = $rand.'_'.$filenama;
			move_uploaded_file($_FILES['foto']['tmp_name'], '../../asset/gambar/'.$rand.'_'.$filenama);


			$query = "UPDATE tb_lowongan SET bukti_transfer = '".$bukti."', tanggal = '".$tanggal."' WHERE id_lowongan = '".$id_lowongan."' ";

			$result = mysqli_query($conn,$query);

			if ($result) {
				# code...
				header("location:../view/index.php");
			}else{
				echo "Error";
			}


		}
	}
}

?>