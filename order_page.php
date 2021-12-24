
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Order</title>
	<link rel="stylesheet" type="text/css" href="MyCssStyle.css">
	<link rel="stylesheet" type="text/css" href="order_page_style.css">
</head>
<?php include('header.php');?>
<?php
	if(!isset($_SESSION['user_login']))
	{
		$_SESSION['logout_message']="<div class='error'>Please login to access admin panel</div>";
		header('location:'.SITEURL.'login.php');
	}
?>
<?php
		$location=$_GET['location'];
		$price=$_GET['price'];
		$product_name=$_GET['product_name'];
?>
<section>
	<!--checkout stArt-->
<div class="check_out">

<div class="contain">
<h2 style="padding-left: 300px;">Your order</h2>
		
<div class="checkout-inner">
<form action="" method="POST">
		<!--order List start-->
	<div class="OrderList">
		<img style="width: 307px;" src="<?php echo $location; ?>">
		<p>Product Name :  <span><?php echo $product_name;?></span></p>
		<p>Price:<span><?php echo $price; ?></span></p>
		<p>Quantity:
		<span><input type="number" name="quantity"></span>
		</p>
	</div>
	<!--order list end-->
	<div class="Checkout-form-steps">
	<h4>Personal Detail</h4>
	<input type="text" name="name" class="textfield" placeholder="Your Name" required="">
	<input type="email" name="email" class="textfield" placeholder="Your Email" required="">
	<input type="number" name="phone" class="textfield" placeholder="Your Phone No." required="" ></div>

	<div>
	<h3>Shipping Address</h3>
	<textarea cols="30" rows="10" name="address" placeholder="E.g Street,City,Country"></textarea>
	</div>
	<div class="Checkout-form-steps">
	<h4>Shipping Options</h4>
	<label for="radio1">
	<input type="radio" name="shipping_option" value="7-day delivery" id="radio1">
	Delivery by courier - during 7-day free shipping
	</label>
	<label for="radio2">
	<input type="radio" name="shipping_option" value="24 hour delivery" id="radio2">
	Urgent Delivery- during in 24 hour free shipping
	</label>
	<label for="radio3">
	<input type="radio" name="shipping_option" value="pickup" id="radio3">
	Pickup-You  can pickup 9am to 8pm
	</label>
	</div>
	<div class="Checkout-form-steps">
	<h4>Billing Options</h4>
	<label for="radio4">
	<input type="radio" name="billing_option" value="1" id="radio4">
	In Cash
	</label>
	<label for="radio5">
	<input type="radio" name="billing_option" value="2" id="radio5">
	Visa
	</label>
	<label for="radio6">
	<input type="radio" name="billing_option" value="3" id="radio6">
	Mobile Banking
	</label>
	<label for="radio7">
	<input type="radio" name="billing_option" value="4" id="radio7">
	B-kash
	</label>
	</div>
	<input type="hidden" name="product_name" value="<?php echo $product_name ;?>">
	<input type="hidden" name="product_price" value="<?php echo $price;?>">
	<input type="submit" class="Submitbtn" name="submit" value="Submit Order">
</form>
</div>
<div id="ClearDiv"></div>

</div>
</div>
<!--checkout end-->
</section>
<?php include('footer.php');?>


<?php
	if(isset($_POST['submit']))
	{
		$product_name=$_POST['product_name'];
		$product_price=$_POST['product_price'];
		$product_quantity=$_POST['quantity'];
		$total_price=$product_price*$product_quantity;
		$status="Ordered";
		$order_date= date("Y-m-d h:i:sa");
		$customer_name=$_POST['name'];
		$customer_email=$_POST['email'];
		$customer_phone=$_POST['phone'];
		$address=$_POST['address'];

		$sql="INSERT INTO tbl_order SET product='$product_name', price=$product_price, quantity=$product_quantity, total=$total_price, order_date='$order_date', status='$status', customer_name='$customer_name', customer_email='$customer_email', customer_contact=$customer_phone, customer_adress='$address' ";
		$res=mysqli_query($conn,$sql);
		if($res==true)
		{
			$_SESSION['order']="<div class='success'>You have ordered successfully</div>";
			//header('location:'.SITEURL);
			echo '<meta http-equiv="refresh" content="0; URL=https://localhost/Get_all/index.php">';
		}
		else
		{
			$_SESSION['order']="<div class='error'>Failed to order</div>";
			//header('location:'.SITEURL);
			echo '<meta http-equiv="refresh" content="0; URL=https://localhost/Get_all/index.php">';
		}

	}

?>