<?php
	session_start();
	require '../dbconfig/config.php';
?>
<!DOCTYPE html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/accesories.css">
	<title>Cycle Codes | Bike Parts | Accessories</title>
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
						<li><a href="all_bikeparts.php">All</a></li><br>
						<li><a href="accessories.php" class="active">Accessories</a></li><br>
						<li><a href="brakeset.php">Brakeset</a></li><br>
						<li><a href="cables.php">Cables</a></li><br>
						<li><a href="chain.php">Chain</a></li><br>
						<li><a href="cogs.php">Cogs</a></li>
						<li><a href="crankset.php">Crankset</a></li><br>
					</ul>
				</div>
			</div>
			<div class="prod_content">
				<?php
					$ID=$_SESSION['customer_ID'];
					$query="SELECT * FROM inventory WHERE Category LIKE '%Parts%' and Sub_Category LIKE '%Accessories%'";
					$result=mysqli_query($connect,$query);
					?><table frame=box bordercolor='#8C001A' class='prod_header'>
					<tr>
						<th colspan='4' class='title'>List of Products<br></th>
					</tr>
					<tr class='borderbottom1'>
						<th style='width:100px'>Product ID</th>
						<th style='width:400px'>Product Name</th>
						<th style='width:150px'>Price</th>
						<th style='width:80px'>Action</th>
					</tr>
					</table>
					<?php
					if(mysqli_num_rows($result)>0)
					{?>
						<form action="paints_and_sundries.php?Prod_ID=<?php echo $_SESSION['Prod_ID']?>&Price=<?php echo $_SESSION['Price']?>"; method='POST'/><?php
						
						//echo "<tr><th colspan='4' class='title'>List of Products<br></th></tr>";
						echo "<th style='width:150px'>Price</th>";
						echo "<th style='width:80px'>Action</th></tr>";
						echo "</table>";
						echo "<table frame=box bordercolor='#8C001A' class='prod_list' style='width:730px; height: 358px;'>";
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
							echo "<td><a href='../product_page.php?Prod_ID=$Prod_ID&Quantity=1&customer_ID=$ID'>".$Prod_Name."</a></td>";
							echo "<td>₱".$Price."</td>";
							echo "<td><a href='../product_page.php?Prod_ID=$Prod_ID&Quantity=1&customer_ID=$ID'><img src='css/images/search3.png' width='20px';/></a></td>";


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