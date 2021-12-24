<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>E-shopping</title>
	<!--for nivo slider-->
		 <link rel="stylesheet" href="themes/default/default.css" type="text/css" media="screen" />
	    <link rel="stylesheet" href="themes/light/light.css" type="text/css" media="screen" />
	    <link rel="stylesheet" href="themes/dark/dark.css" type="text/css" media="screen" />
	    <link rel="stylesheet" href="themes/bar/bar.css" type="text/css" media="screen" />
	    <link rel="stylesheet" href="nivo-slider.css" type="text/css" media="screen" />
		<!--end-->
	<link rel="stylesheet" type="text/css" href="MyCssStyle.css">
</head>
<body>
<?php include('header.php');?>
<?php include('product.php');?>
	<section>
		<?php
	if(isset($_SESSION['order']))
	{
		echo $_SESSION['order'];
		unset($_SESSION['order']);
	}
	if(isset($_SESSION['login']))
	{
		echo $_SESSION['login'];
		unset($_SESSION['login']);
	}
?>
		<div><img src="img/front.jpg" height="400px" width="1230px"></div>
		<div class="content">
			<br><br><br>
			<h1>What is Get_all for?</h1><br><br>
			<p style="font-size: 18px; word-spacing: 3px;">We have come up with an online service which will give services throughout the country with the daily necessaries.
				Such as electronic devices, foods, dresses, shoes etc.
				We have fixed our milestone that we will spread the daily necessaries in our remote villages also.
					Get_all offers products and services on the Site. When you enroll to obtain a product or service from Ashop on the Site, you accept the specific agreement applicable to that product or service. Your use of any such product or service offered on the Site is governed by the Terms and Conditions in the agreement for that product or service. Except as provided in that agreement, Ashop does not warrant that any product descriptions or content contained in this Web site is accurate, current, reliable, complete or error-free.</p>
			<br><br><br>
			<h2>&nbsp&nbsp&nbsp About</h2>
			<div class="detailes">
				<marquee width="100%" direction="up" height="290px" scrollamount="2">
					Welcome to <b><i style="color: black;">Get_all Online Shopping</i></b>, which is owned and operated by Ashop and/or Ashop's subsidiary, affiliate or related company (throughout these Terms of Use 'Ashop' refers collectively to Ashop and its subsidiaries, affiliates and related companies) (the 'Site'). Ashop maintains the Site as a service to its visitors, subject to the following Terms and Conditions concerning the use of the Site ('Terms of Use'). When you use the Site, you accept the Terms of Use; if you do not agree to the Terms of Use you may not use the Site. Ashop reserves the right to modify content on the Site and these Terms of Use periodically without prior notice.<br><br><br>

					<b><i style="color: black;">Use of Content on the Site :</i></b><br><br>
					You may view, download and print contents from the Site subject to the following conditions: (a) the content may be used solely for information purposes; and (b) the content may not be modified or altered in any way. You may not republish, distribute, prepare derivative works, or otherwise use the content other than as explicitly permitted herein.<br><br><br>

					<b><i style="color: black;">Reviews, Comments, Communications, And Other Content :</i></b><br>
					You may submit comments and provide other content so long as the content is not obscene, illegal, threatening, or defamatory and so long as the content does not invade the privacy or infringe the intellectual property of a third party. Further, such content may not contain software viruses, mass mailings, chain letters, or any form of 'spam.' You may not use a false e-mail address, impersonate any person or entity, or otherwise mislead as to the origin of the information.<br><br><br>
					<b><i style="color: black;">Products and Services Offered By Get_all :</i></b><br><br>
					Get_all offers products and services on the Site. When you enroll to obtain a product or service from Ashop on the Site, you accept the specific agreement applicable to that product or service. Your use of any such product or service offered on the Site is governed by the Terms and Conditions in the agreement for that product or service. Except as provided in that agreement, Ashop does not warrant that any product descriptions or content contained in this Web site is accurate, current, reliable, complete or error-free.
				</marquee>
			</div>
		</div>	
		<div class="sidebar">
			<ul>
				<h4>Cheak Out</h4><br>
				<li><a href="fast_food.php">Fast Foods</a></li><br>
				<li><a href="womenz.php">Womenz dress Collection</a></li><br>
				<li><a href="Gentz.php">Gentz Collection</a></li><br>
				<li><a href="electronics.php">Electronic Products</a></li><br>
				<li><a href="shoes.php">Varities Shoes</a></li><br>
				<li><a href="vegetable.php">Vegetables</a></li><br>
				<li><a href="about_us.php">About Us</a></li><br>
				<li><a href="contact_us.php">Contact Us</a></li><br>
			</ul>
		</div>
		<div class="trending">
			<br><br><br><h1>&nbsp&nbsp&nbsp Trending</h1>
			<?php
			echo vegetable("img/Gentz/formal.jpg",'Formal Office Suit-D10',1900);
		    echo vegetable("img/Womenz/hande_ercel.jpg",'Fancy Hat',300);
		    echo vegetable("img/Fast_Food/pancake.jpg",'Pancake',120);
		    echo vegetable("img/vegetable/carrot.jpg",'Carrot',20);
			?>	
			<div class="fixfloat"></div>
		</div><br><br><br><br>
		<div class="slider">
			<h1 style="text-align: center;">Catagories</h1><br><br>
			
			<!--Slider Start-->
		    <div class="slider-wrapper theme-default">
	            <div id="slider" class="nivoSlider">
	                <img src="img/electronics.jpg" data-thumb="img/electronics.jpg" alt="" title="Catagory: Electronics" />
	                <img src="img/Fast_Food.jpg" data-thumb="img/food.jpg" alt="" title="Catagory: Fast Foods" />
	                <img src="img/Books.jpg" data-thumb="img/Books.jpg" alt="" title="Catagory: Fast Foods" />
	                <img src="img/shoes.jpg" data-thumb="img/shoes.jpg" alt="" data-transition="slideInLeft" title="Catagory: Shoes" />
	                <img src="img/Vegetable.jpg" data-thumb="img/Vegetables.jpg" alt="" data-transition="slideInLeft" title="Catagory: Vegetables" />
	                <img src="img/gentz.jpg" data-thumb="img/gentz.jpg" alt="" title="Catagory: Gentz Collection" />
	                <img src="img/dress.jpg" data-thumb="img/dress.jpg" alt="" title="Catagory: Womenz Collection" />
	            </div>
	            <div id="htmlcaption" class="nivo-html-caption">
	                <strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>. 
	            </div>
	        </div>

    <!--SLider End-->
		</div>
		<div class="electronics">
			<h1>&nbsp&nbsp&nbsp&nbsp&nbsp Electronics</h1>
			<?php
			$sql="SELECT * FROM tbl_catagory WHERE active='Yes' AND title='Electronics'";
			$res=mysqli_query($conn,$sql);
			$row=mysqli_fetch_assoc($res);
			$catagory=$row['title'];
			$catagory_id=$row['id'];



			$sql2="SELECT * FROM tbl_product WHERE active='Yes'AND featured='Yes' AND catagory_id=$catagory_id LIMIT 8 ";
			$res2=mysqli_query($conn,$sql2);
			

			$count=mysqli_num_rows($res2);
			if($count>0)
			{
				//product available
				while($row2=mysqli_fetch_assoc($res2))
				{
					$id=$row2['id'];
					$image_name=$row2['image_name'];
					$location='img/Electronics/'.$image_name;
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
			<div class="fixfloat"></div>
		</div><br><br><br>
		<div class="dress">
			<h1>&nbsp&nbsp&nbsp&nbsp&nbsp Gentz Collection</h1>
			<?php
			$sql="SELECT * FROM tbl_catagory WHERE active='Yes' AND title='Gentz'";
			$res=mysqli_query($conn,$sql);
			$row=mysqli_fetch_assoc($res);
			$catagory=$row['title'];
			$catagory_id=$row['id'];



			$sql2="SELECT * FROM tbl_product WHERE active='Yes'AND featured='Yes' AND catagory_id=$catagory_id LIMIT 8 ";
			$res2=mysqli_query($conn,$sql2);
			

			$count=mysqli_num_rows($res2);
			if($count>0)
			{
				//product available
				while($row2=mysqli_fetch_assoc($res2))
				{
					$id=$row2['id'];
					$image_name=$row2['image_name'];
					$location='img/Gentz/'.$image_name;
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
			<div class="fixfloat"></div>
		</div><br><br><br>
		<div class="dress">
			<h1>&nbsp&nbsp&nbsp&nbsp&nbsp Womenz Collection</h1>
			<?php
			$sql="SELECT * FROM tbl_catagory WHERE active='Yes' AND title='Womenz'";
			$res=mysqli_query($conn,$sql);
			$row=mysqli_fetch_assoc($res);
			$catagory=$row['title'];
			$catagory_id=$row['id'];



			$sql2="SELECT * FROM tbl_product WHERE active='Yes'AND featured='Yes' AND catagory_id=$catagory_id LIMIT 8 ";
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
			<div class="fixfloat"></div>
		</div><br><br><br>
		<div class="foods">
			<h1>&nbsp&nbsp&nbsp&nbsp&nbsp Fast Foods</h1>
			<?php
			$sql="SELECT * FROM tbl_catagory WHERE active='Yes' AND title='Fast_Food'";
			$res=mysqli_query($conn,$sql);
			$row=mysqli_fetch_assoc($res);
			$catagory=$row['title'];
			$catagory_id=$row['id'];



			$sql2="SELECT * FROM tbl_product WHERE active='Yes'AND featured='Yes' AND catagory_id=$catagory_id LIMIT 8 ";
			$res2=mysqli_query($conn,$sql2);
			

			$count=mysqli_num_rows($res2);
			if($count>0)
			{
				//product available
				while($row2=mysqli_fetch_assoc($res2))
				{
					$id=$row2['id'];
					$image_name=$row2['image_name'];
					$location='img/Fast_Food/'.$image_name;
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
			<div class="fixfloat"></div>
		</div><br><br><br>
		<div class="Vegetable">
			<h1>&nbsp&nbsp&nbsp&nbsp&nbsp Vegetables</h1>
			<?php
			$sql="SELECT * FROM tbl_catagory WHERE active='Yes' AND title='Vegetables'";
			$res=mysqli_query($conn,$sql);
			$row=mysqli_fetch_assoc($res);
			$catagory=$row['title'];
			$catagory_id=$row['id'];



			$sql2="SELECT * FROM tbl_product WHERE active='Yes'AND featured='Yes' AND catagory_id=$catagory_id LIMIT 8 ";
			$res2=mysqli_query($conn,$sql2);
			

			$count=mysqli_num_rows($res2);
			if($count>0)
			{
				//product available
				while($row2=mysqli_fetch_assoc($res2))
				{
					$id=$row2['id'];
					$image_name=$row2['image_name'];
					$location='img/Vegetables/'.$image_name;
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
			<div class="fixfloat"></div>
		</div><br><br><br>
		<div class="shoes">
			<h1>&nbsp&nbsp&nbsp&nbsp&nbsp Shoes</h1>
			<?php
			$sql="SELECT * FROM tbl_catagory WHERE active='Yes' AND title='Shoes'";
			$res=mysqli_query($conn,$sql);
			$row=mysqli_fetch_assoc($res);
			$catagory=$row['title'];
			$catagory_id=$row['id'];



			$sql2="SELECT * FROM tbl_product WHERE active='Yes'AND featured='Yes' AND catagory_id=$catagory_id LIMIT 8 ";
			$res2=mysqli_query($conn,$sql2);
			

			$count=mysqli_num_rows($res2);
			if($count>0)
			{
				//product available
				while($row2=mysqli_fetch_assoc($res2))
				{
					$id=$row2['id'];
					$image_name=$row2['image_name'];
					$location='img/Shoes/'.$image_name;
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
			<div class="fixfloat"></div>
		</div><br><br><br>
		<div class="books">
			<h1>&nbsp&nbsp&nbsp&nbsp&nbsp Book Store</h1>
			<?php
			$sql="SELECT * FROM tbl_catagory WHERE active='Yes' AND title='Books'";
			$res=mysqli_query($conn,$sql);
			$row=mysqli_fetch_assoc($res);
			$catagory=$row['title'];
			$catagory_id=$row['id'];



			$sql2="SELECT * FROM tbl_product WHERE active='Yes'AND featured='Yes' AND catagory_id=$catagory_id LIMIT 8 ";
			$res2=mysqli_query($conn,$sql2);
			

			$count=mysqli_num_rows($res2);
			if($count>0)
			{
				//product available
				while($row2=mysqli_fetch_assoc($res2))
				{
					$id=$row2['id'];
					$image_name=$row2['image_name'];
					$location='img/Books/'.$image_name;
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
			<div class="fixfloat"></div>
		</div>
	</section>
	<!--for nivo slider-->
	<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
    
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
<?php include('footer.php');?>

