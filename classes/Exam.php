<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');

	class Exam{
		private $db;
		private $fm;
		
		function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function AddQuestions($data){
			$quesNo 	= $this->fm->validation($data['quesNo']);
			$ques 		= $this->fm->validation($data['ques']);
			$ans1 		= $this->fm->validation($data['ans1']);
			$ans2 		= $this->fm->validation($data['ans2']);
			$ans3 		= $this->fm->validation($data['ans3']);
			$ans4 		= $this->fm->validation($data['ans4']);
			$rightAns 	= $this->fm->validation($data['rightAns']);

			$adminUser	= mysqli_real_escape_string($this->db->link, $quesNo);
			$ques		= mysqli_real_escape_string($this->db->link, $ques);
			$ans1		= mysqli_real_escape_string($this->db->link, $ans1);
			$ans2		= mysqli_real_escape_string($this->db->link, $ans2);
			$ans3		= mysqli_real_escape_string($this->db->link, $ans3);
			$ans4		= mysqli_real_escape_string($this->db->link, $ans4);
			$rightAns	= mysqli_real_escape_string($this->db->link, $rightAns);

			$ans 		= array();
			$ans[1] 	= $ans1;
			$ans[2] 	= $ans2;
			$ans[3] 	= $ans3;
			$ans[4] 	= $ans4;

			$query = "INSERT INTO tbl_ques(quesNo, ques) VALUES('$quesNo', '$ques')";
			$insert_row = $this->db->insert($query);
			if ($insert_row) {
				foreach ($ans as $key => $ansName) {
					if ($ansName != "") {
						if ($rightAns == $key) {
							$rquery = "INSERT INTO tbl_ans(quesNo, rightAns, ans) VALUES('$quesNo', '1', '$ansName')";
						} else {
							$rquery = "INSERT INTO tbl_ans(quesNo, rightAns, ans) VALUES('$quesNo', '0', '$ansName')";
						}
						$insertrow = $this->db->insert($rquery);
						if ($insertrow) {
							continue;
						} else {
							die('Error...');
						}
					}
				}

				$msg = "<span class='success'>Question added Successfully.</span>";
				return $msg;
			}
		}

		public function getQueByOrder(){
			$query = "SELECT * FROM tbl_ques ORDER BY quesNo ASC";
			$result = $this->db->select($query);
			return $result;
		}

		public function delQuestion($quesNo){
			$tables = array("tbl_ques", "tbl_ans");
			foreach ($tables as $table) {
				$delquery = "DELETE FROM $table WHERE quesNo = '$quesNo'";
				$deldata = $this->db->delete($delquery);
			}
			if ($deldata) {
				$msg = "<span class='success'>Data Deleted Successfully..</span>";
				return $msg;
			} else {
				$msg = "<span class='error'>Data not Deleted !</span>";
				return $msg;
			}
		}

		public function getTotalRows(){
			$query = "SELECT * FROM tbl_ques";
			$getResult = $this->db->select($query);
			$total = $getResult->num_rows;
			return $total;
		}

		public function getQuestion(){
			$query 		= "SELECT * FROM tbl_ques";
			$getData 	= $this->db->select($query);
			$result 	= $getData->fetch_assoc();
			return $result;
		}

		public function getQuestionByNumber($number){
			$query 		= "SELECT * FROM tbl_ques WHERE quesNo = '$number'";
			$getData 	= $this->db->select($query);
			$result 	= $getData->fetch_assoc();
			return $result;
		}

		public function getAnswer($number){
			$query 		= "SELECT * FROM tbl_ans WHERE quesNo = '$number'";
			$getAns 	= $this->db->select($query);
			return $getAns;
		}

		public function checkNumber($num){
			$chkquery = "SELECT * FROM tbl_ques WHERE quesNo = '$num'";
			$chkresult = $this->db->select($chkquery);
			if ($chkresult) {
				$result = $chkresult->fetch_assoc();
				return $result['quesNo'];
			} else {
				header("Location: exam.php");
			}
		}

	}
?>