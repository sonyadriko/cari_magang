<?php

include 'koneksi.php';

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}


session_start();

if (isset($_SESSION['hak_akses'], $_SESSION['id_siswa'], $_SESSION['id_bos'])) {
    header("Location: login.php");
}

		if (isset($_POST['submit'])) {

			$verify = $_POST['verify'];
			$email = $_POST['email'];
			$password = md5($_POST['password']);
	
				if ($verify == 2) {
					# code...
					$query =  "SELECT * FROM user_bos WHERE email = '$email' AND password = '$password' AND hak_akses = $verify";
					$result = $conn->query($query);

					if ($result->num_rows >= 1) {
						$row = mysqli_fetch_assoc($result);
						$_SESSION['id_bos'] = $row['id_bos'];
						$_SESSION['email_bos'] = $row['email'];
						$_SESSION['nama_bos'] = $row['nama'];
						$_SESSION['hak_akses'] = $row['hak_akses'];
						header("location:index.php");
					} else {
						echo "maaf username dan password anda salah";
					}
				}else if ($verify == 3) {
					# code...
					$query2 =  "SELECT * FROM user_siswa WHERE email = '$email' AND password = '$password' AND hak_akses = $verify";
					$result2 = $conn->query($query2);

					if ($result2->num_rows >= 1) {
						$row = mysqli_fetch_assoc($result2);
						$_SESSION['id_siswa'] = $row['id_siswa'];
						$_SESSION['email_siswa'] = $row['email'];
						$_SESSION['nama'] = $row['nama'];
						$_SESSION['hak_akses'] = $row['hak_akses'];
						header("location:index.php");
					} else {
						echo "maaf username dan password anda salah";
					}
				}
			} 

			

			
		


		

?>