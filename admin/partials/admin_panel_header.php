<?php 
	include('../configuration/constants.php');
	include('admin_login_check.php');

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="admin_style.css">
</head>
<body>
	<header>
		<div class="logo">
			<img src="../img/logo.png">
		</div>
		<div class="website_name">
			<h2>Get_all Online Shopping </h2>
		</div>
		<div class="logout">
			<a href="admin_logout.php">Logout</a>
		</div>

	</header>
	<section>
		<div class="admin_menu">
			<table><br>
				<tr>
					<th>Admin Panel<br><br><br></th>
					<td><a href="dashboard.php">Home</a></td>
					<td><a href="manage_admin.php">Admin</a></td>
					<td><a href="manage_catagory.php">Catagory</a></td>
					<td><a href="manage_product.php">Product</a></td>
					<td><a href="manage_order.php">Orders</a></td>
					<td><a href="customers_info.php">Our Customers</a></td>
					<td><a href="customers_queries.php">Customer's queries</a></td>
				</tr>
			</table>
			<br><br><br>
		</div>
		<div class="content_wrapper">
			<div class="content">