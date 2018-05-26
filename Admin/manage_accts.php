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
	<style>
	td{
		padding: 5px;
	}
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
					<a href="dashboard.php" style="text-decoration: none; color:white">Dashboard</a> > Manage Accounts
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
				<table border="5" bordercolor="#57000c" class="accts" style="width:880px; font-size: 13px;">
					<tr>
						<th style="width: 30px;">User ID</th>
						<th style="width: 250px;">Full Name</th>
						<th style="width: 60px;">Gender</th>
						<th style="width: 380px;">Email</th>
						<th style="width: 100px;">User Type</th>
						<th style="width: 80px;">Username</th>
						<th style="width: 80px;">Password</th>
						<th colspan="2" style="width: 30px;">Action</th>
					</tr>
					<?php
						$query1="SELECT * FROM userinfotable_admin";
						$query2="SELECT * FROM userinfotable_customer";
						$query3="SELECT * FROM userinfotable_employee";

						$result1=mysqli_query($connect,$query1);
						$result2=mysqli_query($connect,$query2);
						$result3=mysqli_query($connect,$query3);

						$count1=mysqli_num_rows($result1);
						$count2=mysqli_num_rows($result2);
						$count3=mysqli_num_rows($result3);

						if(mysqli_num_rows($result1) && mysqli_num_rows($result2) && mysqli_num_rows($result3)>0)
						{
							while($row=mysqli_fetch_array($result1))//admin
							{
								echo "<tr>";
								echo "<td>".$row['admin_ID']."</td>";
								echo "<td>".$row['fullname']."</td>";
								echo "<td>".$row['gender']."</td>";
								echo "<td>".$row['email']."</td>";
								echo "<td>".$row['usertype']."</td>";
								echo "<td>".$row['admin_username']."</td>";
								echo "<td>".$row['admin_password']."</td>";
								echo "<td><button name='edit' class='all_btn'><a href='edit.php?edit_ID=$row[admin_ID]'>Edit</button></td>";
								echo "<td><button name='delete' class='all_btn'><a href='delete.php?delete_ID=$row[admin_ID]&delete_username=$row[admin_username]'>Delete</a></button></td>";
								echo "</tr>";
							}

							while($row=mysqli_fetch_array($result3))//empployee
							{
								echo "<tr>";
								echo "<td>".$row['employee_ID']."</td>";
								echo "<td>".$row['fullname']."</td>";
								echo "<td>".$row['gender']."</td>";
								echo "<td>".$row['email']."</td>";
								echo "<td>".$row['usertype']."</td>";
								echo "<td>".$row['employee_username']."</td>";
								echo "<td>".$row['employee_password']."</td>";
								echo "<td><button name='edit' class='all_btn'><a href='edit.php?edit_ID=$row[employee_ID]'>Edit</button></td>";
								echo "<td><button name='delete' class='all_btn'><a href='delete.php?delete_ID=$row[employee_ID]&delete_username=$row[employee_username]'>Delete</a></button></td>";
								echo "</tr>";
							}

							while($row=mysqli_fetch_array($result2))//customer
							{
								echo "<tr>";
								echo "<td>".$row['customer_ID']."</td>";
								echo "<td>".$row['fullname']."</td>";
								echo "<td>".$row['gender']."</td>";
								echo "<td>".$row['email']."</td>";
								echo "<td>".$row['usertype']."</td>";
								echo "<td>".$row['customer_username']."</td>";
								echo "<td>".$row['customer_password']."</td>";
								echo "<td><button name='edit' class='all_btn'><a href='edit.php?edit_ID=$row[customer_ID]'>Edit</button></td>";
								echo "<td><button name='delete' class='all_btn'><a href='delete.php?delete_ID=$row[customer_ID]&delete_username=$row[customer_username]'>Delete</a></button></td>";
								echo "</tr>";
							}
						}
						else
						{
							echo "Manage Accounts were empty!";
						}
					?>
					<tr>
						<td colspan='9' class="no_border"><button name="add_user" class='all_btn'><a href="adduser.php">Add User</a></button></td>
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