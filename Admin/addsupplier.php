<?php
	session_start();
	require '../dbconfig/config.php';
?>
<!DOCTYPE html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="../Admin/css/admin.css">
	<title>Ace Hardware | Add Supplier</title>
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
				<a href="dashboard.php" style="text-decoration: none; color:white">Dashboard</a> > <a href="supplier.php" style="text-decoration: none; color:white">Supplier</a> > Add Supplier
				</div>
			</div>
			<div id="Middle"> <!--Menu ICONS-->
				<div class="icons_grid">
					<div class="icons_one">
						<a href="sales.php"><img src="css/images/icon-sales.png" height="80px"><br><p>Sales</p></a>
					</div>
					<div class="icons_two">
						<a href="inventory.php"><img src="css/images/icon-inventory.png" height="80px"><br><p>Inventory</p></a>
					</div>
					<div class="icons_three">
						<a href="supplier.php"><img src="css/images/icon-supplier.png" height="80px"><br><p>Supplier</p></a>
					</div>
					<div class="icons_four">
						<a href="manage_accts.php"><img src="css/images/icon-manage-accounts.png" height="90px"><p class="manage">Manage Accounts</p></a>
					</div>
					<div class="icons_five">
						<a href="../logout.php"><img src="css/images/icon-logout.png" height="90px"><p class="logout">Logout</p></a>
					</div>
				</div>
			</div>
		</div>
		<div id="Center"> <!--Menu Content-->
			<div class="sales_content">
				<table border="5" bordercolor="#57000c" class="nohover" style="width:750px">
					<form action="addsupplier.php" method="POST">
						<tr>
							<th colspan=2>Supplier Details</td>
						</tr>
						<tr>
							<td><b>Supplier Name:</b></td>
							<td><input type="text" name="supplier_name" placeholder="Supplier Name" required/></td>
						</tr>
						<tr>
							<td><b>Products:</b></td>
							<td><input type="text" name="products" placeholder="Products Offered" required/></td>
						</tr>
						<tr>
							<td><b>Location</b></td>
							<td><input type="text" name="location" placeholder="Address" required/></td>
						</tr>
						<tr>
							<td><b>Contact Number</b></td>
							<td><input type="text" name="contact_number" placeholder="Contact Number" required/></td>
						</tr>
						<tr>
							<td colspan="2">
								<button name="register" class="all_btn" type="submit">Sign Up</button>
								<button name="cancel" class="all_btn" type="submit"><a href="supplier.php">Back</button>
							</td>
						</tr>
					</form>
				</table><?php

					if(isset($_POST['register']))
					{
						$supplier_name=$_POST['supplier_name'];
						$products=$_POST['products'];
						$location=$_POST['location'];
						$contact_number=$_POST['contact_number'];

						$select_supplier="SELECT * FROM supplier WHERE supplier_name='$supplier_name'";
						$result_select=mysqli_query($connect,$select_supplier);

						if(mysqli_num_rows($result_select)>0)
						{
							echo '<script type="text/javascript"> alert("Supplier already exists!") </script>';
						}
						else
						{
							$insert_supplier="INSERT INTO supplier (supplier_name, products, location, contact_number) VALUES ('$supplier_name','$products','$location','$contact_number')";
							$result=mysqli_query($connect,$insert_supplier);

							echo '<script type="text/javascript"> alert("Supplier successfully registered!!!") </script>';
							header('location:supplier.php');
						}
					}

			?></div>
		</div>
		<div id="Footer"> <!--about us, contact us, privacy policy, disclaimer-->
			Footer
		</div>
	</div>
</body>
</html>