<?php
	session_start();
	require '../dbconfig/config.php';
?>
<!DOCTYPE html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/employee.css">
	<title>Ace Hardware | Inventory</title>
	<meta name="description" content="Write some words to describe your html page">
</head>
<body class="preload">
	<div class="blended_grid">
		<div id="fixed_top">
			<div id="TopNav"> <!--logo, signin, search, customer service, others-->
				<a href="dashboard.php"><img src="css/images/ace2.png" width="14%"></a>
				<div id="Login_Container">
					<div id="Login_Content">
						<?php  
							if(empty($_SESSION['usertype']))
							{
								echo "Welcome Guest!";?>
								<br><a href="index.php"> Create account | Sign in</a><?php
							}
							elseif(!empty($_SESSION['usertype']))
							{
								echo "Welcome ".$_SESSION['usertype']." ".$_SESSION['fullname']."!";
							}
							else
							{
								echo '<script type="text/javascript"> alert("Invalid Username or Password!") </script>';
							} 
						?>
					</div>
				</div>
			</div>
			<div id="MenuNav"> <!--shop, sale&specials, wishlist, careers, about us-->
				<div class="menu_content">
				Products
				</div>
			</div>
			<div id="Middle"> <!--Menu ICONS-->
				<div class="icons_grid">
					<div class="icons_one">
						<a href="dashboard.php"><img src="css/images/icon-home2.png" height="80px"><br><p>Dashboard</p></a>
					</div>
					<div class="icons_two">
						<a href="employee_inventory.php"><img src="css/images/icon-inventory.png" height="80px"><br><p>Products</p></a>
					</div>
					<div class="icons_three">
						<a href="employee_supplier.php"><img src="css/images/icon-supplier.png" height="80px"><br><p>Supplier</p></a>
					</div>
					<div class="icons_four">
						<a href="../logout.php"><img src="css/images/icon-logout.png" height="90px"><p class="logout">Logout</p></a>
					</div>
				</div>
			</div>
		</div>
		<div id="Center"> <!--Menu Content-->
			<div class="sales_content">
				<table border="5" class="table" style="width:750px">
					<tr>
						<th style="width: 80px">Product ID</th>
						<th style="width: 320px">Product Name</th>
						<th>Quantity</th>
						<th style="width: 80px">Price</th>
						<th colspan="3" style="width: 250px">Action</th>
					</tr>
						<?php
							$query="SELECT * FROM inventory LIMIT 20";
							$result=mysqli_query($connect,$query);

							if(mysqli_num_rows($result)>0)
							{
								while($row=mysqli_fetch_array($result))
								{
									echo "<tr>";
									echo "<td>".$row['Prod_ID']."</td>";
									echo "<td>".$row['Prod_Name']."</td>";
									echo "<td>".$row['Quantity']."</td>";
									echo "<td>$".$row['Price']."</td>";
									echo "<td style='width: 50px'><button name='edit_product' class='all_btn'><a href='edit_product.php?Prod_ID=$row[Prod_ID]'>Edit</button></td>";
									echo "<td style='width: 80px'><button name='restock_product' class='all_btn'><a href='restock_product.php?Prod_ID=$row[Prod_ID]'>Restock</button></td>";
									echo "<td><button name='delete_product' class='all_btn'><a href='delete_product.php?Prod_ID=$row[Prod_ID]'>Delete</a></button></td>";
									echo "</tr>";
								}
							}
							else
							{
								echo "Inventory is empty!";
							}
						?>
					<tr>
						<td colspan="7"><button name='add_product' class='all_btn'><a href='add_product.php'>Add Product</a></button></td>
					</tr>
				</table>
			</div>
			
		</div>
	</div>
</body>
</html>