<?php
	session_start();
	require '../dbconfig/config.php';
?>
<!DOCTYPE html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="../Admin/css/admin.css">
	<title>Ace Hardware | Manage Accounts</title>
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
					<a href="dashboard.php" style="text-decoration: none; color:white">Dashboard</a> > <a href="supplier.php" style="text-decoration: none; color:white">Supplier</a> > Delete Supplier
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
							<form action="deletesupplier.php?supplier_ID=<?php echo $supplier_ID?>" method="POST">
								<tr><th colspan='2'><?php echo $row['supplier_name'] ?></th></tr>
								<tr>
									<td></b>Supplier ID:</b></td>
									<td><input type="text" name="ID" value="<?php echo $row['supplier_ID'];?>" readonly /></td>
								</tr>
								<tr>
									<td></b>Supplier Name:</b></td>
									<td><input type="text" name="supplier_name" value="<?php echo $row['supplier_name'];?>" readonly /></td>
								</tr>
								<tr>
									<td></b>Products:</b></td>
									<td><input type="text" name="products" value="<?php echo $row['products'];?>" readonly /></td>
								</tr>
								<tr>
									<td></b>Location:</b></td>
									<td><input type="text" name="location" value="<?php echo $row['location'];?>" readonly /></td>
								</tr>
								<tr>
									<td colspan="2">
										<input type="submit" class="all_btn" name="delete" value="Delete">
										<button name="Back" class="all_btn"><a href="supplier.php">Back</a></button>
										<?php 
											if(isset($_POST['delete']))
											{
												$delete="DELETE FROM supplier WHERE supplier_ID = '$supplier_ID' ";//admin
												$result=mysqli_query($connect,$delete);
												
												if($result)
												{
													header('location:supplier.php');
												}
												else
												{
													echo "<script type='text/javascript'> alert('Nothing to Delete!') </script>";
												}
											}
											else
											{
												echo " ";
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
		<!--<div id="Footer"> <!--about us, contact us, privacy policy, disclaimer-->
			<!--Footer-->
		<!--</div>-->
	</div>
</body>
</html>