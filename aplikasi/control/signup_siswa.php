<?php

include 'koneksi.php';

if (isset($_POST['submit'])) {
	# code...
	$nama = $_POST['name'];
	$jkelamin = $_POST['jkelamin'];
	$sekolah = $_POST['sekolah'];
	$jurusan = $_POST['jurusan'];
	$alamat = $_POST['alamat'];
	$nisn = $_POST['nisn'];	
	$kota = $_POST['addkota'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);
	$hak_akses = $_POST['hak_akses'];

	$rand = rand();
	$ekstensi = array('png','jpg','jpeg');
	$filenama = $_FILES['foto_siswa']['name'];
	$ukuran = $_FILES['foto_siswa']['size'];
	$ext = pathinfo($filenama, PATHINFO_EXTENSION);

	$query1 = "SELECT * FROM user_siswa WHERE email = '$email'";
	$result = $conn->query($query1);


	if (!in_array($ext, $ekstensi)) {
		echo "<script>alert('ekstensi tidak diperbolehkan.')</script>";
	
	}else {
		if ($ukuran < 1044000) {

			$foto = $rand.'_'.$filenama;
			move_uploaded_file($_FILES['foto_siswa']['tmp_name'], '../../asset/gambar/'.$rand.'_'.$filenama);

			if ($result->num_rows > 0) {
				# code...
				$message = "Sorry... Email already in use :(";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}else {
				$insertData = "INSERT INTO user_siswa
				(`id_siswa`, `nama`, `jenis_kelamin`, `sekolah`, `jurusan`, `alamat`, `nisn`, `kota`, `email`, `password`, `foto_siswa`, `hak_akses`)
				VALUES(NULL, '$nama', '$jkelamin', '$sekolah', '$jurusan', '$alamat', '$nisn', '$kota', '$email', '$password', '$foto',  '$hak_akses')";

				$insertResult = mysqli_query($conn,$insertData);
				
				if ($insertResult) {
					# code...
					echo "<script>alert('Wow! User Registration Completed.')</script>";
					header("Location:login.php");
				}else {
					//echo "ada yang error";
					var_dump($insertResult);
					die();
				}
				
			}
		}
	}
	
}

?>