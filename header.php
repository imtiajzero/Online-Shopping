<?php include('configuration/constants.php');?>
	<header>
		<div class="logo">
			<a href="<?php echo SITEURL;?>"><img src="img/logo.png"></a>
		</div>
		<div class="website_name">
			<h2>Get_all Online Shopping</h2>
		</div>
		<?php
		if(!isset($_SESSION['user_login']))
		{
			?>
		<div class="logout">
			<a href="<?php echo SITEURL;?>login.php">Login</a>
		</div>
		<?php
		}
		else
		{
			
			?>
		<div class="logout">

			<a href="user_logout.php">Logout</a>
		</div>
		<?php
		}
		?>
		<form action="<?php echo SITEURL;?>product_search.php" method="POST" class="search" >
			<input type="text" name="search"  
			placeholder="Search Your Product..." >
			<input class="search_submit" type="submit" name="submit" value="search">
		<?php
			if(isset($_SESSION['user_login']))
			{
				$name= $_SESSION['user_login'];
				?>
					<div style="color: white; font-weight: bold; margin-top: -69px; margin-left: 0px;"><?php echo 'Welcome '.$name;?></div>
				<?php
			}
		?>
			
		</form>

	</header>
	<nav id="stick">
		<div class="list">
			<ul class="menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="#">Services</a>
					<ul>
						<li><a href="electronics.php">Electronics</a></li>
						<li><a href="">Foods</a>
							<ul>
								<li><a href="vegetable.php">Vegetables</a></li>
								<li><a href="fast_food.php">Fast Foods</a></li>
							</ul>
						</li>
						<li><a href="#sd">Dresses</a>
							<ul>
								<li><a href="gentz.php">Gentz Corner</a></li>
								<li><a href="womenz.php">Womenz Corner</a></li>
							</ul>
						</li>
						<li><a href="shoes.php">Shoes</a>
						<li><a href="books.php">Books</a>
					</ul>
				</li>
				<li><a href="about_us.php">About us</a></li>
				<li><a href="contact_us.php">Contact us</a></li>
				<li><p id="date"><?php echo "Today is ".date("l"); ?></p><p id="date"><?php echo date("d/m/Y"); ?></p></li>
			</ul>
		</div>
	</nav>
	<div class="scroll">
		<div>
		</div>
		<marquee direction="left">
			Welcome to Get_all Online Shopping, which is owned and operated by Ashop Foundation and/or Ashop's subsidiary, affiliate or related company . 
We have fixed our milestone that we will spread the daily necessaries in our remote villages also. We provide all the services like electronics product, foods, shoping, books etc. It’s a combination of several mini e-commerce site such as onlike bookstore site, online shoping, online food delivery, electronics product .
Ashop maintains the Site as a service to its visitors, subject to the following Terms and Conditions concerning the use of the Site ('Terms of Use').  Ashop reserves the right to modify content on the Site and these Terms of Use periodically without prior notice.
		</marquee>
		<div></div>
	</div>