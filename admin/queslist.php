<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/Exam.php');
	$exm = new Exam();
?>
<?php 
	if (isset($_GET['delque'])) {
		$quesNo = mysqli_real_escape_string($db->link, (int)$_GET['delque']);
		$delQues = $exm->delQuestion($quesNo);
	}
?>
<div class="main">
	<h1>Admin Panel - Question List</h1>
<?php 
	if (isset($delQues)) {
		echo $delQues;
	}
?>
	<div class="quelist">
		<table class="tblone">
			<tr>
				<th width="5%">No</th>
				<th width="75%">Questions</th>
				<th width="20%">Action</th>
			</tr>
<?php 
	$getData = $exm->getQueByOrder();
	if ($getData) {
		$i = 0;
		while ($result = $getData->fetch_assoc()) {
			$i++;
?>			
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $result['ques']; ?></td>
				<td>
					<a onclick="return confirm('Are you sure to Remove!!')" href="?delque=<?php echo $result['quesNo']; ?>">Remove</a>
				</td>
			</tr>
<?php } } ?>
		</table>
	</div>	
</div>
<?php include 'inc/footer.php'; ?>