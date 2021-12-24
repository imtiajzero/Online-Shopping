<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Product Search</title>
	<link rel="stylesheet" type="text/css" href="MyCssStyle.css">
</head>
<body>
	<?php include('header.php');?>
    <?php include('product.php');?>
    <section>

    <?php
    	$search=$_POST['search'];
    	$sql="SELECT * FROM tbl_product WHERE title LIKE '%$search%'";
    	$res=mysqli_query($conn,$sql);
    	$count=mysqli_num_rows($res);
    	if($count>0)
    	{
    		while($row=mysqli_fetch_assoc($res))
    		{
    			$id=$row['id'];
    			$title=$row['title'];
    			$image_name=$row['image_name'];
    			$catagory_id=$row['catagory_id'];
    			$price=$row['price'];


    			$sql2="SELECT * FROM tbl_catagory WHERE id=$catagory_id";
    			$res2=mysqli_query($conn,$sql2);
    			$row2=mysqli_fetch_assoc($res2);
    			$folder_name=$row2['title'];

    			$location=SITEURL.'img/'.$folder_name.'/'.$image_name;
    			echo vegetable($location,$title,$price);
    		}
    	}
    	else
    	{
    		echo "<div class='error'>Food not found</div>";
    	}
    ?>
    <div class="fixfloat"></div>
    </section>
    <?php include('footer.php');?>
</body>
</html>