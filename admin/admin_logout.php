<?php 
	include('../configuration/constants.php');
	session_destroy();
	header('location:'.SITEURL.'admin/admin_login.php');
?>