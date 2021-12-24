<?php include('configuration/constants.php');?>
<?php
    //ob_start();
	if(isset($_POST['submit']))
	{
		$customer_name=mysqli_real_escape_string($conn,$_POST['customer_name']);
		$customer_email=mysqli_real_escape_string($conn,$_POST['customer_email']);
		$subject=mysqli_real_escape_string($conn,$_POST['subject']);
		$message=mysqli_real_escape_string($conn,$_POST['message']);

		$sql="INSERT INTO tbl_customer_queries (`customer_name`, `customer_email`, `subject`, `message`) VALUES ( '".$customer_name."', '".$customer_email."', '".$subject."', '".$message."')";
		$res=mysqli_query($conn,$sql);
	

		if($res==true)
		{
			$_SESSION['msg']="<div class='success'>Your Query has been sent successfully</div>";
			//header('location:'.SITEURL.'contact_us.php');
			echo '<meta http-equiv="refresh" content="0; URL=https://localhost/Get_all/contact_us.php">';
		}
		else
		{
			$_SESSION['msg']="<div class='error'>Failed to Send Your Query.</div>";
			//header('location:'.SITEURL.'contact_us.php');
			echo '<meta http-equiv="refresh" content="0; URL=https://localhost/Get_all/contact_us.php">';
		}
	}
	

?>