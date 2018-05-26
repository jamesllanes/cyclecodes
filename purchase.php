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
				<a href="../newhome.php"><img src="cycle_codes.png" width="14%"></a>
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
					$customer_ID=$_REQUEST['customer_ID'];
					$address=$_POST['address'];
					if($_SESSION['mode_of_payment'] == 'Cash on Delivery')
					{

					}
					else
					{
						$card_type=$_POST['card_type'];
						$card_number=$_POST['card_number'];
					}
					/*$select_cart2="SELECT * FROM cart WHERE customer_ID = '$customer_ID'";
					$result_cart2=mysqli_query($connect,$select_cart2);
					if(mysqli_num_rows($result_cart2)>0)
					{
						while($row=mysqli_fetch_array($result_cart2))
						{
							$Prod_ID=$row['Prod_ID'];
							$Prod_Name=$row['Prod_Name'];
							$Price=$row['Price'];
							$Quantity=$row['Quantity'];
							$Total=$row['Total'];

							//insert items to purchase table
							$insert_purchase="INSERT INTO purchases (Prod_ID, Prod_Name, Price, Quantity, Total, customer_ID) VALUES ('$Prod_ID', '$Prod_Name', '$Price', '$Quantity', '$Total', $customer_ID')";
							$result_insert=mysqli_query($connect,$insert_purchase);
						}
					}*/
					echo "<table frame=box bordercolor='#8C001A' class='prod_list' style='width:750px; height: 410px;'>";
					echo "<tr><th colspan='6' class='title'>Order Received<br></th></tr>";
					$insert_purchase="INSERT INTO purchases (Prod_ID, Prod_Name, Price, Quantity, Total, customer_ID) SELECT Prod_ID, Prod_Name, Price, Quantity, Total, customer_ID FROM cart WHERE customer_ID = '$customer_ID'";
					$result_insert=mysqli_query($connect,$insert_purchase);

					$select_total="SELECT * FROM cart WHERE customer_ID='$customer_ID'";
					$result_total=mysqli_query($connect,$select_total);
					$Grand_Total=0;
					if(mysqli_num_rows($result_total)>0)
					{
						while($row=mysqli_fetch_array($result_total))
						{
							$Grand_Total=$Grand_Total+$row['Total'];
						}
					}
					echo "<tr class='borderbottom1'><td colspan='6'><center><br>Thank you. Your order has been received.</center><br></td></tr>";
					if(($_SESSION['mode_of_payment'])=='Cash on Delivery')
					{
						echo "<tr><td><br>ORDER NO.:</td><td>TOTAL:</td><td>PAYMENT METHOD:</td><td>ADDRESS:</td></tr>";
						echo "<tr><td><b>001</b></td><td><b>₱".$Grand_Total."</b></td><td><b>".$_SESSION['mode_of_payment']."</b></td><td><b>".$address."</b></td></tr>";
						echo "<tr class='borderbottom1'><td colspan='6'><br><center>Pay with cash upon delivery.</center><br></td></tr>";
					}
					else
					{
						echo "<tr><td><br>ORDER NO.:</td><td>TOTAL:</td><td>PAYMENT METHOD:</td><td>CARD TYPE:</td><td>CARD NUMBER:</td><td>ADDRESS:</td></tr>";
						echo "<tr><td><b>001</b></td><td><b>₱".$Grand_Total."</b></td><td><b>".$_SESSION['mode_of_payment']."</b></td>
						<td><b>".$card_type."</b></td><td><b>".$card_number."</b></td>
						<td><b>".$address."</b></td></tr>";
						echo "<tr class='borderbottom1'><td colspan='6'><br><center>Your card transaction is accepted.</center><br></td></tr>";
					}

					$select_purchase="SELECT * FROM cart WHERE customer_ID='$customer_ID'";
					$result_purchase=mysqli_query($connect,$select_purchase);
					$Grand_Total=0;
					echo "<tr class='title'><td colspan='6'><b>Order Details:</b></td></tr>";
					echo "<tr class='title'><td colspan='3'><br>Product Name</td><td>Price</td><td>Quantity</td><td>Subtotal</td></tr>";
					

					if(mysqli_num_rows($result_purchase)>0)
					{
						while($row=mysqli_fetch_array($result_purchase))
						{
							$Prod_ID1=$row['Prod_ID'];
							$_SESSION['Prod_ID1']=$Prod_ID1;
							$Prod_Name=$row['Prod_Name'];
							$Price=$row['Price'];
							$Quantity_update=$row['Quantity'];
							$Subtotal=$Price*$Quantity_update;
							$Grand_Total=$Grand_Total+$row['Total'];

							
							echo "<tr class='borderbottom1'><td colspan='3'>".$Prod_Name."</td><td>₱".$Price."</td><td>x".$Quantity_update."</td><td>₱".$Subtotal."</td></tr>";

							$select_sales="SELECT * FROM sales";
							$result_sales=mysqli_query($connect,$select_sales);
							if(mysqli_num_rows($result_sales)>0)
							{
								while($row=mysqli_fetch_array($result_sales))
								{
									$Prod_ID2=$row['Prod_ID'];
									if($Prod_ID1==$Prod_ID2)
									{
										$Quantity=$row['Quantity']+$Quantity_update;
										$update_qty="UPDATE sales SET Quantity ='$Quantity'";
										$result_qty=mysqli_query($connect,$update_qty);

										$Additional=$row['Total']+$Subtotal;
										$update_total="UPDATE sales SET Total ='$Additional'";
										$result_total=mysqli_query($connect,$update_total);

										//echo "update";
									}
								}
							}
							else
							{
								/*$select_purchase2="SELECT * FROM cart WHERE customer_ID='$customer_ID'";
								$result_purchase2=mysqli_query($connect,$select_purchase2);
								if(mysqli_num_rows($result_purchase2)>0)
								{
									while($row=mysqli_fetch_array($result_purchase2))
									{
										$Prod_ID1=$row['Prod_ID'];
										$Prod_Name=$row['Prod_Name'];
										$Price=$row['Price'];
										$Quantity_update=$row['Quantity'];
										$Subtotal=$Price*$Quantity_update;

										*/
										//$insert_sales="INSERT INTO sales (Prod_ID, Prod_Name, Price, Quantity, Total) VALUES ('$Prod_ID1', '$Prod_Name', '$Price', '$Quantity_update', '$Subtotal') WHERE Prod_ID = '$Prod_ID1'";
										$insert_sales="INSERT INTO sales (Prod_ID, Prod_Name, Price, Quantity, Total) SELECT Prod_ID, Prod_Name, Price, Quantity, Total FROM  cart WHERE customer_ID = '$customer_ID'";
										$result_insert2=mysqli_query($connect,$insert_sales);
										//echo "insert sales";
										//print_r($customer_ID);
									//}
								//}
							}

							$select_inv="SELECT * FROM inventory WHERE Prod_ID = '$Prod_ID1'";
							//print_r($_SESSION['Prod_ID1']);
							$result_inv=mysqli_query($connect,$select_inv);
							if(mysqli_num_rows($result_inv)>0)
							{
								while($row=mysqli_fetch_array($result_inv))
								{
									$Quantity=$row['Quantity']-$Quantity_update;
									$update_inventory="UPDATE inventory SET Quantity ='$Quantity' WHERE Prod_ID = '$Prod_ID1'";
									$result_update=mysqli_query($connect,$update_inventory);
								}
							}
						}
						echo "<tr class='borderbottom1'><td colspan='5' align= 'center'><br><b>Total</b></td><td><b>₱".$Grand_Total."</b></td></tr>";
						echo "<tr align='center'><td colspan='6'><br></td></tr>";
						echo "<tr align='center'><td colspan='6'><a href='newhome.php'><input type='button' class='button' value='Back'></a></td></tr>";
						echo "</table>";
						echo "</form>";
					}
					else
					{
						?><tr class='no_border'><td colspan='4' align='center'>Cart is empty.</td></tr><?php
					}	

					//$delete_cart="DELETE FROM cart WHERE customer_ID = '$customer_ID'";
					//$result_delete=mysqli_query($connect,$delete_cart);
				?>
			</div>
		</div>
	</div>
</body>
</html>