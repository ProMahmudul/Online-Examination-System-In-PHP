<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/User.php');
	$usr = new User();
?>
<?php 
	if (isset($_GET['dis'])) {
		$dblid 		= (int)$_GET['dis'];
		$dblUser 	= $usr->disableUser($dblid);
	}

	if (isset($_GET['ena'])) {
		$eblid 		= (int)$_GET['ena'];
		$eblUser 	= $usr->enableUser($eblid);
	}

	if (isset($_GET['del'])) {
		$delid 		= (int)$_GET['del'];
		$delUser 	= $usr->deleteUser($delid);
	}
?>
<div class="main">
	<h1>Admin Panel - Manage User</h1>
	<?php 
		if (isset($dblUser)) {
			echo $dblUser;
		}

		if (isset($eblUser)) {
			echo $eblUser;
		}

		if (isset($delUser)) {
			echo $delUser;
		}
	?>
	<div class="manageuser">
		<table class="tblone">
			<tr>
				<th>S/L</th>
				<th>Name</th>
				<th>Username</th>
				<th>Email</th>
				<th>Action</th>
			</tr>
<?php 
	$userData = $usr->getAllUsers();
	if ($userData) {
		$i = 0;
		while ($result = $userData->fetch_assoc()) {
			$i++;
?>			
			<tr>
				<td>
					<?php
						if ($result['status'] == '1'){
							echo "<span class='error'>".$i."</span>";
						} else {
							echo "<span class='success'>".$i."</span>";
						}
					?>
				</td>
				<td><?php echo $result["name"]; ?></td>
				<td><?php echo $result["username"]; ?></td>
				<td><?php echo $result["email"]; ?></td>
				<td>
					<?php if ($result['status'] == '0') { ?>
						<a onclick="return confirm('Are you sure to Disable!!')" href="?dis=<?php echo $result['userid']; ?>">Disable</a>
					<?php } else { ?>
					<a onclick="return confirm('Are you sure to Enable!!')" href="?ena=<?php echo $result['userid']; ?>">Enable</a> 
					<?php } ?>||
					<a onclick="return confirm('Are you sure to Remove!!')" href="?del=<?php echo $result['userid']; ?>">Remove</a>
				</td>
			</tr>
<?php } } ?>
		</table>
	</div>	
</div>
<?php include 'inc/footer.php'; ?>