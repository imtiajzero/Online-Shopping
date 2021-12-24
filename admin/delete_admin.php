<?php
	
	//include constants.php file here as this file is not connected like other files by header
	include('../configuration/constants.php');

	//Step 1: get the id of admin to be deleted
	$id=$_GET['id'];

	//Step 2: Creat SQL query to delete admin
	$sql="DELETE FROM tbl_admin WHERE id=$id";
	$res=mysqli_query($conn,$sql);
	if($res==TRUE)
	{
		$_SESSION['delete']="<div class='success'>Admin deleted successfully</div>";
		header('location:'.SITEURL.'admin/manage_admin.php');
	}
	else
	{
		$_SESSION['delete']="<div class='error'>Failed to delete admin</div>";
		header('location:'.SITEURL.'admin/manage_admin.php');
	}

?>