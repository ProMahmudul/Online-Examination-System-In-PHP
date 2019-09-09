<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/classes/User.php');
	$usr = new User();

	$name 		= $_POST['name'];
	$username 	= $_POST['username'];
	$password 	= $_POST['password'];
	$email 		= $_POST['email'];
	$userregi 	= $usr->userRegistration($name, $username, $password, $email);
?>