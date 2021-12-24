<?php include('../configuration/constants.php');?>
<?php

	if (isset($_GET['id']) AND isset($_GET['image_name']) AND isset($_GET['catagory_name'])) 
	{
		$id=$_GET['id'];
		$image_name=$_GET['image_name'];
		$catagory_name=$_GET['catagory_name'];
		//Remove the image file if available
		if($image_name!="")
		{
			//image is available. so remove it
			$path="../img/".$catagory_name."/".$image_name;
			//remove the image
			$remove= unlink($path);
			if($remove==false)
			{
				$_SESSION['remove_image']="<div class='error'>Failed to remove product image</div>";
				header('location:'.SITEURL.'admin/manage_product.php');
				die();
			}
		}
		$sql="DELETE FROM tbl_product WHERE id=$id";
		$res=mysqli_query($conn,$sql);	 	
		if($res==true)
		{
			$_SESSION['delete_product']="<div class='success'>Product Deleted successfully</div>";
			header('location:'.SITEURL.'admin/manage_product.php');
		}
		else
		{
			$_SESSION['delete_product']="<div class='error'>Failed to delete product</div>";
			header('location:'.SITEURL.'admin/manage_product.php');
		}
	}
	else
	{
		header('location:'.SITEURL.'admin/manage_product.php');
	}
?>