<?php
	if(!isset($_SESSION['user_admin']))
	{
		$_SESSION['logout_message']="<div class='error'>Please login to access admin panel</div>";
		header('location:'.SITEURL.'admin/admin_login.php');
	}
?>