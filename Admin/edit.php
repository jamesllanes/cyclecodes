<?php
	session_start();
	require '../dbconfig/config.php';
?>
<!DOCTYPE html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="../Admin/css/admin.css">
	<title>Ace Hardware | Edit</title>
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
				<a href="dashboard.php" style="text-decoration: none; color:white">Dashboard</a> > <a href="manage_accts.php" style="text-decoration: none; color:white">Manage Accounts</a> > Edit Account
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
				<table border="5" bordercolor="#57000c" class="nohover" style="width:750px">
				<?php

					$edit=$_REQUEST['edit_ID'];
					$_SESSION['edit_ID']=$edit;
					$edit_ID=$_SESSION['edit_ID'];

					
					
					$query1="SELECT * FROM userinfotable_admin WHERE admin_ID LIKE '%$edit_ID%'";//admin
					$query2="SELECT * FROM userinfotable_customer WHERE customer_ID LIKE '%$edit_ID%'";//customer
					$query3="SELECT * FROM userinfotable_employee WHERE employee_ID LIKE '%$edit_ID%'";//employee

					$result1=mysqli_query($connect,$query1);
					$result2=mysqli_query($connect,$query2);
					$result3=mysqli_query($connect,$query3);

					$count1=mysqli_num_rows($result1);
					$count2=mysqli_num_rows($result2);
					$count3=mysqli_num_rows($result3);

					if($count1>0)//admin
					{
						?><form action="edit.php?edit_ID=<?php echo $edit_ID?>" method="POST"><?php
						$query1="SELECT * FROM userinfotable_admin WHERE admin_ID= '$edit_ID'";//admin
						$result1=mysqli_query($connect,$query1);

						while($row=mysqli_fetch_array($result1))
						{?>
								<tr>
									<td></b>Admin ID:</b></td>
									<td><input type="text" name="ID" value="<?php echo $row['admin_ID'];?>" readonly /></td>
								</tr>
								<tr>
									<td></b>Fullname:</b></td>
									<td><input type="text" name="fullname" value="<?php echo $row['fullname'];?>"/></td>
								</tr>
								<tr>
									<td></b>Gender:</b></td>
									<td><input type="text" name="gender" value="<?php echo $row['gender'];?>" /></td>
								</tr>
								<tr>
									<td></b>Email:</b></td>
									<td><input type="text" name="email" value="<?php echo $row['email'];?>"/></td>
								</tr>
								<tr>
									<td></b>Username:</b></td>
									<td><input type="text" name="username" value="<?php echo $row['admin_username'];?>"/></td>
								</tr>
								<tr>
									<td></b>Password:</b></td>
									<td><input type="text" name="password" value="<?php echo $row['admin_password'];?>"/></td>
								</tr>
								<tr>
									<td>Usertype:</td>
									<td><input type="text" name="usertype" value="<?php echo $row['usertype'];?>"/></td>
								</tr>
								<tr>
									<td colspan="2">
										<input type="submit" class="all_btn" name="edit" value="Update">
										<button name="Back" class="all_btn"><a href="manage_accts.php">Back</a></button>
										<?php
											if(isset($_POST['edit']))
											{
												$fullname=$_POST['fullname'];
												$gender=$_POST['gender'];
												$email=$_POST['email'];
												$username=$_POST['username'];
												$password=$_POST['password'];
												$usertype=$_POST['usertype'];

												$edit="UPDATE userinfotable_admin SET fullname='$fullname', gender='$gender', email='$email', admin_username='$username', admin_password='$password', usertype='$usertype' WHERE admin_ID = '$edit_ID' ";//admin
												$result=mysqli_query($connect,$edit);

												?><meta http-equiv="refresh" content=".000000;url=manage_accts.php?edit_ID=<?php echo $edit_ID?>"><?php
												
												if($result)
												{
													echo "patanga";
													//header('location:manage_accts.php');
												}
												else
												{
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
					elseif($count2>0)//customer
					{
						while($row=mysqli_fetch_array($result2))
						{?>
							<form action="edit.php?edit_ID=<?php echo $edit_ID ?>" method="POST">
								<tr>
									<td></b>User ID:</b></td>
									<td><input type="text" name="ID" value="<?php echo $row['customer_ID'];?>"  readonly /></td>
								</tr>
								<tr>
									<td></b>Fullname:</b></td>
									<td><input type="text" name="fullname" value="<?php echo $row['fullname'];?>"   /></td>
								</tr>
								<tr>
									<td></b>Gender:</b></td>
									<td><input type="text" name="gender" value="<?php echo $row['gender'];?>"   /></td>
								</tr>
								<tr>
									<td></b>Email:</b></td>
									<td><input type="text" name="email" value="<?php echo $row['email'];?>"   /></td>
								</tr>
								<tr>
									<td></b>Username:</b></td>
									<td><input type="text" name="username" value="<?php echo $row['customer_username'];?>"   /></td>
								</tr>
								<tr>
									<td></b>Password:</b></td>
									<td><input type="text" name="password" value="<?php echo $row['customer_password'];?>"   /></td>
								</tr>
								<tr>
									<td>Usertype:</td>
									<td><input type="text" name="usertype" value="<?php echo $row['usertype'];?>"   /></td>
								</tr>
								<tr>
									<td colspan="2">
										<?php 
											if(isset($_POST['edit']))
											{
												$fullname=$_POST['fullname'];
												$gender=$_POST['gender'];
												$email=$_POST['email'];
												$username=$_POST['username'];
												$password=$_POST['password'];
												$usertype=$_POST['usertype'];

												$edit="UPDATE userinfotable_customer SET fullname='$fullname', gender='$gender', email='$email', admin_username='$username', admin_password='$password', usertype='$usertype' WHERE customer_ID = '$edit_ID' ";//customer
												$result=mysqli_query($connect,$edit);
												
												if($result)
												{
													header('location:manage_accts.php');
												}
												else
												{
													echo "<script type='javascript/text'> alert('Nothing to Update!') </script>";
												}
											}
											else
											{
												echo "";
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
							<form action="edit.php?edit_ID=<?php echo $edit_ID; ?>" method="POST">
								<tr>
									<td></b>User ID:</b></td>
									<td><input type="text" name="ID" value="<?php echo $row['employee_ID'];?>" readonly /></td>
								</tr>
								<tr>
									<td></b>Fullname:</b></td>
									<td><input type="text" name="fullname" value="<?php echo $row['fullname'];?>"   /></td>
								</tr>
								<tr>
									<td></b>Gender:</b></td>
									<td><input type="text" name="gender" value="<?php echo $row['gender'];?>"   /></td>
								</tr>
								<tr>
									<td></b>Email:</b></td>
									<td><input type="text" name="email" value="<?php echo $row['email'];?>"   /></td>
								</tr>
								<tr>
									<td></b>Username:</b></td>
									<td><input type="text" name="username" value="<?php echo $row['employee_username'];?>"   /></td>
								</tr>
								<tr>
									<td></b>Password:</b></td>
									<td><input type="text" name="password" value="<?php echo $row['employee_password'];?>"   /></td>
								</tr>
								<tr>
									<td>Usertype:</td>
									<td><input type="text" name="ID" value="<?php echo $row['usertype'];?>"   /></td>
								</tr>
								<tr>
									<td colspan=2>
										<?php 
											if(isset($_POST['edit']))
											{
												$fullname=$_POST['fullname'];
												$gender=$_POST['gender'];
												$email=$_POST['email'];
												$username=$_POST['username'];
												$password=$_POST['password'];
												$usertype=$_POST['usertype'];

												$edit="UPDATE userinfotable_employee SET fullname='$fullname', gender='$gender', email='$email', admin_username='$username', admin_password='$password', usertype='$usertype' WHERE employee_ID = '$edit_ID' ";//employee
												$result=mysqli_query($connect,$edit);
												
												if($result)
												{
													header('location:manage_accts.php');
												}
												else
												{
													echo "<script type='javascript/text'> alert('Nothing to Update!') </script>";
												}
											}
											else
											{
												echo "";
											}
										?>
									</td>
								</tr>
							</form><?php
						}
					}
				?>
			</div>
		</div>
		<!--<div id="Footer"> <!--about us, contact us, privacy policy, disclaimer-->
			<!--Footer-->
		<!--</div>-->
	</div>
</body>
</html>