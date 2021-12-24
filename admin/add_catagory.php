<?php include('partials/admin_panel_header.php')?>

<h2>Add Catagory</h2>
<?php
	if(isset($_SESSION['add_catagory']))
	{
		echo $_SESSION['add_catagory'];
		unset($_SESSION['add_catagory']);
	}
	if(isset($_SESSION['upload']))
	{
		echo $_SESSION['upload'];
		unset($_SESSION['upload']);
	}
?>
<form action="" method="POST" enctype="multipart/form-data"> <!-- enctype property allows us to upload file/image -->
	<table>
		<tr>
			<td>Title :</td>
			<td><input type="text" name="title" placeholder="Catagory title"></td>
		</tr>
		<tr>
			<td>Image :</td>
			<td><input type="file" name="image"></td>
		</tr>
		<tr>
			<td>Featured :</td>
			<td>
				<input type="radio" name="featured" value="Yes"> Yes
				<input type="radio" name="featured" value="No"> No
			</td>
		</tr>
		<tr>
			<td>Active :</td>
			<td>
				<input type="radio" name="active" value="Yes"> Yes
				<input type="radio" name="active" value="No"> No
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" name="submit" value="Add Catagory" class="btn_secondary">
			</td>
		</tr>
	</table>
</form>




<?php include('partials/admin_panel_footer.php')?>

<?php
	if(isset($_POST['submit']))
	{
		$title=$_POST['title'];

		//for radio input type, we need to check whether the button is selected or not
		if(isset($_POST['featured']))
		{
			//featured is selected
			$featured=$_POST['featured'];
		}
		else
		{
			//set the default value
			$featured="No";
		}

		if(isset($_POST['active']))
		{
			//active is selected
			$active=$_POST['active'];
		}
		else
		{
			//set the default value
			$active="Yes";
		}


		//Check whether the image is selected or not and set the value name accordingly.
		//print_r($_FILES['image']); //echo dont print array..printr prints the array...Array ( [name] => Screenshot (63).png [type] => image/png [tmp_name] => C:\xampp\tmp\phpC308.tmp [error] => 0 [size] => 609480 )

		//die(); this stops the program immidiately

		if(isset($_FILES['image']['name']))
		{
			//the input file has a name,so we will upload the image.
			//To upload the image we need image name, source path and destination path.
			$image_name=$_FILES['image']['name'];

			//if image name is available then upload the image,else set a default msg
			if($image_name!="")
			{

			//if same image is uploaded it is replaced with the existing one.
			//Auto rename our image
			//Get the extension of our image(jpg,png,gif)
			$ext=end(explode('.', $image_name));
			//Rename the image
			$image_name="Food_Catagory_".rand(000,999).'.'.$ext;



			$source_path=$_FILES['image']['tmp_name'];
			$destination_path="../img/catagory/".$image_name;
			$upload=move_uploaded_file($source_path,$destination_path);
			if($upload==false)
			{
				//file upload failed
				$_SESSION['upload']="<div class='error'>Failed to upload image</div>";
				header('location:'.SITEURL.'admin/add_catagory.php');
				die();
			}
		}
		}
		else
		{
			//the file don't have a name, so don't upload the image and set the image_name value as blank
			$image_name="";
		}

		$sql="INSERT INTO tbl_catagory SET title='$title', image_name='$image_name', featured='$featured',active='$active'";
		$res=mysqli_query($conn,$sql);

		if($res==true)
		{
			$_SESSION['add_catagory']="<div class='success'>Catagory added successfully</div>";
			header('location:'.SITEURL.'admin/manage_catagory.php');
		}
		else
		{
			$_SESSION['add_catagory']="<div class='error'>Failed to add catagory.</div>";
			header('location:'.SITEURL.'admin/add_catagory.php');
		}
	}
?>