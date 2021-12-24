<?php 
    include 'configuration/constants.php';

    
		$username=$_POST['user'];
		$password=md5($_POST['pass']);
		$sql="SELECT * FROM tbl_user_info WHERE name='$username' AND password='$password'";
		$res=mysqli_query($conn,$sql);
		$count=mysqli_num_rows($res);
		if($count==1)
		{
			$_SESSION['login']="<div class='success'>Login Successful</div>";
			$_SESSION['user_login']=$username;
			header('location:'.SITEURL); 
		}
		else
		{
			$_SESSION['login']="<div class='error'>Login Failed</div>";
			header('location:'.SITEURL.'login.php'); 
        }