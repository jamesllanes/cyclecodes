<?php
	session_start();
	require '../dbconfig/config.php';
?>
<!DOCTYPE html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/bikeparts.css">
	<title>Cycle Codes | Bike Parts | Categories</title>
	<meta name="description" content="Write some words to describe your html page">
</head>
<body class="preload">
	<div class="blended_grid">
		<div id="fixed_top">
			<div id="TopNav"> <!--logo, signin, search, customer service, others-->
				<a href="../newhome.php"><img src="../cycle_codes.png" width="14%"></a>
				<div id="Login_Container1">
					<div id="Login_Content">
						<?php  
							if(empty($_SESSION['customer_ID']))
							{
								echo "Welcome Guest!";?>
								<br><a href="../index.php"> Create account | Sign in</a><?php
							}
							elseif(!empty($_SESSION['customer_ID']))
							{
								echo "Welcome<br><font color='red'><b>".$_SESSION['fullname']."</b></font>!";
								echo "<form action='../logout.php' method='POST'><input type='submit' value='Logout' class='logout'/></form>";
							}
							else
							{
								echo '<script type="text/javascript"> alert("Invalid Username or Password!") </script>';
							} 
						?>
					</div>
				</div>
				<div id="Search">
					<form action="search.php" method="GET">
						<div id="Search_Content">
							<input type="text" id="search_box" name="search" placeholder="Search Product">
							<button type="submit" id="search_btn"><img src="css/images/search3.png" width="20px"></button>
						</div>
					</form>
				</div>
			</div>
			<div id="MenuNav"> <!--shop, sale&specials, wishlist, careers, about us-->
				<div class="dropdown">
				  <button class="dropbtn">Categories</button>
				  <div class="dropdown-content">
				    <a href="builtbikes.php">Built Bikes</a>
				    <a href="accessories.php">Accessories</a>
				    <a href="brakeset.php">Brakeset</a>
				    <a href="cables.php">Cables</a>
				    <a href="chain.php">Chain</a>
				    <a href="cogs.php">Cogs</a>
				    <a href="crankset.php">Crankset</a>
				  </div>
				</div>
				<div class="tab">
					<a href="../sale_and_specials.php"><button class="tablinks">Sale & Specials</button></a>
					<?php
					if(empty($_SESSION['customer_ID']))
					{

					}
					elseif(!empty($_SESSION['customer_ID']))
					{
					?>
					<a href='../wishlist.php?customer_ID=<?php echo $_SESSION["customer_ID"]?>&w=0'><button class="tablinks">Wishlist</button></a>
					<?php
					}
					?>
				  <a href="careers.php"><button class="tablinks">Careers</button></a>
				  <a href="about_us.php"><button class="tablinks">About Us</button></a>
				</div>
				<?php
					if(empty($_SESSION['customer_ID']))
					{
						?>
						<div class="cart_tab2">
						</div>
						<?php
					}
					elseif(!empty($_SESSION['customer_ID']))
					{
						$count=0;
						$select_cart="SELECT * FROM cart WHERE customer_ID='$_SESSION[customer_ID]'";
						$result2=mysqli_query($connect,$select_cart);
						if(mysqli_num_rows($result2)>0)
						{
							while($row=mysqli_fetch_array($result2))
							{
								$count=$count+1;
							}
						}
						else
						{
							$count=0;
						}
						?>
						<div class="cart_tab">
						<a href='cart.php?customer_ID=<?php echo $_SESSION["customer_ID"]?>&c=0'><button class="tablinks">My Cart: <?php echo $count ?> Items</button></a>
						</div>
						<?php
					}
					?>
			</div>
		</div>
		<div id="Middle"> <!--breadcrumb-->
			<div class="breadcrumbs">
				<p>Products > Bike Parts</p>
			</div>
		</div>
		<div id="Center"> <!--category links-->
			<div class="wrapper">
				<div class="one">
					<a class="categorynames">Accessories</a><br>
					<a href="accessories.php" class="viewall">VIEW ALL ></a>
				</div>
				<div class="two">
					<a class="categorynames">Brakeset</a><br>
					<a href="brakeset.php" class="viewall">VIEW ALL ></a>
				</div>
				<div class="three">
					<a class="categorynames">Cables</a><br>
					<a href="cables.php" class="viewall">VIEW ALL ></a>
				</div>
				<div class="four">
					<a class="categorynames">Chain</a><br>
					<a href="chain.php" class="viewall">VIEW ALL ></a>
				</div>
				<div class="five">
					<a class="categorynames">Cogs</a><br>
					<a href="cogs.php" class="viewall">VIEW ALL ></a>
				</div>
				<div class="six">
					<a class="categorynames">Crankset</a><br>
					<a href="crankset.php" class="viewall">VIEW ALL ></a>
				</div>
		</div>
	</div>
</body>
</html>