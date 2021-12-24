<?php include('partials/admin_panel_header.php');?>
<h2>Our Customer's Information</h2>



<table>
		<tr>
			<th>ID</th>
			<th>Username</th>
			<th>Email</th>
			
		</tr>
		<?php
			//Query to get all admin
			$sql="SELECT * FROM tbl_user_info";
			//Execute the query
			$res=mysqli_query($conn,$sql);

			//cheak whether the query is executed or not
			if($res==TRUE)
			{
				$count=mysqli_num_rows($res);
				if($count>0)
				{
					$serial=1;
					while($rows=mysqli_fetch_assoc($res))
					{
						$id=$rows['id'];
						$email=$rows['email'];
						$username=$rows['name'];
						?>		<!--BREAK THE PHP-->
							<tr>
								<td><?php echo $serial++;?></td>
								<td><?php echo $username;?></td>
								<td><?php echo $email;?></td>
							</tr>
						<?php
					}
				}
			}
		?>
					
	</table>

<?php include('partials/admin_panel_footer.php');?>