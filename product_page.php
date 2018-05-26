<?php
	session_start();
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="category/css/accesories.css">
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
						<li><a href="bikeparts/all_bikeparts.php">All</a></li><br>
						<li><a href="bikeparts/accessories.php" class="active">Accessories</a></li><br>
						<li><a href="bikeparts/brakeset.php">Brakeset</a></li><br>
						<li><a href="bikeparts/cables.php">Cables</a></li><br>
						<li><a href="bikeparts/chain.php">Chain</a></li><br>
						<li><a href="bikeparts/cogs.php">Cogs</a></li>
						<li><a href="bikeparts/crankset.php">Crankset</a></li><br>
						<li><a href="bikeparts/fd.php">FD</a></li><br>
						<li><a href="bikeparts/forks.php">Forks</a></li><br>
						<li><a href="bikeparts/frames.php">Frames</a></li>
						<li><a href="bikeparts/groupset.php">Groupset</a></li><br>
						<li><a href="bikeparts/handlebars.php">Handlebars</a></li><br>
						<li><a href="bikeparts/handlegrip.php">Handlegrip</a></li><br>
						<li><a href="bikeparts/headset.php">Headset</a></li>
						<li><a href="bikeparts/hub.php">Hub</a></li><br>
						<li><a href="bikeparts/innertube.php">Innertube</a></li><br>
						<li><a href="bikeparts/pedals.php">Pedals</a></li><br>
						<li><a href="bikeparts/rd.php">RD</a></li>
						<li><a href="bikeparts/rims.php">Rims</a></li><br>
						<li><a href="bikeparts/saddle.php">Saddle</a></li><br>
						<li><a href="bikeparts/seatclamp.php">Seatclamp</a></li><br>
						<li><a href="bikeparts/seatpost.php">Seatpost</a></li>
						<li><a href="bikeparts/shifters.php">Shifters</a></li>
						<li><a href="bikeparts/spokes_nipples.php">Spokes and Nipples</a></li>
						<li><a href="bikeparts/stems.php">Stems</a></li>
						<li><a href="bikeparts/tires.php">Tires</a></li>
					</ul>
				</div>
			</div>
			<div class="prod_content">
				<?php
					//$_SESSION['Pets'];

					$query="SELECT * FROM inventory WHERE Prod_ID LIKE '%$_REQUEST[Prod_ID]%'";
					$result=mysqli_query($connect,$query);

					if(mysqli_num_rows($result)>0)
					{?>
						<form action="product_page.php?Prod_ID=<?php echo $_SESSION['Prod_ID']?>&Price=<?php echo $_SESSION['Price']?>"; method='POST'/><?php
						echo "<table frame=box bordercolor='#8C001A' class='prod_desc' style='width:750px; height: 358px;'>";
						//echo "<th style='width:40px' colspan=2>Quantity</th>";
						while($row=mysqli_fetch_array($result))
						{
							if($row['Prod_ID']==$_REQUEST['Prod_ID'])
							{
								$Prod_ID=$row['Prod_ID'];
								$_SESSION['Prod_ID']=$Prod_ID;
								$Prod_ID=$_SESSION['Prod_ID'];

								$_SESSION['Prod_Name']=$row['Prod_Name'];
								$Prod_Name=$_SESSION['Prod_Name'];

								$Price=$row['Price'];
								$_SESSION['Price']=$Price;
								$Price=$_SESSION['Price'];
								$displayImg=$row['Image'];

								$customer_ID=$_REQUEST['customer_ID'];
								echo "<tr><th colspan='3' class='title'>".$row['Prod_Name']."<br></th></tr>";
								//IMAGE
								//echo '<tr><td><img height="300" width="300" src="data:image;base64_decode($displayImg),'.$displayImg.'"></td></tr>';
								echo "<tr><td rowspan='5' style='width: 380px;'><img src='$row[Image]' width='300' height='200'></td>";
								echo "<td><b>Prod ID:</b></td>";
								echo "<td>".$Prod_ID."</td></tr>";
								echo "<td colspan='2'>".$row['Description']."</td></tr>";
								echo "<tr><td><b>Price:</b></td><td>₱".$Price."</td>";
								echo "</tr><td><b>Quantity:</b></td>";

								/*FOR QUANTITY AND ADD TO CART LINK*/
								if ($_REQUEST["Quantity"]==0)
								{
									$_SESSION["Quantity"]=null;
								}
								else
								{
									$_SESSION["Quantity"]=$_REQUEST["Quantity"];
									?><?php
								}
								echo "<td><input type='text' readonly name='quantity' style='width:60%' value='".$_REQUEST["Quantity"]."'/>"; ?>
								<a href="product_page.php?Prod_ID=<?php echo $_SESSION['Prod_ID']?>&Price=<?php echo $_SESSION['Price']?>&Quantity=<?php echo $_REQUEST['Quantity']+1?>&customer_ID=<?php echo $customer_ID?>"><input type="button" class="button" value="+"></a>
								<?php
								if ($_SESSION["Quantity"]==0)
								{ ?>
									<?php
									$_SESSION["Quantity"]=null;
								}
								elseif($_SESSION["Quantity"]>1)
								{ ?>
									<a href="product_page.php?Prod_ID=<?php echo $_SESSION['Prod_ID']?>&Price=<?php echo $_SESSION['Price']?>&Quantity=<?php echo $_SESSION['Quantity']-1?>&customer_ID=<?php echo $customer_ID?>"><input type="button" class="button" value="-"></a></td></tr>
									<tr><td><button class="button" style="width: 107px;"><a href="cart.php?Prod_ID=<?php echo $_SESSION['Prod_ID']?>&Quantity=<?php echo $_SESSION['Quantity']?>&customer_ID=<?php echo $customer_ID?>&c=1" style="text-decoration: none; color:black; position: relative; top:-10px; left:0px;"/><img src="css/images/cart.png" width="20" height="25" style="position: relative; top:9px; left:0px;"/> Add to Cart</a></button></td>

									<td><button class="button"><a href="wishlist.php?Prod_ID=<?php echo $_SESSION['Prod_ID']?>&Quantity=<?php echo $_SESSION['Quantity']?>&customer_ID=<?php echo $customer_ID?>&w=1" style="text-decoration: none; color:black;"/><img src="css/images/wishlist.png" width="15" height="12"> Add to Wishlist</a></button></td><?php
								}
								else
								{
									?><tr><td><button class="button" style="width: 107px;"><a href="cart.php?Prod_ID=<?php echo $_SESSION['Prod_ID']?>&Quantity=<?php echo $_SESSION['Quantity']?>&customer_ID=<?php echo $customer_ID?>&c=1" style="text-decoration: none; color:black; position: relative; top:-10px; left:0px;"/><img src="css/images/cart.png" width="20" height="25" style="position: relative; top:9px; left:0px;"/> Add to Cart</a></button></td>
									<td><button class="button"><a href="wishlist.php?Prod_ID=<?php echo $_SESSION['Prod_ID']?>&Quantity=<?php echo $_SESSION['Quantity']?>&customer_ID=<?php echo $customer_ID?>&w=1" style="text-decoration: none; color:black;"/><img src="css/images/wishlist.png" width="15" height="12"> Add to Wishlist</a></button></td>
									<?php
								}
							}
							
							/*echo "<td><input type='number' name='quantity' style='width:50px'/></td>";/*
							echo '<input type="hidden" name="hidden_name" value="$Prod_Name"/>';
							echo '<input type="hidden" name="hidden_price" value="$Price"/>';
							echo '<input type="hidden" name="hidden_quantity" value="$quantity"/>';*/
							$_SESSION['quantity']=1;
							?>
							<!--<td><button  type="submit"><a href="product_page2.php?Prod_ID=<?php echo $_SESSION["Prod_ID"]?>&Prod_Name=<?php echo $_SESSION['Prod_Name'] ?>&Price=<?php echo $_SESSION["Price"]?>&Quantity=<?php echo $_SESSION["quantity"]?>">+</a></button></td>-->

							<?php /*END OF QUANTITY AND ADD TO CART LINK*/ ?>
							<!--<input type="submit" value="Add to Cart" onclick="location='..\cart.php?Prod_ID=<?php echo $_SESSION['Prod_ID']?>&Quantity=<?php echo $_POST['hidden_quantity']?>"/>-->
							<!--Sections.php?Course_Code=<?php echo $_SESSION['Course_Code']?>&section=<?php echo $_SESSION['section']?>-->
							<?php
							//<!--<td><input type="submit" name="add" value="Add to Cart"/></td>--><?php
							//echo "</tr>"; 	
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