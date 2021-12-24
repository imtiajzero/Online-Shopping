<?php echo include('partials/admin_panel_header.php');?>
<h2>Orders</h2>
<?php
	if(isset($_SESSION['update_status']))
	{
		echo $_SESSION['update_status'];
		unset($_SESSION['update_status']);
	}
?>
<table>
	<tr>
		<th>S.N.</th>
		<th>Product</th>
		<th>Price</th>
		<th>Qty.</th>
		<th>Total</th>
		<th>Status</th>
		<th>Order Date</th>
		
		<th>C. Email</th>
		<th>C. Contact</th>
		<th>C. Address</th>
		<th>Action</th>
	</tr>
	<?php
		$sql="SELECT * FROM tbl_order";
		$res=mysqli_query($conn,$sql);
		$count=mysqli_num_rows($res);
		if($count>0)
		{
			$serial=1;
			//We have data in database
			while ($row=mysqli_fetch_assoc($res)) {

				$id=$row['id'];
				$product_name=$row['product'];
				$product_price=$row['price'];
				$product_quantity=$row['quantity'];
				$total_price=$row['total'];
				$status=$row['status'];
				$order_date=$row['order_date'];
				$customer_name=$row['customer_name'];
				$customer_email=$row['customer_email'];
				$customer_phone=$row['customer_contact'];
				$address=$row['customer_adress'];
				?>

				<tr>
					<td style="padding: 3px 7px;"><?php echo $serial++ ;?></td>
					<td style="padding: 3px 7px;"><?php echo $product_name ;?></td>
					<td style="padding: 3px 7px;"><?php echo $product_price ;?></td>
					<td style="padding: 3px 7px;"><?php echo $product_quantity ;?></td>
					<td style="padding: 3px 7px;"><?php echo $total_price ;?></td>

					<td style="padding: 3px 7px;">
						<?php 
							if($status=='Ordered')
							{
								echo $status;
							}
							elseif ($status=='On Delivery') {
								echo "<lable style='color:orange'>$status</lable>";
							}
							elseif ($status=='Delivered') {
								echo "<lable style='color:green'>$status</lable>";
							}
							elseif ($status=='Canceled') {
								echo "<lable style='color:red'>$status</lable>";
							}
						?>
						
					</td>

					<td style="padding: 3px 7px;"><?php echo $order_date ;?></td>
					<td style="padding: 3px 7px;"><?php echo $customer_email ;?></td>
					<td style="padding: 3px 7px;"><?php echo $customer_phone ;?></td>
					<td style="padding: 3px 7px;"><?php echo $address ;?></td>
					<td style="padding: 3px 7px;"><a href="update_order.php?id=<?php echo $id;?>& status=<?php echo $status;?>" class="btn_secondary">Update</a></td>
				</tr>
				<?php
			}
		}
		else
		{
			//We do not have data in our database
			//We will display the message inside table
			?>

			<tr>
				<td colspan="6"> <div class="error"> No Order Available.</div></td>
			</tr>

			<?php
		}

	?>	
</table>




<?php echo include('partials/admin_panel_footer.php');?>