<?php echo include('partials/admin_panel_header.php');?>
<h2>Add Product</h2>

<?php
	if(isset($_SESSION['upload_image']))
	{
		echo $_SESSION['upload_image'];
		unset($_SESSION['upload_image']);
	}
?>
<form action="" method="POST" enctype="multipart/form-data">
	<table>
		<tr>
			<td>Title :</td>
			<td><input type="text" name="title" placeholder="Title of the product"></td>
		</tr>
		<tr>
			<td>Price :</td>
			<td><input type="number" name="price" placeholder="Price of the product"></td>
		</tr>
		<tr>
			<td>Image :</td>
			<td><input type="file" name="image"></td>
		</tr>
		<tr>
			<td>Catagory :</td>
			<td>
				<select name="catagory">
					<?php
						$sql="SELECT * FROM tbl_catagory WHERE active='Yes'";
						$res=mysqli_query($conn,$sql);
						$count=mysqli_num_rows($res);
						if($count>0)
						{
							while($row=mysqli_fetch_assoc($res))
							{
								$id=$row['id'];
								$catagory_title=$row['title'];
								?>
								<option value="<?php echo $id;?>"><?php echo $catagory_title ;?></option>
								<?php
							}
						}
						else
						{
							?>
							<option value="0">No catagory</option>
							<?php
						}

					?>

				</select>
			</td>
		</tr>
		<tr>
			<td>Featured :</td>
			<td>
				<input type="radio" name="featured" value="Yes">Yes
				<input type="radio" name="featured" value="No">No
			</td>
		</tr>
		<tr>
			<td>Active :</td>
			<td>
				<input type="radio" name="active" value="Yes">Yes
				<input type="radio" name="active" value="No">No
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" name="submit" value="Add Product" class="btn_secondary">
			</td>
		</tr>
	</table>
	
</form>



<?php echo include('partials/admin_panel_footer.php');?>


<?php
	if(isset($_POST['submit']))
	{
		$title=$_POST['title'];
		$price=$_POST['price'];
		$catagory_id=$_POST['catagory'];
		if(isset($_POST['featured']))
		{
			$featured=$_POST['featured'];
		}
		else
		{
			$featured="No";
		}
		if(isset($_POST['active']))
		{
			$active=$_POST['active'];
		}
		else
		{
			$active="No";
		}

		if(isset($_FILES['image']['name'])) //checks that the choose file button is selected or not
		{
			$image_name=$_FILES['image']['name'];
			if($image_name!="")
			{
				$source_path=$_FILES['image']['tmp_name'];


				$sql3="SELECT * FROM tbl_catagory WHERE id=$catagory_id";
				$res3=mysqli_query($conn,$sql3);
				$row3=mysqli_fetch_assoc($res3);
				$folder_name=$row3['title'];


				$destination_path="../img/".$folder_name.'/'.$image_name;
				$upload=move_uploaded_file($source_path, $destination_path);
				if($upload==false)
				{
					$_SESSION['upload_image']="<div class='error'>Failed to upload image</div>";
					header('location:'.SITEURL.'admin/add_product.php');
					die();
				}

			}
			else
			{
				$image_name="No image";
			}
		}
		else
		{
			$image_name="No image";
		}


		$sql2="INSERT INTO tbl_product SET title='$title', price=$price, image_name='$image_name', catagory_id=$catagory_id, featured='$featured', active='$active' ";

		$res2=mysqli_query($conn,$sql2);
		if($res2==true)
		{
			$_SESSION['add_product']="<div class='success'>Product added successfully</div>";
			header('location:'.SITEURL.'admin/manage_product.php');
		}
		else
		{
			$_SESSION['add_product']="<div class='error'>Failed to add product</div>";
			header('location:'.SITEURL.'admin/manage_product.php');
		}
	}
?>