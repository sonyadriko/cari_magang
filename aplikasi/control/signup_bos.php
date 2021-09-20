<?php

include 'koneksi.php';

if (isset($_POST['submit'])) {
	# code...
	$nama = $_POST['name'];
	$perusahaan = $_POST['perusahaan'];
	$bidang = $_POST['bidang'];
	$alamat = $_POST['alamat'];	
	$kota = $_POST['addkota'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$hak_akses = $_POST['hak_akses'];

	$rand = rand();
	$ekstensi = array('png','jpg','jpeg');
	$filenama = $_FILES['foto_bos']['name'];
	$ukuran = $_FILES['foto_bos']['size'];
	$ext = pathinfo($filenama, PATHINFO_EXTENSION);

	$query1 = "SELECT * FROM user_bos WHERE email = '$email'";
	$result = $conn->query($query1);

	if (!in_array($ext, $ekstensi)) {
			echo "<script>alert('ekstensi tidak diperbolehkan.')</script>";
		
	}else {
		if ($ukuran < 1044000) {

			$foto = $rand.'_'.$filenama;
			move_uploaded_file($_FILES['foto_bos']['tmp_name'], '../../asset/gambar/'.$rand.'_'.$filenama);

			if ($result->num_rows > 0) {
			
				$message = "Sorry... Email already in use :(";
				echo "Sorry... Email already in use :(";
			}else {

				$insertData = "INSERT INTO user_bos
				(`id_bos`, `nama`, `nama_perusahaan`, `bidang`, `alamat`, `kota`, `email`, `password`, `hak_akses`, `foto_bos`)
				VALUES(NULL, '$nama', '$perusahaan', '$bidang', '$alamat', '$kota', '$email', '$password', '$hak_akses', '$foto')";

				$insertResult = mysqli_query($conn,$insertData);
			
				if ($insertResult) {
				
					echo "<script>alert('Wow! User Registration Completed.')</script>";
					header("Location:login.php");
				}else {
					echo "ada yang error";
					var_dump($insertResult);
					die();
				}
			
			}
		}
	}
	
}

?>