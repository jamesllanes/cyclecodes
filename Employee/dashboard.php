<?php
	session_start();
	require '../dbconfig/config.php';
?>
<!DOCTYPE html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/employee.css">
	<title>Ace Hardware | Dashboard</title>
	<meta name="description" content="Write some words to describe your html page">
	<style>
	body{
			overflow: hidden;
		}
	</style>
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
				Dashboard
				</div>
			</div>
			<div id="Middle"> <!--Menu ICONS-->
				<div class="icons_grid">
					<div class="icons_one">
						<a href="dashboard.php"><img src="css/images/icon-home2.png" height="80px"><br><p>Dashboard</p></a>
					</div>
					<div class="icons_two">
						<a href="employee_inventory.php"><img src="css/images/icon-inventory.png" height="80px"><br><p>Inventory</p></a>
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
				<table border="5" class="category" style="width:280px">
					<tr>
						<th>No.</th>
						<th style="width:350px">Product Categories</th>
					</tr>
					<tr><td>1</td><td>Paints and Sundries</td></tr>
					<tr><td>2</td><td>Tools</td></tr>
					<tr><td>3</td><td>Electrical</td></tr>
					<tr><td>4</td><td>Plumbing</td></tr>
					<tr><td>5</td><td>Home Hardware</td></tr>
					<tr><td>6</td><td>Houseware</td></tr>
					<tr><td>7</td><td>Lawn</td></tr>
					<tr><td>8</td><td>Automotive</td></tr>
					<tr><td>9</td><td>Appliances</td></tr>
					<tr><td>10</td><td>Chemicals</td></tr>
					<tr><td>11</td><td>Pets</td></tr>
				</table>
				<table border="5" class="prod" style="width:600px">
					<tr><th colspan='4'>Needs Restocking</th></tr>
					<tr>
						<th>Product ID</th>
						<th>Product Name</th>
						<th>Quantity</th>
						<th style="width:75px">Action</th>
					</tr>
					<?php
							$query="SELECT * FROM inventory WHERE Quantity < 100";
							$result=mysqli_query($connect,$query);

							if(mysqli_num_rows($result)>0)
							{
								while($row=mysqli_fetch_array($result))
								{
									echo "<tr>";
									echo "<td>".$row['Prod_ID']."</td>";
									echo "<td>".$row['Prod_Name']."</td>";
									echo "<td>".$row['Quantity']."</td>";
									echo "<td><button name='restock_product' class='all_btn'><a href='restock_product.php?Prod_ID=$row[Prod_ID]'>Restock</button></td>";
									echo "</tr>";
								}
							}
							else
							{
								echo "Nothing to restock.";
							}
						?>
				</table>
				<table border="5" class="supplier" style="width:600px">
					<tr>
						<th colspan='4'>Supplier</th>
					</tr>
					<tr>
						<th>Supplier Name</th>
						<th>Products</th>
						<th>Location</th>
						<th>Contact Number</th>
					</tr>
						<?php
							$query="SELECT * FROM supplier";
							$result=mysqli_query($connect,$query);

							if(mysqli_num_rows($result)>0)
							{
								while($row=mysqli_fetch_array($result))
								{
									echo "<tr>";
									echo "<td>".$row['supplier_name']."</td>";
									echo "<td>".$row['products']."</td>";
									echo "<td>".$row['location']."</td>";
									echo "<td>".$row['contact_number']."</td>";
									echo "</tr>";
								}
							}
							else
							{
								echo "Supplier list is empty!";
							}
						?>
					<tr>
						<td colspan="4"><button name="add_supplier" class="all_btn"><a href="add_supplier.php">Add Supplier</a></button></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</body>
</html>