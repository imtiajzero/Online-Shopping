<?php echo include('partials/admin_panel_header.php');?>
<h2 style="text-align: center;">Add Admin</h2><br>
<?php
	if(isset($_SESSION['add']))
	{
		echo $_SESSION['add'];
		unset($_SESSION['add']);
	}
?><br>
<form action="" method="POST">
	<table>
		<tr>
			<td>Full Name :</td>
			<td>
				<input type="text" name="full_name" placeholder="Enter your name">
			</td>
		</tr>
		<tr>
			<td>Username :</td>
			<td>
				<input type="text" name="username" placeholder="Enter your username">
			</td>
		</tr>
		<tr>
			<td>Password :</td>
			<td>
				<input type="password" name="password" placeholder="Enter your password">
			</td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: center;">
				<input type="submit" name="submit" value="Add Admin" class="btn_secondary">
			</td>
		</tr>
	</table>
</form>
<?php echo include('partials/admin_panel_footer.php');?>

<?php
//process the data from the form and save it in our database named get_all
//Cheak whether the submit button is clicked or not
	if(isset($_POST['submit']))
	{
		//button clicked
		//Step1: Now get the data from the form
		$full_name=$_POST['full_name'];
		$username=$_POST['username'];
		$password=md5($_POST['password']); //Password encryption with md5

		//Step2: SQL query to save the data in our database
		$sql="INSERT INTO tbl_admin SET full_name='$full_name',username='$username',password='$password'";
		//Step 3: Executing query and save data in our database named get_all
		$res=mysqli_query($conn,$sql) or die(mysqli_error());

		//Step 4: Cheak the data is inserted or not and display appropriate message using session variable
		if($res==TRUE)
		{
			//Data inserted
			//Creat a session variable to display message
			$_SESSION['add']="<div class='success'>Admin added successfully</div>";
			//Redirect page to Manage Admin page
			header("location:".SITEURL.'admin/manage_admin.php');
		} 
		else
		{
			$_SESSION['add']="<div class='error'>Failed to add admin</div>";
			//Redirect page to Add Admin page
			header("location:".SITEURL.'admin/add_admin.php');
		}

	}

?>