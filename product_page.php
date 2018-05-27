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
				<p>Products > Bike Parts > Accesories</p>
			</div>
		</div>
		<div id="Center"> <!--category links-->
			<div id="subcategories_container">
				<div class="categories_header"><h3>Categories</h3></div><br>
				<div class="subcategories_content">
					<ul class="sublinks">
						<li><a href="all_bikeparts.php">All</a></li><br>
						<?php
						$selectID="SELECT * FROM inventory WHERE Prod_ID LIKE '%$_REQUEST[Prod_ID]%'";
						$resultID=mysqli_query($connect,$selectID);

						if(mysqli_num_rows($resultID)>0)
						{
							while($row=mysqli_fetch_array($resultID))
							{
								if($row['Prod_ID']==$_REQUEST['Prod_ID'])
								{
									if($row['Sub_Category']=='Accessories')
									{
										?>
										<li><a href="category/accessories.php" class="active">Accessories</a></li><br>
										<li><a href="category/brakeset.php">Brakeset</a></li><br>
										<li><a href="category/cables.php">Cables</a></li><br>
										<li><a href="category/chain.php">Chain</a></li><br>
										<li><a href="category/cogs.php">Cogs</a></li>
										<li><a href="category/crankset.php">Crankset</a></li><br>
										<?php
									}
									elseif($row['Sub_Category']=='Brakeset')
									{
										?>
										<li><a href="category/accessories.php">Accessories</a></li><br>
										<li><a href="category/brakeset.php" class="active">Brakeset</a></li><br>
										<li><a href="category/cables.php">Cables</a></li><br>
										<li><a href="category/chain.php">Chain</a></li><br>
										<li><a href="category/cogs.php">Cogs</a></li>
										<li><a href="category/crankset.php">Crankset</a></li><br>
										<?php
									}
									elseif($row['Sub_Category']=='Cables')
									{
										?>
										<li><a href="category/accessories.php">Accessories</a></li><br>
										<li><a href="category/brakeset.php">Brakeset</a></li><br>
										<li><a href="category/cables.php" class="active">Cables</a></li><br>
										<li><a href="category/chain.php">Chain</a></li><br>
										<li><a href="category/cogs.php">Cogs</a></li>
										<li><a href="category/crankset.php">Crankset</a></li><br>
										<?php
									}
									elseif($row['Sub_Category']=='Chain')
									{
										?>
										<li><a href="category/accessories.php">Accessories</a></li><br>
										<li><a href="category/brakeset.php">Brakeset</a></li><br>
										<li><a href="category/cables.php">Cables</a></li><br>
										<li><a href="category/chain.php" class="active">Chain</a></li><br>
										<li><a href="category/cogs.php">Cogs</a></li>
										<li><a href="category/crankset.php">Crankset</a></li><br>
										<?php
									}
									elseif($row['Sub_Category']=='Cogs')
									{
										?>
										<li><a href="category/accessories.php">Accessories</a></li><br>
										<li><a href="category/brakeset.php">Brakeset</a></li><br>
										<li><a href="category/cables.php">Cables</a></li><br>
										<li><a href="category/chain.php">Chain</a></li><br>
										<li><a href="category/cogs.php" class="active">Cogs</a></li>
										<li><a href="category/crankset.php">Crankset</a></li><br>
										<?php
									}
									elseif($row['Sub_Category']=='Crankset')
									{
										?>
										<li><a href="category/accessories.php">Accessories</a></li><br>
										<li><a href="category/brakeset.php">Brakeset</a></li><br>
										<li><a href="category/cables.php">Cables</a></li><br>
										<li><a href="category/chain.php">Chain</a></li><br>
										<li><a href="category/cogs.php">Cogs</a></li>
										<li><a href="category/crankset.php" class="active">Crankset</a></li><br>
										<?php
									}
								}
							}
						}
						?>
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
								if(empty($_SESSION['customer_ID']))
									{
										?></tr><tr><td colspan='2'></td></tr><?php
									}
								elseif(!empty($_SESSION['customer_ID']))
								{
									echo "</tr><td><b>Quantity:</b></td>";
									echo "<td><input type='text' readonly name='quantity' style='width:60%' value='".$_REQUEST["Quantity"]."'/>"; ?>
									<a href="product_page.php?Prod_ID=<?php echo $_SESSION['Prod_ID']?>&Price=<?php echo $_SESSION['Price']?>&Quantity=<?php echo $_REQUEST['Quantity']+1?>&customer_ID=<?php echo $customer_ID?>"><input type="button" class="button" value="+"></a><?php
								}
								
								if ($_SESSION["Quantity"]==0)
								{ ?>
									<?php
									$_SESSION["Quantity"]=null;
								}
								elseif($_SESSION["Quantity"]>1)
								{ 
									if(empty($_SESSION['customer_ID']))
									{
										?></tr><tr><td colspan='2'>Please login first to add this product to cart or wishlist.</td></tr><?php
									}
									elseif(!empty($_SESSION['customer_ID']))
									{
										?>
										<a href="product_page.php?Prod_ID=<?php echo $_SESSION['Prod_ID']?>&Price=<?php echo $_SESSION['Price']?>&Quantity=<?php echo $_SESSION['Quantity']-1?>&customer_ID=<?php echo $customer_ID?>"><input type="button" class="button" value="-"></a></td></tr>
										<tr><td><button class="button" style="width: 107px;"><a href="cart.php?Prod_ID=<?php echo $_SESSION['Prod_ID']?>&Quantity=<?php echo $_SESSION['Quantity']?>&customer_ID=<?php echo $customer_ID?>&c=1" style="text-decoration: none; color:black; position: relative; top:-10px; left:0px;"/><img src="css/images/cart.png" width="20" height="25" style="position: relative; top:9px; left:0px;"/> Add to Cart</a></button></td>
										<td><button class="button"><a href="wishlist.php?Prod_ID=<?php echo $_SESSION['Prod_ID']?>&Quantity=<?php echo $_SESSION['Quantity']?>&customer_ID=<?php echo $customer_ID?>&w=1" style="text-decoration: none; color:black;"/><img src="css/images/wishlist.png" width="15" height="12"> Add to Wishlist</a></button></td><?php
									}
								}
								else
								{
									if(empty($_SESSION['customer_ID']))
									{
										?></tr><tr><td colspan='2'>Please login first to add this product to cart or wishlist.</td></tr><?php
									}
									elseif(!empty($_SESSION['customer_ID']))
									{
									?><tr><td><button type="submit" class="button" style="width: 107px;"><a style="text-decoration: none; color:black; position: relative; top:-10px; left:0px;"/><img src="css/images/cart.png" width="20" height="25" style="position: relative; top:9px; left:0px;"/> Add to Cart</a></button></td>
									
									<td><button class="button"><a href="wishlist.php?Prod_ID=<?php echo $_SESSION['Prod_ID']?>&Quantity=<?php echo $_SESSION['Quantity']?>&customer_ID=<?php echo $customer_ID?>&w=1" style="text-decoration: none; color:black;"/><img src="css/images/wishlist.png" width="15" height="12"> Add to Wishlist</a></button></td>
									<?php
									}
									
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