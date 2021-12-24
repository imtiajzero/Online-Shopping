<?php include('../configuration/constants.php');?>
<?php

	if (isset($_GET['id']) AND isset($_GET['image_name'])) 
	{
		$id=$_GET['id'];
		$image_name=$_GET['image_name'];
		//Remove the image file if available
		if($image_name!="")
		{
			//image is available. so remove it
			$path="../img/catagory/".$image_name;
			//remove the image
			$remove= unlink($path);
			if($remove==false)
			{
				$_SESSION['remove_image']="<div class='error'>Failed to remove catagory image</div>";
				header('location:'.SITEURL.'admin/manage_catagory.php');
				die();
			}
		}
		$sql="DELETE FROM tbl_catagory WHERE id=$id";
		$res=mysqli_query($conn,$sql);	 	
		if($res==true)
		{
			$_SESSION['delete_catagory']="<div class='success'>Catagory Delete successfully</div>";
			header('location:'.SITEURL.'admin/manage_catagory.php');
		}
		else
		{
			$_SESSION['delete_catagory']="<div class='error'>Failed to delete catagory</div>";
			header('location:'.SITEURL.'admin/manage_catagory.php');
		}
	}
	else
	{
		header('location:'.SITEURL.'manage_product.php');
	}
?>