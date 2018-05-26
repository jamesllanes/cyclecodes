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
				<a href="dashboard.php" style="text-decoration: none; color:white">Dashboard</a> > <a href="manage_accts.php" style="text-decoration: none; color:white">Manage Accounts</a> > Delete Account
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
					$delete=$_REQUEST['delete_ID'];
					$_SESSION['delete_ID']=$delete;
					$delete_ID=$_SESSION['delete_ID'];
					
					$query1="SELECT * FROM userinfotable_admin WHERE admin_ID LIKE '%$delete_ID%'";//admin
					$query2="SELECT * FROM userinfotable_customer WHERE customer_ID LIKE '%$delete_ID%'";//customer
					$query3="SELECT * FROM userinfotable_employee WHERE employee_ID LIKE '%$delete_ID%'";//employee

					$result1=mysqli_query($connect,$query1);
					$result2=mysqli_query($connect,$query2);
					$result3=mysqli_query($connect,$query3);

					$count1=mysqli_num_rows($result1);
					$count2=mysqli_num_rows($result2);
					$count3=mysqli_num_rows($result3);

					if($count1>0)//admin
					{
						while($row=mysqli_fetch_array($result1))
						{?>
							<form action="delete.php?delete_ID=<?php echo $delete_ID?>" method="POST">
								<tr>
									<td></b>User ID:</b></td>
									<td><input type="text" name="ID" value="<?php echo $row['admin_ID'];?>" readonly /></td>
								</tr>
								<tr>
									<td></b>Fullname:</b></td>
									<td><input type="text" name="fullname" value="<?php echo $row['fullname'];?>" readonly /></td>
								</tr>
								<tr>
									<td></b>Gender:</b></td>
									<td><input type="text" name="gender" value="<?php echo $row['gender'];?>" readonly /></td>
								</tr>
								<tr>
									<td></b>Email:</b></td>
									<td><input type="text" name="email" value="<?php echo $row['email'];?>" readonly /></td>
								</tr>
								<tr>
									<td></b>Username:</b></td>
									<td><input type="text" name="username" value="<?php echo $row['admin_username'];?>" readonly /></td>
								</tr>
								<tr>
									<td></b>Password:</b></td>
									<td><input type="text" name="password" value="<?php echo $row['admin_password'];?>" readonly /></td>
								</tr>
								<tr>
									<td>Usertype:</td>
									<td><input type="text" name="ID" value="<?php echo $row['usertype'];?>" readonly /></td>
								</tr>
								<tr>
									<td colspan="2">
										<input type="submit" class="all_btn" name="delete" value="Delete">
										<button name="Back" class="all_btn"><a href="manage_accts.php">Back</a></button>
										<?php 
											if(isset($_POST['delete']))
											{
												$delete="DELETE FROM userinfotable_admin WHERE admin_ID = '$delete_ID' ";//admin
												$result=mysqli_query($connect,$delete);
												
												if($result)
												{
													header('location:manage_accts.php');
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
					elseif($count2>0)//customer
					{
						while($row=mysqli_fetch_array($result2))
						{?>
							<form action="delete.php?delete_ID=<?php echo $delete_ID?>" method="POST">
								<tr>
									<td></b>User ID:</b></td>
									<td><input type="text" name="ID" value="<?php echo $row['customer_ID'];?>" readonly /></td>
								</tr>
								<tr>
									<td></b>Fullname:</b></td>
									<td><input type="text" name="fullname" value="<?php echo $row['fullname'];?>" readonly /></td>
								</tr>
								<tr>
									<td></b>Gender:</b></td>
									<td><input type="text" name="gender" value="<?php echo $row['gender'];?>" readonly /></td>
								</tr>
								<tr>
									<td></b>Email:</b></td>
									<td><input type="text" name="email" value="<?php echo $row['email'];?>" readonly /></td>
								</tr>
								<tr>
									<td></b>Username:</b></td>
									<td><input type="text" name="username" value="<?php echo $row['customer_username'];?>" readonly /></td>
								</tr>
								<tr>
									<td></b>Password:</b></td>
									<td><input type="text" name="password" value="<?php echo $row['customer_password'];?>" readonly /></td>
								</tr>
								<tr>
									<td>Usertype:</td>
									<td><input type="text" name="ID" value="<?php echo $row['usertype'];?>" readonly /></td>
								</tr>
								<tr>
									<td colspan="2">
										<input type="submit" name="delete" value="Delete">
										<button name="Back"><a href="manage_accts.php">Back</a></button>
										<?php 
											if(isset($_POST['delete']))
											{
												$delete="DELETE FROM userinfotable_admin WHERE customer_ID = '$delete_ID' ";//customer
												$result=mysqli_query($connect,$delete);
												
												if($result)
												{
													header('location:manage_accts.php');
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
					elseif($count3>0)//employee
					{
						while($row=mysqli_fetch_array($result3))
						{?>
							<form action="delete.php?delete_ID=<?php echo $delete_ID?>" method="POST">
								<tr>
									<td></b>User ID:</b></td>
									<td><input type="text" name="ID" value="<?php echo $row['employee_ID'];?>" readonly /></td>
								</tr>
								<tr>
									<td></b>Fullname:</b></td>
									<td><input type="text" name="fullname" value="<?php echo $row['fullname'];?>" readonly /></td>
								</tr>
								<tr>
									<td></b>Gender:</b></td>
									<td><input type="text" name="gender" value="<?php echo $row['gender'];?>" readonly /></td>
								</tr>
								<tr>
									<td></b>Email:</b></td>
									<td><input type="text" name="email" value="<?php echo $row['email'];?>" readonly /></td>
								</tr>
								<tr>
									<td></b>Username:</b></td>
									<td><input type="text" name="username" value="<?php echo $row['employee_username'];?>" readonly /></td>
								</tr>
								<tr>
									<td></b>Password:</b></td>
									<td><input type="text" name="password" value="<?php echo $row['employee_password'];?>" readonly /></td>
								</tr>
								<tr>
									<td>Usertype:</td>
									<td><input type="text" name="ID" value="<?php echo $row['usertype'];?>" readonly /></td>
								</tr>
								<tr>
									<td colspan="2">
										<input type="submit" name="delete" value="Delete">
										<button name="Back"><a href="manage_accts.php">Back</a></button>
										<?php 
											if(isset($_POST['delete']))
											{
												$delete="DELETE FROM userinfotable_employee WHERE employee_ID = '$delete_ID' ";//employee
												$result=mysqli_query($connect,$delete);
												
												if($result)
												{
													header('location:manage_accts.php');
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