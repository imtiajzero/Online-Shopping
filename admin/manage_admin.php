<?php include('partials/admin_panel_header.php');?>
				<h2>Manage Admin</h2>
				<?php
					if(isset($_SESSION['add']))
					{
						echo $_SESSION['add'];
						unset($_SESSION['add']);
					}
					if(isset($_SESSION['delete']))
					{
						echo $_SESSION['delete'];
						unset($_SESSION['delete']);
					}
					if(isset($_SESSION['update_admin']))
					{
						echo $_SESSION['update_admin'];
						unset($_SESSION['update_admin']);
					}
					if(isset($_SESSION['admin_not_found']))
					{
						echo $_SESSION['admin_not_found'];
						unset($_SESSION['admin_not_found']);
					}
					if(isset($_SESSION['password_updated']))
					{
						echo $_SESSION['password_updated'];
						unset($_SESSION['password_updated']);
					}
					if(isset($_SESSION['password_not_matched']))
					{
						echo $_SESSION['password_not_matched'];
						unset($_SESSION['password_not_matched']);
					}
				?><br><br>
				<a href="add_admin.php" class="btn_primary">Add Admin</a>   <br><br>
				
				<table>
					<tr>
						<th>ID</th>
						<th>Full_name</th>
						<th>User_name</th>
						<th style="text-align: center;">Actions</th>
					</tr>
					<?php
						//Query to get all admin
						$sql="SELECT * FROM tbl_admin";
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
									$full_name=$rows['full_name'];
									$username=$rows['username'];
									?>		<!--BREAK THE PHP-->
										<tr>
											<td><?php echo $serial++?></td>
											<td><?php echo $full_name?></td>
											<td><?php echo $username?></td>
											<td>
												<div style="width: 240px;">
													<a href="<?php echo SITEURL;?>/admin/update_password.php?id=<?php echo $id;?>" class="btn_primary">Change password</a>
												    <a href="<?php echo SITEURL;?>/admin/update_admin.php?id=<?php echo $id;?>" class="btn_secondary">Update</a>
											        <a href="<?php echo SITEURL;?>/admin/delete_admin.php?id=<?php echo $id;?>" class="btn_danger">Delete</a>
											    </div>
											</td>
										</tr>
									<?php
								}
							}
						}
					?>
					
				</table>

<?php include('partials/admin_panel_footer.php');?>