<?php
	session_start();
	require '../dbconfig/config.php';
?>
<!DOCTYPE html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="../Admin/css/admin.css">
	<title>Ace Hardware | Supplier</title>
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
				<a href="dashboard.php" style="text-decoration: none; color:white">Dashboard</a> > Supplier
				</div>
			</div>
			<div id="Middle"> <!--Menu ICONS-->
				<div class="icons_grid">
					<div class="icons_one">
						<a href="sales.php"><img src="css/images/icon-sales.png" height="80px"><br><p>Sales</p></a>
					</div>
					<div class="icons_two">
						<a href="inventory.php"><img src="css/images/icon-inventory.png" height="80px"><br><p>Products</p></a>
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
				<table border="5" bordercolor="#57000c" class="accts" style="width:880px">
					<tr><!--HEADER! TITLE!-->
						<td><b>Supplier ID</b></td>
						<td><b>Supplier Name</b></td>
						<td><b>Products Offered</b></td>
						<td style="width: 280px;"><b>Location</b></td>
						<td><b>Contact No.</b></td>
						<td colspan="2" style="width: 120px;"><b>Action</b></td>
					</tr>
					<?php
						$select_supplier="SELECT * FROM supplier";
						$result1=mysqli_query($connect,$select_supplier);

						if(mysqli_num_rows($result1)>0)
						{
							while($row=mysqli_fetch_array($result1))
							{
								echo "<tr>";
								echo "<td>".$row['supplier_ID']."</td>";
								echo "<td>".$row['supplier_name']."</td>";
								echo "<td>".$row['products']."</td>";
								echo "<td>".$row['location']."</td>";
								echo "<td>".$row['contact_number']."</td>";
								echo "<td style='width: 50px;'><button name='edit' class='all_btn'><a href='editsupplier.php?supplier_ID=$row[supplier_ID]'>Edit</button></td>";
								echo "<td><button name='delete' class='all_btn'><a href='deletesupplier.php?supplier_ID=$row[supplier_ID]'>Delete</a></button></td>";
								echo "</tr>";
							}
						}
						else
						{
							echo "<tr><td colspan='6'><b>Supplier list is empty!</b></td></tr>";
						}
					?>
					<tr>
						<!--BUTTONS!!!!-->
						<td colspan='7' class="no_border"><button name="" class="all_btn"><a href="addsupplier.php">Add Supplier</a></button></td>
					</tr>
				</table>
			</div>
			
		</div>
		<div id="Footer"> <!--about us, contact us, privacy policy, disclaimer-->
			Footer
		</div>
	</div>
</body>
</html>