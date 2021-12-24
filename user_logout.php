<?php 
	include('configuration/constants.php');
	session_destroy();
	header('location:'.SITEURL.'index.php');
?>