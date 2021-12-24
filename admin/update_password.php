<?php include('partials/admin_panel_header.php');?>
<h2 style="text-align: center;">Change Password</h2><br>


<?php
if(isset($_GET['id']))
{
	$id=$_GET['id'];
}

?>
<form action="" method="POST">
	<table>
		<tr>
			<td>Current Password :</td>
			<td>
				<input type="password" name="current_password" placeholder="Enter current password">
			</td>
		</tr>
		<tr>
			<td>New Password :</td>
			<td>
				<input type="password" name="new_password" placeholder="Enter new password">
			</td>
		</tr>
		<tr>
			<td>Confirm Password :</td>
			<td>
				<input type="password" name="confirm_password" placeholder="Confirm new password">
			</td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: center;">
				<input type="hidden" name="id" value="<?php echo $id;?>">
				<input type="submit" name="submit" value="Apply" class="btn_secondary">
			</td>
		</tr>
	</table>
</form>


<?php include('partials/admin_panel_footer.php');?>


<?php
	if(isset($_POST['submit']))
	{
		$id=$_POST['id'];
		$current_password=md5($_POST['current_password']);
		$new_password=md5($_POST['new_password']);
		$confirm_password=md5($_POST['confirm_password']);

		$sql="SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password' ";
		$res=mysqli_query($conn,$sql);
		if($res==true)
		{
			$count=mysqli_num_rows($res);
			if($count==1)
			{
				//Admin exists
				if($new_password==$confirm_password)
				{
					$sql2="UPDATE tbl_admin SET password='$new_password' WHERE id=$id";
					$res2=mysqli_query($conn,$sql2);
					if($res2==true)
					{
						$_SESSION['password_updated']="<div class='success'>Password Updated Successfully</div>";
						header('location:'.SITEURL.'admin/manage_admin.php');
					}
					else
					{
						$_SESSION['password_updated']="<div class='error'>Failed to Update Password. Try again later</div>";
						header('location:'.SITEURL.'admin/manage_admin.php');

					}
				}
				else
				{
					$_SESSION['password_not_matched']="<div class='error'>Password Not Matched</div>";
					header('location:'.SITEURL.'admin/manage_admin.php');
				}

			}
			else
			{
				$_SESSION['admin_not_found']="<div class='error'>User not found</div>";
				header('location:'.SITEURL.'admin/manage_admin.php');
			}
		}
	}
?>