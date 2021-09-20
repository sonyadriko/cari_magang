<?php

	/**
	 * 
	 */
	class BosModel 
	{
		private $servername = 'localhost';
		private $username = 'root';
		private $password = '';
		private $dbname = 'cari_magang';
		private $conn;
		
		function __construct()
		{
			try{
				$this->conn = new mysqli($this->servername,$this->username,$this->password,$this->dbname);
			} catch (Exception $e){
				echo "connection failed" . $e>getMessage();
			}
		}

		public function addLowongan(){
			if (isset($_POST['add_lowongan'])) {
				$id_bos = $_SESSION['id_bos'];
				$judul = $_POST['judul'];
				$jurusan = $_POST['jurusan'];
				$alamat = $_POST['alamat'];
				$jpelamar = $_POST['jumlah'];	
				$kota = $_POST['addkota'];
				$detail = $_POST['detail'];
				$tanggal = $_POST['tanggal'];
				$status = $_POST['status'];
				date_default_timezone_set('Asia/Jakarta');
				$date = date("Y-m-d H:i:s");	

				$insertData = "INSERT INTO tb_lowongan
				(`id_lowongan`, `id_bos`, `judul`, `jurusan`, `detail`, `alamat`, `kota`, `tanggal`, `kuota`, `status`) 
				VALUES (NULL, $id_bos, '$judul', '$jurusan', '$detail', '$alamat', '$kota', '$date', '$jpelamar', '$status')";

				$insertResult = $this->conn->query($insertData);
				//$insertResult = mysqli_query($conn,$insertData);
			
				if ($insertResult) {
					# code...
					echo "Berhasil membuat lowongan baru.";
					header("Location:index.php");
				}else {
					//echo "ada yang error";
					var_dump($insertResult);
					die();
				}
				
			}
		}

		public function getDataLamaran(){
			$data = null;
			//$sqlLamaran = "SELECT * FROM tb_lamaran inner join user_siswa ON tb_lamaran.id_siswa = user_siswa.id_siswa WHERE tb_lamaran.id_bos = $_SESSION[id_bos]";
			//$sqlLamaran = "SELECT * FROM ((tb_lamaran inner join user_siswa ON tb_lamaran.id_siswa = user_siswa.id_siswa) INNER JOIN tb_lowongan ON tb_lamaran.id_bos = tb_lowongan.id_bos) WHERE tb_lowongan.id_bos = $_SESSION[id_bos]";
			$sqlLamaran = "SELECT * FROM ((tb_lowongan inner join tb_lamaran ON tb_lowongan.id_bos = tb_lamaran.id_bos) INNER JOIN user_siswa ON tb_lamaran.id_siswa = user_siswa.id_siswa) WHERE tb_lamaran.id_bos = $_SESSION[id_bos]";
			$getLamaran = $this->conn->query($sqlLamaran);
			while($row=$getLamaran->fetch_assoc()){
				$data[] = $row;
			}
			return $data;
		}
	}

?>