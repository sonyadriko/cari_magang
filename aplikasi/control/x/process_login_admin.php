<?php

include 'koneksi.php';

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}


		if (isset($_POST['submit'])) {

		
			$email = $_POST['email'];
			$password = md5($_POST['password']);

			$query =  "SELECT * FROM user_admin WHERE email = '$email' AND password = '$password'";
			$result = $conn->query($query);
	
			if ($result->num_rows >= 1) {
				$row = mysqli_fetch_assoc($result);
				//$_SESSION['id_bos'] = $row['id_bos'];
				//$_SESSION['email'] = $row['email'];
				//$_SESSION['hak_akses'] = $row['hak_akses'];
				header("location:index.php");
			} else {
				echo "maaf username dan password anda salah";
			}
				
			} 

			

			
		


		

?>