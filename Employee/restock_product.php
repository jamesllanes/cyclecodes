<?php
	session_start();
	require '../dbconfig/config.php';
?>
<!DOCTYPE html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/employee.css">
	<title>Ace Hardware | Restock Product</title>
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
				<a href="employee_inventory.php" style="text-decoration: none; color:white">Products</a> > Restock Product
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
				<table border="5" class="nohover" style="width:750px">
				<?php
					$Prod_ID=$_REQUEST['Prod_ID'];
					$_SESSION['Prod_ID']=$Prod_ID;
					$Prod_ID=$_SESSION['Prod_ID'];
					
					$query="SELECT * FROM inventory WHERE Prod_ID='$Prod_ID'";
					$result=mysqli_query($connect,$query);

					if(mysqli_num_rows($result)>0)//admin
					{
						while($row=mysqli_fetch_array($result))
						{?>
							<form action="restock_product.php?Prod_ID=<?php echo $Prod_ID?>" method="POST">
								<tr><th colspan='4'>Restock for Product <?php echo $row['Prod_Name'];?></th></tr>
								<tr>
									<td><b>Product ID:</b></td>
									<td><input type="readonly" name="Prod_ID" value="<?php echo $row['Prod_ID'];?>" readonly /></td>
									<td><b>Price:</b></td>
									<td><input type="readonly" name="Price" value="<?php echo $row['Price'];?>" /></td>
								</tr>
								<tr>
									<td colspan='4' style='padding-top: 3em;'><b>Quantity:</b></td>
								</tr>
								<tr>
									<td colspan='4'><input type="text" name="Quantity" value="<?php echo $row['Quantity'];?>" /></td>
								</tr>
								<tr>
									<td colspan="4">
										<input type="submit" class="all_btn" name="edit" value="Update">
										<button name="Back" class="all_btn"><a href="employee_inventory.php">Back</a></button>
										<?php
											if(isset($_POST['edit']))
											{
												$Quantity=$_POST['Quantity'];

												$edit="UPDATE inventory SET Quantity='$Quantity' WHERE Prod_ID = '$Prod_ID'";
												$edit_result=mysqli_query($connect,$edit);

												?><meta http-equiv="refresh" content=".000000;url=employee_inventory.php?Prod_ID=<?php echo $Prod_ID?>"><?php
												
												if($edit_result)
												{
													header('location:employee_inventory.php');
												}
												else
												{
													echo "<script type='text/javascript'> alert('Nothing to Update!') </script>";
												}
											}
											else
											{
												" ";
											}
										?>
									</td>
								</tr>
							</form><?php
						}
					}
				?></table>
			</div>
		</div>
	</div>
</body>
</html>