<?php echo include('partials/admin_panel_header.php');?>
<h2>Manage Catagory</h2>
<?php
	if(isset($_SESSION['add_catagory']))
	{
		echo $_SESSION['add_catagory'];
		unset($_SESSION['add_catagory']);
	}
	if(isset($_SESSION['remove_catagory']))
	{
		echo $_SESSION['remove_catagory'];
		unset($_SESSION['remove_catagory']);
	}
	if(isset($_SESSION['delete_catagory']))
	{
		echo $_SESSION['delete_catagory'];
		unset($_SESSION['delete_catagory']);
	}
	if(isset($_SESSION['no_catagory_found']))
	{
		echo $_SESSION['no_catagory_found'];
		unset($_SESSION['no_catagory_found']);
	}
	if(isset($_SESSION['catagory_update']))
	{
		echo $_SESSION['catagory_update'];
		unset($_SESSION['catagory_update']);
	}
	if(isset($_SESSION['upload_new_image']))
	{
		echo $_SESSION['upload_new_image'];
		unset($_SESSION['upload_new_image']);
	}
?>
<br><br>
<a href="add_catagory.php" class="btn_primary" >Add Catagory</a>   <br><br>

<table>
	<tr>
		<th>S.N.</th>
		<th>Title</th>
		<th>Image_name</th>
		<th>Featured</th>
		<th>Active</th>
		<th>Actions</th>
	</tr>

	<?php
		$sql="SELECT * FROM tbl_catagory";
		$res=mysqli_query($conn,$sql);
		$count=mysqli_num_rows($res);
		if($count>0)
		{
			$serial=1;
			//We have data in database
			while ($row=mysqli_fetch_assoc($res)) {

				$id=$row['id'];
				$title=$row['title'];
				$image_name=$row['image_name'];
				$featured=$row['featured'];
				$active=$row['active'];
				?>

				<tr>
					<td><?php echo $serial++;?></td>
					<td><?php echo $title;?></td>
					<td>
						<?php
						 	if($image_name=="")
						 	{
						 		echo "<div class='error'>Image not added.</div>";
						 	}
						 	else
						 	{
						 		?>
						 		<img src="<?php echo SITEURL;?>img/catagory/<?php echo $image_name;?>" width="70px" >
						 		<?php
						 	}

						 ?>
						

					</td>
					<td><?php echo $featured;?></td>
					<td><?php echo $active;?></td>
					<td style="width: 200px;text-align: center;">
						<a href="update_catagory.php?id=<?php echo $id;?>" class="btn_secondary">Update</a>
						<a href="delete_catagory.php?id=<?php echo $id;?>& image_name=<?php echo $image_name;?>" class="btn_danger">Delete</a>
					</td>
				</tr>
				<?php
			}
		}
		else
		{
			//We do not have data in our database
			//We will display the message inside table
			?>

			<tr>
				<td colspan="6"> <div class="error"> No Catagory Added.</div></td>
			</tr>

			<?php
		}

	?>
</table>




<?php echo include('partials/admin_panel_footer.php');?>