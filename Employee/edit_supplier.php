<?php
	session_start();
	require '../dbconfig/config.php';
?>
<!DOCTYPE html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/employee.css">
	<title>Ace Hardware | Edit Supplier</title>
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
				Supplier > Edit
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
				<table border="5" bordercolor="#57000c" class="nohover" style="width:750px">
				<?php
					$supplier_ID=$_REQUEST['supplier_ID'];
					$_SESSION['supplier_ID']=$supplier_ID;
					$supplier_ID=$_SESSION['supplier_ID'];
					
					$query="SELECT * FROM supplier WHERE supplier_ID='$supplier_ID'";
					$result=mysqli_query($connect,$query);

					if(mysqli_num_rows($result)>0)//admin
					{
						while($row=mysqli_fetch_array($result))
						{?>
							<form action="edit_supplier.php?supplier_ID=<?php echo $supplier_ID?>" method="POST">
								<tr><th colspan='2'><?php echo $row['supplier_name'];?></th></tr>
								<tr>
									<td><b>Supplier ID:</b></td>
									<td><input type="text" name="supplier_ID" value="<?php echo $row['supplier_ID'];?>" readonly /></td>
								</tr>
								<tr>
									<td><b>Supplier Name:</b></td>
									<td><input type="text" name="supplier_name" value="<?php echo $row['supplier_name'];?>"/></td>
								</tr>
								<tr>
									<td><b>Products:</b></td>
									<td><input type="text" name="products" value="<?php echo $row['products'];?>"/></td>
								</tr>
								<tr>
									<td><b>Location:</b></td>
									<td><input type="text" name="location" value="<?php echo $row['location'];?>"/></td>
								</tr>
								<tr>
									<td><b>Contact No.:</b></td>
									<td><input type="text" name="contact_number" value="<?php echo $row['contact_number'];?>"/></td>
								</tr>
								<tr>
									<td colspan="2">
										<input type="submit" class="all_btn" name="edit" value="Update">
										<button name="Back" class="all_btn"><a href="employee_supplier.php">Back</a></button>
										<?php
											if(isset($_POST['edit']))
											{
												$supplier_ID=$_POST['supplier_ID'];
												$supplier_name=$_POST['supplier_name'];
												$products=$_POST['products'];
												$location=$_POST['location'];
												$contact_number=$_POST['contact_number'];

												$edit="UPDATE supplier SET supplier_name='$supplier_name',products='$products' ,location='$location',contact_number='$contact_number' WHERE supplier_ID = '$supplier_ID' ";
												$result_update=mysqli_query($connect,$edit);

												?><meta http-equiv="refresh" content=".000000;url=employee_supplier.php?supplier_ID=<?php echo $supplier_ID?>"><?php
												
												if($result_update)
												{
													//echo "updated";
													header('location:employee_supplier.php');
												}
												else
												{
													//echo "failed.";
													echo "<script type='javascript/text'> alert('Nothing to Update!') </script>";
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