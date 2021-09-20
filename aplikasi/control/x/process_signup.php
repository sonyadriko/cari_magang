<?php

	include 'koneksi.php';

//	if (isset($_POST['submit'] && $_POST['submit'] != '' && $_POST['submit'] != null)) {
	//if (isset($_POST['submit'])) {

		$name = "";
		$email = "";
		$password = "";
		$cpassword = "";

		if (isset($_POST['submit'])) {
			# code...
		
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$cpassword = md5($_POST['cpassword']);

		//print_r($_POST);
		//if ($_POST['name'] !='' && $_POST['email'] !='' && $_POST['password'] !='' && $_POST['cpassword']) {

			if ($password == $cpassword) {
				
				$query1 = "SELECT * FROM user WHERE email = '$email'";
				//$result = mysqli_query($conn, $query1);

				$result = $conn->query($query1);
				//var_dump($result);
				if ($result->num_rows > 0) {	
					//echo "<script>alert('Email already in use :(')</script>";
					header("Location: ../signup.php");	
					$message = "Sorry... Email already in use :(";
					echo "<script type='text/javascript'>alert('$message');</script>";
					$email_error = "Sorry... Email already in use :(";

				}else {
					$insertData = "INSERT INTO user (`id_user`,
					`name`,
					`email`,
					`password`) 
					VALUES (NULL, '$name', '$email', '$password')";

					$insertResult = $conn->query($insertData);

					if ($insertResult) {
						echo "<script>alert('Wow! User Registration Completed.')</script>";
						header("Location: ../login.html");
					} else {
						echo "<script>alert('Password Not Matched.')</script>";	
						var_dump($insertData);
					}
				}
			} else {
					echo "maaf username dan password anda salah";
			}
			# code...
		/*} else {
			if ($_POST['name'] == '') {
				# code...
				echo "name is empty";
			} 
			if ($_POST['email'] == '') {
				# code...
				echo "email is empty";
			} 
			if ($_POST['password'] == '') {
				# code...
				echo "password is empty";
			} 
			if ($_POST['cpassword'] == '') {
				# code...
				echo "cpassword is empty";
			} */
		//}

		}
	//}

?>