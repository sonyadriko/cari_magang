<?php

	/**
	 * 
	 */
	class LowonganModel 
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

		public function getLowongan(){
			$data = null;
			date_default_timezone_set('Asia/Jakarta');
			$time = time();
			$showLB = "SELECT * FROM tb_lowongan INNER JOIN user_bos ON tb_lowongan.id_bos = user_bos.id_bos WHERE status = 2 && exp >= $time";
			$getLB = $this->conn->query($showLB);
			while ($row=$getLB->fetch_assoc()) {
				$data[] = $row;
			} 
			return $data;
		}


		public function getLowonganBos(){
			$data = null;
			date_default_timezone_set('Asia/Jakarta');
			$time = time();
			$showLB = "SELECT * FROM tb_lowongan INNER JOIN user_bos ON tb_lowongan.id_bos = user_bos.id_bos WHERE user_bos.id_bos = $_SESSION[id_bos]";
			$getLB = $this->conn->query($showLB);
			while ($row=$getLB->fetch_assoc()) {
				$data[] = $row;
			} 
			return $data;
		}
	}


?>