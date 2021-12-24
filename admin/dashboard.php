<?php include('partials/admin_panel_header.php');?>
	<h2>Dashboard</h2>
	<?php
		if(isset($_SESSION['login']))
		{
			echo $_SESSION['login'];
			unset($_SESSION['login']);
		}

	?>
	<?php
		$sql="SELECT * FROM tbl_catagory";
		$res=mysqli_query($conn,$sql);
		$count=mysqli_num_rows($res);
	?>
	<div class="dashboard">
		<h2><?php echo $count;?></h2>
		Catagories
	</div>
	<?php
		$sql="SELECT * FROM tbl_product";
		$res=mysqli_query($conn,$sql);
		$count=mysqli_num_rows($res);
	?>
	<div class="dashboard">
		<h2><?php echo $count;?></h2>
		Products
	</div>
	<?php
		$sql="SELECT * FROM tbl_order";
		$res=mysqli_query($conn,$sql);
		$count=mysqli_num_rows($res);
	?>
	<div class="dashboard">
		<h2><?php echo $count;?></h2>
		Total Orders
	</div>
	<?php
		$sql="SELECT SUM(total) AS Total FROM tbl_order";
		$res=mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($res);
		$total_revenue=$row['Total'];
	?>
	<div class="dashboard">
		<h2><?php echo $total_revenue;?></h2>
		Total Revenue
	</div>
	<div class="fixfloat"></div>


<?php include('partials/admin_panel_footer.php');?>
