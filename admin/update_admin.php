<?php echo include('partials/admin_panel_header.php');?>
<h2 style="text-align: center;">Update Admin</h2><br>


<?php
	$id=$_GET['id'];
	$sql="SELECT * FROM tbl_admin WHERE id=$id";
	$res=mysqli_query($conn,$sql);
	if($res==TRUE)
	{
		$count=mysqli_num_rows($res);
		if($count==1)   //Cheaking if the admin is available or not
		{
			$row=mysqli_fetch_assoc($res);
			$full_name=$row['full_name'];
			$username=$row['username'];
		}
		else
		{
			header('location:'.SITEURL.'admin/manage_admin.php');
		}
	}
?>




<form action="" method="POST">
	<table>
		<tr>
			<td>Full Name :</td>
			<td>
				<input type="text" name="full_name" value="<?php echo $full_name;?>">
			</td>
		</tr>
		<tr>
			<td>Username :</td>
			<td>
				<input type="text" name="username" value="<?php echo $username;?>">
			</td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: center;">
				<input type="hidden" name="id" value="<?php echo $id;?>">      <!--This is used to pass the value of id as it is a primary key.-->
				<input type="submit" name="submit" value="Update" class="btn_secondary">
			</td>
		</tr>
	</table>
</form>


<?php echo include('partials/admin_panel_footer.php');?>

<?php
	if(isset($_POST['submit']))
	{
		$id=$_POST['id'];
		$full_name=$_POST['full_name'];
		$username=$_POST['username'];

		$sql="UPDATE tbl_admin SET full_name='$full_name',username='$username' WHERE id='$id'";
		$res=mysqli_query($conn,$sql);
		if($res==true)
		{
			$_SESSION['update_admin']="<div class='success'>Admin Updated succesfully.</div>";
			header('location:'.SITEURL.'admin/manage_admin.php');
		}
		else
		{
			$_SESSION['update_admin']="<div class='success'>Failed to Updated Admin.</div>";
			header('location:'.SITEURL.'admin/manage_admin.php'); 
		}
	}

?>