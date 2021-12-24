<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>E-shopping</title>
	<link rel="stylesheet" type="text/css" href="MyCssStyle.css">
</head>
<body>
<?php include('header.php');?>
<?php include('product.php');?>
	<section>
		<h2>Womenz Collection</h2>
		<?php
			$sql="SELECT * FROM tbl_catagory WHERE active='Yes' AND title='Womenz'";
			$res=mysqli_query($conn,$sql);
			$row=mysqli_fetch_assoc($res);
			$catagory=$row['title'];
			$catagory_id=$row['id'];



			$sql2="SELECT * FROM tbl_product WHERE active='Yes' AND catagory_id=$catagory_id ";
			$res2=mysqli_query($conn,$sql2);
			

			$count=mysqli_num_rows($res2);
			if($count>0)
			{
				//product available
				while($row2=mysqli_fetch_assoc($res2))
				{
					$id=$row2['id'];
					$image_name=$row2['image_name'];
					$location='img/Womenz/'.$image_name;
					$title=$row2['title'];
					$price=$row2['price'];
					echo vegetable($location,$title,$price);
				}
			}
			else
			{
				?>
				<div class="error">No product available</div>
				<?php
			}
		?>	
	</section>
<?php include('footer.php');?>

