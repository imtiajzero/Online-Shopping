<?php echo include('partials/admin_panel_header.php');?>
<h2>Manage Product</h2>

<?php
	if(isset($_SESSION['add_product']))
	{
		echo $_SESSION['add_product'];
		unset($_SESSION['add_product']);
	}
	if(isset($_SESSION['delete_product']))
	{
		echo $_SESSION['delete_product'];
		unset($_SESSION['delete_product']);
	}
	if(isset($_SESSION['remove_image']))
	{
		echo $_SESSION['remove_image'];
		unset($_SESSION['remove_image']);
	}
	if(isset($_SESSION['no_product_found']))
	{
		echo $_SESSION['no_product_found'];
		unset($_SESSION['no_product_found']);
	}
	if(isset($_SESSION['upload_new_image']))
	{
		echo $_SESSION['upload_new_image'];
		unset($_SESSION['upload_new_image']);
	}
	if(isset($_SESSION['catagory_update']))
	{
		echo $_SESSION['catagory_update'];
		unset($_SESSION['catagory_update']);
	}
?><br>

<a href="add_product.php" class="btn_primary" >Add Product</a>   <br><br>


<table>
	<tr>
		<th>S.N.</th>
		<th>Title</th>
		<th>Image_name</th>
		<th>Price</th>
		<th>Ctgry</th>
		<th>Featured</th>
		<th>Active</th>
		<th>Action</th>
	</tr>
	<?php
		$sql="SELECT * FROM tbl_product";
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
				$price=$row['price'];


				$catagory_id=$row['catagory_id'];

				$sql3="SELECT * FROM tbl_catagory WHERE id=$catagory_id";
				$res3=mysqli_query($conn,$sql3);
				$row3=mysqli_fetch_assoc($res3);
				$catagory_name=$row3['title'];



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
						 		<img src="<?php echo SITEURL;?>img/<?php echo $catagory_name;?>/<?php echo $image_name;?>" width="70px" >
						 		<?php
						 	}

						 ?>
						

					</td>
					<td><?php echo $price;?></td>
					<td><?php echo $catagory_name;?></td>
					<td><?php echo $featured;?></td>
					<td><?php echo $active;?></td>
					<td style="width: 200px;text-align: center;padding: 9px 33px;">
						<a href="update_product.php?id=<?php echo $id;?>" class="btn_secondary">Update</a>
						<a href="delete_product.php?id=<?php echo $id;?>& image_name=<?php echo $image_name;?>& catagory_name=<?php echo $catagory_name;?>" class="btn_danger">Delete</a>
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
				<td colspan="6"> <div class="error"> No Product Available.</div></td>
			</tr>

			<?php
		}

	?>	
</table>



<?php echo include('partials/admin_panel_footer.php');?>