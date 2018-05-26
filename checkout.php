<?php
	session_start();
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="bikeparts/css/accesories.css">
	<title>Cycle Codes | Bike Parts | Accessories</title>
	<meta name="description" content="Write some words to describe your html page">
</head>
<body class="preload">
	<div class="blended_grid">
		<div id="fixed_top">
			<div id="TopNav"> <!--logo, signin, search, customer service, others-->
				<a href="newhome.php"><img src="cycle_codes.png" width="14%"></a>
				<div id="Login_Container1">
					<div id="Login_Content">
						<?php  
							if(empty($_SESSION['customer_ID']))
							{
								echo "Welcome Guest!";?>
								<br><a href="index.php"> Create account | Sign in</a><?php
							}
							elseif(!empty($_SESSION['customer_ID']))
							{
								echo "Welcome<br><font color='red'><b>".$_SESSION['fullname']."</b></font>!";
								echo "<form action='logout.php' method='POST'><input type='submit' value='Logout' class='logout'/></form>";
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
				    <a href="paints_and_sundries.php">Paints and Sundries</a>
				    <a href="../2Tools/tools.php">Tools</a>
				    <a href="../3Electrical/electrical.php">Electrical</a>
				    <a href="../4Plumbing/plumbing.php">Plumbing</a>
				    <a href="../5Home_Hardware/home_hardware.php">Home Hardware</a>
				    <a href="../6Houseware/houseware.php">Houseware</a>
				    <a href="../7Lawn/lawn.php">Lawn and Outdoor</a>
				    <a href="../8Automotive/automotive.php">Automotive</a>
				    <a href="../9Appliances/appliances.php">Small Appliances</a>
				    <a href="../10Chemicals/chemicals.php">Chemicals and Batteries</a>
				    <a href="../11Pets/pets.php">Pets</a>
				  </div>
				</div>
				<div class="tab">
				  <button class="tablinks" onclick="#">Sale & Specials</button>
				  <button class="tablinks" onclick="location.href='wishlist.php?customer_ID=<?php echo $_SESSION["customer_ID"]?>&w=0'">Wishlist</button>
				  <button class="tablinks" onclick="#">Careers</button>
				  <button class="tablinks" onclick="#">About Us</button>
				</div>
				<div class="cart_tab">
					<p>Cart: 0 Items</p>
				</div>
			</div>
		</div>
		<div id="Middle"> <!--breadcrumb-->
			<div class="breadcrumbs">
				<p>Products > Bike Parts > Accesories</p>
			</div>
		</div>
		<div id="Center"> <!--category links-->
			<div id="subcategories_container">
				<div class="categories_header"><h3>Categories</h3></div><br>
				<div class="subcategories_content">
					<ul class="sublinks">
						<li><a href="all_bikeparts.php">All</a></li><br>
						<li><a href="accessories.php" class="active">Accessories</a></li><br>
						<li><a href="brakeset.php">Brakeset</a></li><br>
						<li><a href="cables.php">Cables</a></li><br>
						<li><a href="chain.php">Chain</a></li><br>
						<li><a href="cogs.php">Cogs</a></li>
						<li><a href="crankset.php">Crankset</a></li><br>
						<li><a href="fd.php">FD</a></li><br>
						<li><a href="forks.php">Forks</a></li><br>
						<li><a href="frames.php">Frames</a></li>
						<li><a href="groupset.php">Groupset</a></li><br>
						<li><a href="handlebars.php">Handlebars</a></li><br>
						<li><a href="handlegrip.php">Handlegrip</a></li><br>
						<li><a href="headset.php">Headset</a></li>
						<li><a href="hub.php">Hub</a></li><br>
						<li><a href="innertube.php">Innertube</a></li><br>
						<li><a href="pedals.php">Pedals</a></li><br>
						<li><a href="rd.php">RD</a></li>
						<li><a href="rims.php">Rims</a></li><br>
						<li><a href="saddle.php">Saddle</a></li><br>
						<li><a href="seatclamp.php">Seatclamp</a></li><br>
						<li><a href="seatpost.php">Seatpost</a></li>
						<li><a href="shifters.php">Shifters</a></li>
						<li><a href="spokes_nipples.php">Spokes and Nipples</a></li>
						<li><a href="stems.php">Stems</a></li>
						<li><a href="tires.php">Tires</a></li>
					</ul>
				</div>
			</div>
			<div class="prod_content">
				<?php
					$mode_of_payment=$_POST['mode_of_payment'];
					$customer_ID=$_REQUEST['customer_ID'];
					$_SESSION['customer_ID']=$customer_ID;
					$_SESSION['mode_of_payment']=$mode_of_payment;

					$select_cart="SELECT * FROM cart WHERE customer_ID LIKE '%$customer_ID%'";
					$result_select=mysqli_query($connect,$select_cart);

					$Grand_Total=0;

					if(mysqli_num_rows($result_select)>0)
					{
						while($row=mysqli_fetch_array($result_select))
						{
							$Cart_ID=$row['Cart_ID'];
						}
					}
				?>
					<table frame=box bordercolor="#8C001A" class="prod_list" style="width:750px; height: 358px;">
					<tr><th colspan="3" class="title">Delivery Form<br></th></tr>
					<tr>
						<td><b>Fullname:</b></td>
						<td><input type="text" name="fullname" value="<?php echo $_SESSION['fullname']?>" readonly size="30px"/></td>
						<td></td>
					</tr>
					<tr>
						<td><b>Email:</b></td>
						<td><input type="email" name="email" value="<?php echo $_SESSION['email']?>" readonly size="30px"/></td>
						<td></td>
					</tr>
					<tr>
						<td><b>Phone Number:</b></td>
						<td><input type="text" name="phone_number" value="<?php echo $_SESSION['phone_number']?>" readonly size="30px"/></td>
						<td></td>
					</tr>
					<form action="purchase.php?customer_ID=<?php echo $customer_ID?>" method="POST">
					<tr>
						<td><b>Address:</b></td>
						<td colspan="2"><input type="text" name="address" value="<?php echo $_SESSION['address']?>" size="30px"/></td>
					</tr>
					<tr class='borderbottom1'>
						<td><b>Mode of Payment:</b></td>
						<td><input type="text" name="mode_of_payment" value="<?php echo $mode_of_payment?>" style="font-weight:bold;" readonly size="27px"/></td>
						<?php
						if($mode_of_payment=='Cash on Delivery')
						{?>
							<td><input type="submit" class="button" value="Check Out"></td><?php
						}
						?>
					</tr>
					<?php
						if ($mode_of_payment=='Credit Card')
						{?>
						<tr><td colspan="3"><b><br><center>Credit Card Details</b></center></td></tr>
						<tr>
							<td><b>Card Type:</b></td>
							<td colspan="2"><input type="text" name="card_type" placeholder="Input Card Type" style="font-weight:bold;"/></td>
						</tr>
						<tr>
							<td><b>Card Number:</b></td>
							<td><input type="text" name="card_number" placeholder="Input Card Number" style="font-weight:bold;" /></td>
							<td><input type="submit" class="button" value="Check Out"></td>
						</tr>
						<?php
						}
					?>
					<!--back to cart and back to homepage button-->
					<tr align='center'>
						<td colspan='3'><a href='cart.php?customer_ID=<?php echo $customer_ID?>&c=1'/><input type='button' class='button' value='Back to Cart'></a>&nbsp;&nbsp;<a href='newhome.php'><input type='button' class='button' value='Back to Homepage'></a></td>
					</tr>
					</table>
					</form>
			</div>
		</div>
	</div>
</body>
</html>