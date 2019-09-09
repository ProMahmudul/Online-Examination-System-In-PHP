<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/Exam.php');
	$exm = new Exam();
?>
<style type="text/css">
	.adminpanel{width: 600px; color: #999; margin: 20px auto 0; padding: 10px; border: 1px solid #ddd;}
</style>
<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$addQue = $exm->AddQuestions($_POST);
	}
	
	//Get Total
	$total = $exm->getTotalRows();
	$next = $total + 1;
?>
<div class="main">
<h1>Admin Panel - Add Question</h1>
<?php 
	if (isset($addQue)) {
		echo $addQue;
	}
?>
	<div class="adminpanel">
		<form action="" method="post">
			<table>
				<tr>
					<td>Question No.</td>
					<td>:</td>
					<td><input type="number" value="<?php if(isset($next)){echo $next;} ?>" name="quesNo"></td>
				</tr>
				<tr>
					<td>Question</td>
					<td>:</td>
					<td><input type="text" name="ques" placeholder="Enter Questions.." required="required"></td>
				</tr>
				<tr>
					<td>Choice One</td>
					<td>:</td>
					<td><input type="text" name="ans1" placeholder="Enter Choice One.." required="required"></td>
				</tr>
				<tr>
					<td>Choice Two</td>
					<td>:</td>
					<td><input type="text" name="ans2" placeholder="Enter Choice Two.." required="required"></td>
				</tr>
				<tr>
					<td>Choice Three</td>
					<td>:</td>
					<td><input type="text" name="ans3" placeholder="Enter Choice Three.." required="required"></td>
				</tr>
				<tr>
					<td>Choice Four</td>
					<td>:</td>
					<td><input type="text" name="ans4" placeholder="Enter Choice Four.." required="required"></td>
				</tr>
				<tr>
					<td>Correct NO.</td>
					<td>:</td>
					<td><input type="number" name="rightAns" required="required"></td>
				</tr>
				<tr>
					<td>
						<td colspan="3" align="center">
							<input type="submit" value="Add A Question">
						</td>
					</td>
				</tr>
			</table>
		</form>
	</div>	
</div>
<?php include 'inc/footer.php'; ?>