<?php

	/**
	 * 
	 */
	class SiswaModel 
	{
		private $servername = 'localhost';
		private $username = 'root';
		private $password = '';
		private $dbname = 'cari_magang';
		private $conn;

		public function __construct()
		{
			try{
				$this->conn = new mysqli($this->servername,$this->username,$this->password,$this->dbname);
			} catch (Exception $e){
				echo "connection failed" . $e>getMessage();
			}
		
		}
		public function addSiswa()
		{	
			if (isset($_POST['submit'])) {
				$nama = $_POST['name'];
				$jkelamin = $_POST['jkelamin'];
				$sekolah = $_POST['sekolah'];
				$jurusan = $_POST['jurusan'];
				$alamat = $_POST['alamat'];
				$nisn = $_POST['nisn'];	
				$kota = $_POST['addkota'];
				$email = $_POST['email'];
				$password = md5($_POST['password']);
				$hak_akses = $_POST['hak_akses'];

				$rand = rand();
				$ekstensi = array('png','jpg','jpeg');
				$filenama = $_FILES['foto_siswa']['name'];
				$ukuran = $_FILES['foto_siswa']['size'];
				$ext = pathinfo($filenama, PATHINFO_EXTENSION);

				$query1 = "SELECT * FROM user_siswa WHERE email = '$email'";
				$result = $this->conn->query($query1);

				if (!in_array($ext, $ekstensi)) {
					echo "ekstensi tidak diperbolehkan";
				}else {
					if ($ukuran < 1044000) {
						$foto = $rand.'_'.$filenama;
						move_uploaded_file($_FILES['foto_siswa']['tmp_name'], '../../asset/gambar/'.$rand.'_'.$filenama);

						if ($result->num_rows>0) {
							// code...
							$message = "Sorry... Email already in use :(";
							echo "Sorry... Email already in use :(";
						}else {
							$insertSiswa = "INSERT INTO user_siswa
							(`id_siswa`, `nama`, `jenis_kelamin`, `sekolah`, `jurusan`, `alamat`, `nisn`, `kota`, `email`, `password`, `foto_siswa`, `hak_akses`)
							VALUES(NULL, '$nama', '$jkelamin', '$sekolah', '$jurusan', '$alamat', '$nisn', '$kota', '$email', '$password', '$foto',  '$hak_akses')";
							$resultSiswa = $this->conn->query($insertSiswa);
							if ($resultSiswa) {
								header("Location:login.php");
							}else{
								echo "Error ";
								var_dump($resultSiswa);	
							}
						}
					}
				}
			}
		}
		public function updateSiswa()
			{
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

					$updateSiswa = "update user_siswa set nama = '".$nama."', sekolah = '".$sekolah."', jurusan = '".$jurusan."', alamat = '".$alamat."', nisn = '".$nisn."', kota = '".$kota."' where id_siswa = '".$id_siswa."'"; 
					$result = $this->conn->query($updateSiswa);

					if ($result) {
						header("location:../view/profile.php");
					}else{
						header('please check again');
					}
				}

			}
		public function getProfileSiswa($id){
			$data = null;
			$showProfile = "SELECT * FROM user_siswa WHERE id_siswa = '$_SESSION[id_siswa]'";
			$getdata = $this->conn->query($showProfile);
			while ($row=$getdata->fetch_assoc()) {
				$data = $row;
			}
			return $data;
		}

		public function applyInternship($idlowongan){
			if (isset($_POST['submit_lowongan'])) {
				// code...
				$id_siswa = $_SESSION['id_siswa'];
				$id_lowongan_baru = $idlowongan;
				//$id_lowongan_baru = $_POST['id_lowongan_baruuu'];
				$id_bos = $_POST['id_bos_baruuu'];
				$status = $_POST['status'];

				$rand = rand();
				$ekstensi = array('pdf','doc','docx');

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
					if ($ukuranktp < 2044000) {
						if ($ukurancv < 2044000) {
							if ($ukuransis < 2044000) {
									if ($ukuranraport < 2044000) {
									# code...
									$xktp = $rand.'_'.$filektp;
									move_uploaded_file($file_tmp_ktp, '../../asset/document/'.$rand.'_'.$filektp);

									$xcv = $rand.'_'.$filecv;
									move_uploaded_file($file_tmp_cv, '../../asset/document/'.$rand.'_'.$filecv);

									$xsis = $rand.'_'.$filesis;
									move_uploaded_file($file_tmp_sis, '../../asset/document/'.$rand.'_'.$filesis);

									$xraport = $rand.'_'.$fileraport;
									move_uploaded_file($file_tmp_raport, '../../asset/document/'.$rand.'_'.$fileraport);

									$insertData = "INSERT INTO tb_lamaran
									(`id_lamaran`, `id_lowongan`, `id_bos`, `id_siswa`, `ktp`, `cv`, `sis`, `raport`, `status_lamaran`) 
									VALUES (NULL, '$id_lowongan_baru' ,'$id_bos', '$id_siswa', '$xktp', '$xcv', '$xsis', '$xraport', '$status')";

									$insertResult = $this->conn->query($insertData);

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

		}
		public function getLamaranSiswa($id){
			$data = null;
			
			$showSiswa = "select * from tb_lamaran where id_siswa = $_SESSION[id_siswa]";
			$getSiswa = $this->conn->query($showSiswa);
			while($display=$getSiswa->fetch_assoc()){
				$data = $display;
				
			}

			return $data;
		}
		public function getLamaranList($idlowongan){
			$data = null;

			$showLamaran = "SELECT * FROM tb_lowongan WHERE id_lowongan = $idlowongan";
			$getLamaran = $this->conn->query($showLamaran);
			while($row=$getLamaran->fetch_assoc()){
				$data = $row;
			}
			return $data;
		}
		public function getDataLamaran(){
			$data = null;

			$sqlData = "SELECT judul,jurusan,kota,kuota FROM tb_lowongan INNER JOIN tb_lamaran status_lamaran ON id_siswa = $_SESSION[id_siswa]";
			$getData = $this->conn->query($sqlData) or die($this->conn->error);
			while($row=$getData->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
			var_dump($sqlData);
			var_dump($getData);

		}
		public function getLamaranPage(){
			$get_data = mysqli_query($conn, "select * from tb_lamaran where id_siswa = $_SESSION[id_siswa] ");
			while ($row=mysqli_fetch_array($get_data)){
				$id_lamaran = $row['id_lamaran'];
				$id_lowongan = $row['id_lowongan'];
				$status = $row['status_lamaran'];
				$get_data2 = mysqli_query($conn, "select * from tb_lowongan where id_lowongan = '".$id_lowongan."'");
				while ($row2=mysqli_fetch_array($get_data2)) {
					$judul = $row2['judul'];
					$jurusan = $row2['jurusan'];
					$kota = $row2['kota'];	
					$max = $row2['kuota'];
				}
			}
		}
	}

?>