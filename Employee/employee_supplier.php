<?php
	session_start();
	require '../dbconfig/config.php';
?>
<!DOCTYPE html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/employee.css">
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
				Supplier
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
		<div id="Center">--> <!--Menu Content-->
			<div class="sales_content">
				<table border="5" class="table" style="width:750px">
					<tr><!--HEADER! TITLE!-->
						<td style="width: 90px"><b>Supplier ID</b></td>
						<td><b>Supplier Name</b></td>
						<td><b>Products Offered</b></td>
						<td style="width: 130px"><b>Location</b></td>
						<td><b>Contact No.</b></td>
						<th colspan="2" style="width: 100px">Action</th>
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
								echo "<td style='width: 50px'><button name='edit' class='all_btn'><a href='edit_supplier.php?supplier_ID=$row[supplier_ID]'>Edit</button></td>";
								echo "<td style='width: 75px'><button name='delete' class='all_btn'><a href='delete_supplier.php?supplier_ID=$row[supplier_ID]'>Delete</a></button></td>";
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
						<td colspan='7' class="no_border"><button name="" class="all_btn"><a href="add_supplier.php">Add Supplier</a></button></td>
					</tr>
				</table>
			</div>
			
		</div>
	</div>
</body>
</html>