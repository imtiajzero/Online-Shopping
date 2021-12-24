<?php include('partials/admin_panel_header.php')?>

<h2>Update Catagory</h2>
<?php
	if(isset($_SESSION['']))
	{
		echo $_SESSION[''];
		unset($_SESSION['']);
	}
	if(isset($_SESSION['']))
	{
		echo $_SESSION[''];
		unset($_SESSION['']);
	}
?>

<?php
	if(isset($_GET['id']))
	{
		$id= $_GET['id'];
		$sql="SELECT * FROM tbl_catagory WHERE id=$id";
		$res=mysqli_query($conn,$sql);
		$count=mysqli_num_rows($res);
		if($count==1)
		{
			$row=mysqli_fetch_assoc($res);
			$title=$row['title'];
			$current_image_name=$row['image_name'];
			$featured=$row['featured'];
			$active=$row['active'];
		}
		else
		{
			$_SESSION['no_catagory_found']="<div class='error'>Catagory not found</div>";
			header('location:'.SITEURL.'admin/manage_catagory.php');
		}
	}
	else
	{
		header('location'.SITEURL.'admin/manage_category.php'); 
	}

?>

<form action="" method="POST" enctype="multipart/form-data"> <!-- enctype property allows us to upload file/image -->
	<table>
		<tr>
			<td>Title :</td>
			<td><input type="text" name="title" placeholder="Catagory title" value="<?php echo $title;?>"></td>
		</tr>
		<tr>
			<td>Current Image :</td>
			<td>
				<?php
					if($current_image_name=="")
				 	{ 									 		echo "<div class='error'>Image not added.</div>";
				 	}
				 	else
				 	{
						?>						 		
						<img src="<?php echo SITEURL;?>img/catagory/<?php echo $current_image_name;?>" width="70px" >
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
				<input type="hidden" name="id" value="<?php echo $id;?>">
				<input type="submit" name="submit" value="Update Catagory" class="btn_secondary">
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
		$current_image_name=$_POST['current_image_name'];
		$featured=$_POST['featured'];
		$active=$_POST['active'];
		if(isset($_FILES['image']['name']))
		{
			$new_image_name=$_FILES['image']['name'];

			//if image name is available then upload the image,else set the previous image and delete the current image.
			if($new_image_name!="")
			{

				//if same image is uploaded it is replaced with the existing one.
				//Auto rename our image
				//Get the extension of our image(jpg,png,gif)
				$ext=end(explode('.', $new_image_name));
				//Rename the image
				$new_image_name="Food_Catagory_".rand(000,999).'.'.$ext;



				$source_path=$_FILES['image']['tmp_name'];
				$destination_path="../img/catagory/".$new_image_name;
				$upload=move_uploaded_file($source_path,$destination_path);
				if($upload==false)
				{
					//file upload failed
					$_SESSION['upload_new_image']="<div class='error'>Failed to upload image</div>";
					header('location:'.SITEURL.'admin/manage_catagory.php');
					die();
				}
				$current_image_path="../img/catagory/".$current_image_name;
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


		$sql2="UPDATE tbl_catagory SET title='$title', image_name='$new_image_name', featured='$featured',active='$active' WHERE id=$id";
		$res2=mysqli_query($conn,$sql2);
		if($res2==true)
		{
			$_SESSION['catagory_update']="<div class='success'>Catagory Updated Successfully</div>";
			header('location:'.SITEURL.'admin/manage_catagory.php');
		}
		else
		{
			$_SESSION['catagory_update']="<div class='error'>Failed to update catagory.</div>";
			header('location:'.SITEURL.'admin/manage_catagory.php');
		}
	}	

?>