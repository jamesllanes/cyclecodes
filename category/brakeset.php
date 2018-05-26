<?php
	session_start();
	require '../dbconfig/config.php';
?>
<!DOCTYPE html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/accesories.css">
	<title>Cycle Codes | Bike Parts | Brakeset</title>
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
				  <button class="tablinks" onclick="location.href='../wishlist.php?customer_ID=<?php echo $_SESSION["customer_ID"]?>&w=0'">Wishlist</button>
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
				<p>Products > Bike Parts > Brakeset</p>
			</div>
		</div>
		<div id="Center"> <!--category links-->
			<div id="subcategories_container">
				<div class="subcategories_content">
					<h3>Categories</h3><br>
					<ul class="sublinks">
						<li><a href="all_bikeparts.php">All</a></li><br>
						<li><a href="accessories.php">Accessories</a></li><br>
						<li><a href="brakeset.php" class="active">Brakeset</a></li><br>
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
					$ID=$_SESSION['customer_ID'];
					$query="SELECT * FROM inventory WHERE Category LIKE '%Parts%' and Sub_Category LIKE '%Brakeset%'";
					$result=mysqli_query($connect,$query);

					if(mysqli_num_rows($result)>0)
					{?>
						<form action="paints_and_sundries.php?Prod_ID=<?php echo $_SESSION['Prod_ID']?>&Price=<?php echo $_SESSION['Price']?>"; method='POST'/><?php
						echo "<table frame=box bordercolor='#8C001A' class='prod_list' style='width:750px; height: 358px;'>";
						echo "<tr><th colspan='4' class='title'>List of Products<br></th></tr>";
						echo "<tr class='borderbottom1'><th>Product ID</th>";
						echo "<th style='width:65%'>Product Name</th>";
						echo "<th style='width:20%'>Price</th>";
						echo "<th>Select</th>";
						//echo "<th style='width:40px' colspan=2>Quantity</th>";
						while($row=mysqli_fetch_array($result))
						{?>
							<?php

							$Prod_ID=$row['Prod_ID'];
							$_SESSION['Prod_ID']=$Prod_ID;
							$Prod_ID=$_SESSION['Prod_ID'];

							$Prod_Name=$row['Prod_Name'];
							$_SESSION['Prod_Name']=$Prod_Name;
							$Prod_Name=$_SESSION['Prod_Name'];

							$Price=$row['Price'];
							$_SESSION['Price']=$Price;
							$Price=$_SESSION['Price'];

							echo "<tr class='borderbottom'>";
							echo "<td>".$Prod_ID."</td>";
							echo "<td><a href='product_page2.php?Prod_ID=$Prod_ID&Quantity=1&customer_ID=$ID'>".$Prod_Name."</a></td>";
							echo "<td>₱".$Price."</td>";
							echo "<td><a href='product_page2.php?Prod_ID=$Prod_ID&Quantity=1&customer_ID=$ID'><img src='css/images/search3.png' width='20px';/></a></td>";


							/*FOR QUANTITY AND ADD TO CART LINK
							echo "<td><input type='number' name='quantity' style='width:50px'/>";
							echo '<input type="hidden" name="hidden_name" value="$Prod_Name"/>';
							echo '<input type="hidden" name="hidden_price" value="$Price"/>';
							echo '<input type="hidden" name="hidden_quantity" value="$quantity"/>';
							$_SESSION['quantity']=1;*/
							?>
							<!--<button  type="submit"><a href="paints_and_sundries3.php?Prod_ID=<?php echo $_SESSION["Prod_ID"]?>&Price=<?php echo $_SESSION["Price"]?>&Quantity=<?php echo $_SESSION["quantity"]?>">+</a></button></td>
							-->

							<?php /*END OF QUANTITY AND ADD TO CART LINK*/ ?>
							<!--<input type="submit" value="Add to Cart" onclick="location='..\cart.php?Prod_ID=<?php echo $_SESSION['Prod_ID']?>&Quantity=<?php echo $_POST['hidden_quantity']?>"/>-->
							<!--Sections.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&section=<?php echo $_SESSION['section']?>-->
							<?php
							//<!--<td><input type="submit" name="add" value="Add to Cart"/></td>--><?php
							echo "</tr>"; 	
						}
						echo "</table>";
						echo "</form>";
					}	
				?>
			</div>
		</div>
	</div>
</body>
</html>