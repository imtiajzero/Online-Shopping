<?php include('../configuration/constants.php');?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Log in page</title>
	<link rel="stylesheet" type="text/css" href="admin_login_style.css">
</head>
<body>
	<div class="container">
		<div class="member">
			<img src="../img/member.jpg">
		</div>
		<div class="login_form">
			<form method="post">
			<h2>LogIn</h2>
			<?php
				if(isset($_SESSION['login']))
				{
					echo $_SESSION['login'];
					unset($_SESSION['login']);
				}
				if(isset($_SESSION['logout_message']))
				{
					echo $_SESSION['logout_message'];
					unset($_SESSION['logout_message']);
				}
			?><br>
			<input type="text" class = "input-box" id=user-img placeholder="user name" name="user_name" required>
			<br><br>
			<input type="e-mail"class = "input-box" id=email-img placeholder="user e-mail" name="email">
			<br><br>
			<input type="password" class="input-box" id="pass-img"  placeholder="password" name="password" required><br><br>
			<input type="checkbox"><span>Remember Me</span><br><br>
			<button type="submit" name="submit">Submit</button>
			<br><br><br><br>
			</form>
		</div>
	</div>
</body>
</html>

<?php
	if(isset($_POST['submit']))
	{
		$username=$_POST['user_name'];
		$password=md5($_POST['password']);
		$sql="SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
		$res=mysqli_query($conn,$sql);
		$count=mysqli_num_rows($res);
		if($count==1)
		{
			$_SESSION['login']="<div class='success'>Login Successful. Welcome <span style='color:blue;''>$username</span></div>";
			$_SESSION['user_admin']=$username;
			header('location:'.SITEURL.'admin/dashboard.php');
		}
		else
		{
			$_SESSION['login']="<div class='error'>Login Failed. Username or password didn't matched.</div>";
			header('location:'.SITEURL.'admin/admin_login.php');
		}
	}
?>
