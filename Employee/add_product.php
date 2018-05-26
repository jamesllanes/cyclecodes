<?php
	session_start();
	require '../dbconfig/config.php';
?>
<!DOCTYPE html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/employee.css">
	<title>Ace Hardware | Add Product</title>
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
								<br><a href="../index.php"> Create account | Sign in</a><?php
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
				Inventory > Add Product
				</div>
			</div>
			<div id="Middle"> <!--Menu ICONS-->
				<div class="icons_grid">
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
				<table border="5" bordercolor="#57000c" class="prod_list" style="width:500px">
					<form action="add_product.php" method="POST">
						<tr>
							<th colspan=2>Product Details</td>
						</tr>
						<tr>
							<td><b>Product ID:</b></td>
							<td><input type="text" name="Prod_ID" placeholder="Product ID" required/></td>
						</tr>
						<tr>
							<td><b>Product Name:</b></td>
							<td><input type="text" name="Prod_Name" placeholder="Product Name" required/></td>
						</tr>
						<tr>
							<td><b>Description:</b></td>
							<td><input type="text" name="Description" placeholder="Product Description" required/></td>
						</tr>
						<tr>
							<td><b>Category</b></td>
							<td><input type="text" name="category" placeholder="Category" required/></td>
						</tr>
						<tr>
							<td><b>Sub-Category</b></td>
							<td><input type="text" name="sub_category" placeholder="Sub-Category" required/></td>
						</tr>
						<tr>
							<td><b>Price</b></td>
							<td><input type="text" name="price" placeholder="Price" required/></td>
						</tr>
						<tr>
							<td><b>Quantity</b></td>
							<td><input type="text" name="quantity" placeholder="Quantity" required/></td>
						</tr>
						<tr>
							<td colspan="2">
								<button name="add" class="all_btn" type="submit">Add Product</button>
								<button name="cancel" class="all_btn" type="submit"><a href="employee_inventory.php">Back</button>
							</td>
						</tr>
					</form>
				</table><?php

					if(isset($_POST['add']))
					{
						$Prod_ID=$_POST['Prod_ID'];
						$Prod_Name=$_POST['Prod_Name'];
						$Description=$_POST['Description'];
						$Category=$_POST['category'];
						$Sub_Category=$_POST['sub_category'];
						$Price=$_POST['price'];
						$Quantity=$_POST['quantity'];

						echo $Prod_ID;

						$query_select="SELECT * FROM inventory WHERE Prod_ID='$Prod_ID'";
						$result=mysqli_query($connect,$query_select);

						if(mysqli_num_rows($result)>0)
						{
							$row=mysqli_fetch_array($result);
							echo '<script type="text/javascript"> alert("Product already exists!") </script>';
						}
						else
						{
							$query_insert="INSERT INTO inventory (Prod_ID, Prod_Name, Description, Category, Sub_Category, Price, Quantity) VALUES ('$Prod_ID', '$Prod_Name','$Description','$Category','$Sub_Category','$Price','$Quantity')";
							$result_query=mysqli_query($connect,$query_insert);

							echo '<script type="text/javascript"> alert("Product successfully added!!!") </script>';
							header('location:employee_inventory.php');
						}
					}

			?></div>
		</div>
	</div>
</body>
</html>