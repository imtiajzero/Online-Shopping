<?php include('partials/admin_panel_header.php');?>
<?php
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$status=$_GET['status'];
	}
?>

<h2>Update Order</h2>
<form action="" method="POST">
	<table>
		<tr>
			<td>Status</td>
			<td>
				<select name="status">
					<option value="Ordered">Ordered</option>
					<option value="On Delivery">On Delivery</option>
					<option value="Delivered">Delivered</option>
					<option value="Canceled">Canceled</option>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="hidden" name="id" value="<?php echo $id;?>">
				<input type="submit" name="submit" class="btn_secondary" value="Update">
			</td>
		</tr>
	</table>
</form>




<?php include('partials/admin_panel_footer.php');?>

<?php
	if(isset($_POST['submit']))
	{
		$id=$_POST['id'];
		$new_status=$_POST['status'];
		$sql="UPDATE tbl_order SET status='$new_status' WHERE id=$id";
		$res=mysqli_query($conn,$sql);
		if($res==true)
		{
			$_SESSION['update_status']="<div class='success'>Status Updated Successfully.</div>";
			header('location:'.SITEURL.'admin/manage_order.php');
		}
		else
		{
			$_SESSION['update_status']="<div class='error'>Failed to Update Status.</div>";
			header('location:'.SITEURL.'admin/manage_order.php');
		}
	}

?>