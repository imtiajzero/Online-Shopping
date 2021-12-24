<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CONTACT US</title>
		<link rel="stylesheet" type="text/css" href="contact_us_style.css">
		<link rel="stylesheet" type="text/css" href="MyCssStyle.css">

</head>

<?php include('header.php');?>



<div class="wrapper_contact">
	<?php
			if(isset($_SESSION['msg']))
			{
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}

		?>
	<div class="paragraph"><br><br>
		<h2>Contact Us</h2><br><br>
		
		<pre>Email us with any questions or inquiries or call +880170420420.We should be
    happy to answer your questions and set up a meeting with you.Get_all
    Online group can help set you apart from the flock.</pre><br><br>
	</div>
	<div class="form">
		<form action="https://localhost/Get_all/contact.php" method="POST">
			<label>NAME </label>&nbsp;&nbsp;&nbsp;
			<input class="inputs" type="text" name="customer_name" placeholder="Enter your name"><br><br>
			<label>EMAIL </label>&nbsp;&nbsp;&nbsp;
			<input class="inputs" type="email" name="customer_email" placeholder="Enter your email"><br><br>
			<label>SUBJECT </label>&nbsp;&nbsp;&nbsp;
			<input class="inputs" type="text" name="subject" placeholder="Enter your Subject"><br><br>
			<label>MESSAGE </label>&nbsp;&nbsp;&nbsp;
			<input class="inputs" style="height: 180px;" type="text" name="message" placeholder="Enter your message"><br><br>
			<input type="submit" name="submit" class="button" value="Send"><br><br><br>
		</form>
	</div>
	</div>

<?php include('footer.php');?>
