<?php include('partials/admin_panel_header.php')?>

<h2>Update Product</h2>

<?php
	if(isset($_GET['id']))
	{
		$id= $_GET['id'];
		$sql="SELECT * FROM tbl_product WHERE id=$id";
		$res=mysqli_query($conn,$sql);
		$count=mysqli_num_rows($res);
		if($count==1)
		{
			$row=mysqli_fetch_assoc($res);
			$title=$row['title'];
			$current_image_name=$row['image_name'];
			$price=$row['price'];
			$current_catagory_id=$row['catagory_id'];
			$featured=$row['featured'];
			$active=$row['active'];
		}
		else
		{
			$_SESSION['no_product_found']="<div class='error'>Product not found</div>";
			header('location:'.SITEURL.'admin/manage_product.php');
		}
	}
	else
	{
		header('location'.SITEURL.'admin/manage_product.php'); 
	}

?>

<form action="" method="POST" enctype="multipart/form-data"> <!-- enctype property allows us to upload file/image -->
	<table>
		<tr>
			<td>Title :</td>
			<td><input type="text" name="title" placeholder="Product title" value="<?php echo $title;?>"></td>
		</tr>
		<tr>
			<td>Price :</td>
			<td><input type="number" name="price" value="<?php echo $price;?>"></td>
		</tr>
		<tr>
			<td>Current Image :</td>
			<td>
				<?php
					if($current_image_name=="")
				 	{ 									 		
				 		echo "<div class='error'>Image not added.</div>";
				 	}
				 	else
				 	{

				 		$sql3="SELECT * FROM tbl_catagory WHERE id=$current_catagory_id";
						$res3=mysqli_query($conn,$sql3);
						$row3=mysqli_fetch_assoc($res3);
						$folder_name=$row3['title'];


						?>						 		
						<img src="<?php echo SITEURL;?>img/<?php echo $folder_name;?>/<?php echo $current_image_name;?>" width="70px" >
				 		<?php
				 	}
				 ?>
			</td>
		</tr>
		<tr>
			<td>New Image :</td>
			<td><input type="file" name="image"></td>
		</tr>
		<tr>
			<td>Catagory Id:</td>
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
								$catagory_id=$row['id'];
								$catagory_title=$row['title'];
								?>
								<option value="<?php echo $catagory_id;?>"><?php echo $catagory_title ;?></option>
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
				<input <?php if($featured=="Yes") {echo "checked";}?> type="radio" name="featured" value="Yes"> Yes
				<input <?php if($featured=="No") {echo "checked";}?> type="radio" name="featured" value="No"> No
			</td>
		</tr>
		<tr>
			<td>Active :</td>
			<td>
				<input <?php if($active=="Yes") {echo "checked";}?> type="radio" name="active" value="Yes"> Yes
				<input <?php if($active=="No") {echo "checked";}?> type="radio" name="active" value="No"> No
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="hidden" name="current_image_name" value="<?php echo $current_image_name; ?>">
				<input type="hidden" name="current_catagory_id" value="<?php echo $current_catagory_id; ?>">
				<input type="hidden" name="id" value="<?php echo $id;?>">
				<input type="submit" name="submit" value="Update Product" class="btn_secondary">
			</td>
		</tr>
	</table>
</form>




<?php include('partials/admin_panel_footer.php')?>

<?php
	if(isset($_POST['submit']))
	{
		$id=$_POST['id'];
		$title=$_POST['title'];
		$price=$_POST['price'];
		$current_image_name=$_POST['current_image_name'];
		$current_catagory_id=$_POST['current_catagory_id'];
		$featured=$_POST['featured'];
		$active=$_POST['active'];


		if(isset($_POST['catagory']))
		{
			$new_catagory_id=$_POST['catagory'];
			if(!isset($_FILES['image']['name']))
			{
				//catagory id has been changed but the image remaines the same....so now we have to move the image from the old catagory folder to the new catagory folder and delete the image from the old catagory folder.

				$current_source_path=$_FILES['current_image_name']['tmp_name'];


				$sql4="SELECT * FROM tbl_catagory WHERE id=$new_catagory_id";
				$res4=mysqli_query($conn,$sql4);
				$row4=mysqli_fetch_assoc($res4);
				$folder_name4=$row4['title'];

				$destination_path=SITEURL.'img/'.$folder_name4.'/'.$current_image_name;
				$upload=rename($current_source_path,$destination_path);
				if($upload==false)
				{
					//file upload failed
					$_SESSION['upload_new_image']="<div class='error'>Failed to upload image</div>";
					header('location:'.SITEURL.'admin/manage_product.php');
					die();
				}
				$remove=unlink($current_source_path);
			}
		}
		else
		{
			$new_catagory_id=$current_catagory_id;
		}



		if(isset($_FILES['image']['name']))
		{
			$new_image_name=$_FILES['image']['name'];

			//if image name is available then upload the image,else set the previous image and delete the current image.
			if($new_image_name!="")
			{
				$source_path=$_FILES['image']['tmp_name'];

				$sql3="SELECT * FROM tbl_catagory WHERE id=$current_catagory_id";
				$res3=mysqli_query($conn,$sql3);
				$row3=mysqli_fetch_assoc($res3);
				$folder_name2=$row3['title'];


				$destination_path="../img/".$folder_name2."/".$new_image_name;
				$upload=move_uploaded_file($source_path,$destination_path);
				if($upload==false)
				{
					//file upload failed
					$_SESSION['upload_new_image']="<div class='error'>Failed to upload image</div>";
					header('location:'.SITEURL.'admin/manage_product.php');
					die();
				}
				$current_image_path="../img/".$folder_name."/".$current_image_name;
				$remove=unlink($current_image_path);
			}
			else
			{
				$new_image_name=$current_image_name;
			}
		}
		else
		{
			
			$new_image_name=$current_image_name;
		}


		$sql2="UPDATE tbl_product SET title='$title', image_name='$new_image_name', price=$price, catagory_id=$new_catagory_id, featured='$featured',active='$active' WHERE id=$id";
		$res2=mysqli_query($conn,$sql2);
		if($res2==true)
		{
			$_SESSION['catagory_update']="<div class='success'>Product Updated Successfully</div>";
			header('location:'.SITEURL.'admin/manage_product.php');
		}
		else
		{
			$_SESSION['catagory_update']="<div class='error'>Failed to update Product.</div>";
			header('location:'.SITEURL.'admin/manage_product.php');
		}
	}	

?>