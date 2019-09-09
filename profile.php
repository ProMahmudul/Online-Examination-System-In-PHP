<?php include 'inc/header.php'; ?>
<?php 
	Session::checkSession();
	$userid  = Session::get("userid");
?>
<?php 
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$updateUser = $usr->updateUserData($userid, $_POST);
	}
	
?>
<div class="main">
<h1>Your Profile</h1>
<div class="profile">
	<form action="" method="post">
<?php 
	$getData = $usr->getUserData($userid);
	if ($getData) {
		while ($result = $getData->fetch_assoc()) {
?>
		<table class="tbl">    
			<tr>
			   <td>Name</td>
			   <td>:</td>
			   <td><input name="name" type="text" id="name" value="<?php echo $result['name']; ?>"></td>
			</tr>
			<tr>
			   <td>Username</td>
			   <td>:</td>
			   <td><input name="username" type="text" id="username" value="<?php echo $result['username']; ?>"></td>
			</tr>
			<tr>
			   <td>Email</td>
			   <td>:</td>
			   <td><input name="email" type="text" id="email" value="<?php echo $result['email']; ?>"></td>
			</tr>
			<tr>
			  <td></td>
			  <td></td>
			  <td><input type="submit" id="proUpdateSubmit" value="Update">
			   </td>
			</tr>
       </table>
<?php } } ?>
	</form>
<span id="state">
	<?php 
		if (isset($updateUser)) {
			echo $updateUser;
		}
	?>
</span>
</div>
</div>
<?php include 'inc/footer.php'; ?>