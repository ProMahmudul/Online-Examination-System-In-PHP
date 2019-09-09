<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Session.php');
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');

	class Admin{
		private $db;
		private $fm;
		
		function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function getAdminData($data){
			$adminUser = $this->fm->validation($data['adminUser']);
			$adminPass = $this->fm->validation($data['adminPass']);

			$adminUser	= mysqli_real_escape_string($this->db->link, $adminUser);
			$adminPass 	= mysqli_real_escape_string($this->db->link, md5($adminPass));

			$query = "SELECT * FROM tbl_admin WHERE adminUser = '$adminUser' AND adminPass = '$adminPass'";
			$result = $this->db->select($query);
			if ($result != false) {
				$value = $result->fetch_assoc();
				Session::init();
				Session::set("adminLogin", true);
				Session::set("adminUser", $value['adminUser']);
				Session::set("adminId", $value['adminId']);
				header("Location: index.php");
			} else {
				$msg = "<span class='error'>Username or Password not Matched !</span>";
				return $msg;
			}
		}
	}
?>