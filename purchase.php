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
				    <a href="category/builtbikes.php">Built Bikes</a>
				    <a href="category/accessories.php">Accessories</a>
				    <a href="category/brakeset.php">Brakeset</a>
				    <a href="category/cables.php">Cables</a>
				    <a href="category/chain.php">Chain</a>
				    <a href="category/cogs.php">Cogs</a>
				    <a href="category/crankset.php">Crankset</a>
				  </div>
				</div>
				<div class="tab">
					<a href="sale_and_specials.php"><button class="tablinks">Sale & Specials</button></a>
					<?php
					if(empty($_SESSION['customer_ID']))
					{

					}
					elseif(!empty($_SESSION['customer_ID']))
					{
					?>
					<a href='wishlist.php?customer_ID=<?php echo $_SESSION["customer_ID"]?>&w=0'><button class="tablinks">Wishlist</button></a>
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
				<p>Products > Bike Parts > Accesories</p>
			</div>
		</div>
		<div id="Center"> <!--category links-->
			<!--<div id="subcategories_container">
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
					</ul>
				</div>
			</div>-->
			<div class="prod_content_cart	">
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
					echo "<table frame=box bordercolor='#8C001A' class='prod_list' style='width:910px; height: 358px;'>";
					echo "<tr><th colspan='6' class='title'>Order Received<br></th></tr>";
//OPEN cart FOR TOTAL IN SUMMARY//
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
//END OF SQL: OPEN cart FOR TOTAL IN SUMMARY//
					echo "<tr class='borderbottom1'><td colspan='6'><center><br>Thank you. Your order has been received.</center><br></td></tr>";
					if(($_SESSION['mode_of_payment'])=='Cash on Delivery')
					{
						echo "<tr><td><br>ORDER NO.:</td><td>TOTAL:</td><td colspan='2'>PAYMENT METHOD:</td><td colspan='2'>ADDRESS:</td></tr>";
						echo "<tr><td><b>001</b></td><td><b>₱".$Grand_Total."</b></td><td colspan='2'><b>".$_SESSION['mode_of_payment']."</b></td><td colspan='2'><b>".$address."</b></td></tr>";
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
//ORDER DETAILS: OPEN cart TO DISPLAY//
					$select_cart="SELECT * FROM cart WHERE customer_ID='$customer_ID'";
					$result_cart=mysqli_query($connect,$select_cart);
					$Grand_Total=0;
					echo "<tr class='title'><td colspan='6'><b>Order Details:</b></td></tr>";
					echo "<tr class='title'><td colspan='3'><br>Product Name</td><td>Price</td><td>Quantity</td><td>Subtotal</td></tr>";
					

					if(mysqli_num_rows($result_cart)>0)
					{
						while($row=mysqli_fetch_array($result_cart))
						{
							$Prod_ID1=$row['Prod_ID'];
							$_SESSION['Prod_ID1']=$Prod_ID1;
							$Prod_Name=$row['Prod_Name'];
							$Price=$row['Price'];
							$Quantity_update=$row['Quantity'];
							$Total=$row['Total'];
							$Subtotal=$Price*$Quantity_update;
							$Grand_Total=$Grand_Total+$row['Total'];

							$select_purchase="INSERT INTO purchases VALUES ('', '$Prod_ID1', '$Prod_Name', '$Price', '$Quantity_update', '$Total', '$customer_ID')";
							$result_purchase=mysqli_query($connect,$select_purchase);

							echo "<tr class='borderbottom1'><td colspan='3'>".$Prod_Name."</td><td>₱".$Price."</td><td>x".$Quantity_update."</td><td>₱".$Subtotal."</td></tr>";

							$select_sales="SELECT * FROM sales WHERE Prod_ID='$Prod_ID1'";
							$result_sales=mysqli_query($connect,$select_sales);
//CONDITION: IF PRODUCT IS ALREADY IN SALES TABLE: UPDATE//
							if(mysqli_num_rows($result_sales)>0)
							{
								while($row=mysqli_fetch_array($result_sales))
								{
									$Prod_ID2=$row['Prod_ID'];
									if($Prod_ID1==$Prod_ID2)
									{
										$Quantity=$row['Quantity']+$Quantity_update;
										$update_qty="UPDATE sales SET Quantity ='$Quantity' WHERE Prod_ID='$Prod_ID1'";
										$result_qty=mysqli_query($connect,$update_qty);

										$Additional=$row['Total']+$Subtotal;
										$update_total="UPDATE sales SET Total ='$Additional' WHERE Prod_ID='$Prod_ID1'";
										$result_total=mysqli_query($connect,$update_total);
									}
								}
							}
//CONDITION: IF PRODUCT IS NOT YET IN SALES TABLE: INSERT//
							else
							{
								$insert_sales="INSERT INTO sales VALUES ('', '$Prod_ID1', '$Prod_Name', '$Price', '$Quantity_update', '$Total')";
								$result_insert2=mysqli_query($connect,$insert_sales);
							}

							$select_inv="SELECT * FROM inventory WHERE Prod_ID = '$Prod_ID1'";
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

					$delete_cart="DELETE FROM cart WHERE customer_ID = '$customer_ID'";
					$result_delete=mysqli_query($connect,$delete_cart);
				?>
			</div>
		</div>
	</div>
</body>
</html>