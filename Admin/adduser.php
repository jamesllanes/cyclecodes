<?php
	session_start();
	require '../dbconfig/config.php';
?>
<!DOCTYPE html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="../Admin/css/admin.css">
	<title>Ace Hardware | Add User </title>
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
								<br><a href="../../index.php"> Create account | Sign in</a><?php
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
					<a href="dashboard.php" style="text-decoration: none; color:white">Dashboard</a> > <a href="manage_accts.php" style="text-decoration: none; color:white">Manage Accounts</a> > Add User
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
					<form action="adduser.php" method="POST">
						<tr>
							<th colspan=2>User Account Details</td>
						</tr>
						<tr>
							<td style="width: 40%"><b>Full Name:</b></td>
							<td><input type="text" name="fullname" placeholder="Fullname" required/></td>
						</tr>
						<tr>
							<td><b>Gender:</b></td>
							<td>
								<input type="radio" name="gender" value="male" checked required/>Male
								<input type="radio" name="gender" value="female" required/>Female
							</td>
						</tr>
						<tr>
							<td><b>Email:</b></td>
							<td><input type="email" name="email" placeholder="Email Address" required/></td>
						</tr>
						</tr>
						<tr>
							<td><b>Username:</b></td>
							<td><input type="text" name="username" placeholder="Username" required/></td>
						</tr>
						<tr>
							<td><b>Password:</b></td>
							<td><input type="text" name="password" placeholder="Password" required/></td>
						</tr>
						<tr>
							<td><b>User Type:</b></td>
							<td>
								<input type="radio" name="usertype" value="Admin" checked required/>Admin
								<input type="radio" name="usertype" value="Employee" required/>Employee
								<input type="radio" name="usertype" value="Customer" required/>Customer
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<button name="register" class="all_btn" type="submit">Sign Up</button>
								<button name="cancel" class="all_btn" type="submit"><a href="manage_accts.php">Back</button>
							</td>
						</tr>
					</form>
				</table><?php

				if(isset($_POST['register']))
				{
					$fullname=$_POST['fullname'];
					$gender=$_POST['gender'];
					$username=$_POST['username'];
					$password=$_POST['password'];
					//$cpassword=$_POST['cpassword'];
					$email=$_POST['email'];
					$usertype=$_POST['usertype'];

					$query1="SELECT * FROM userinfotable_admin WHERE admin_username='$username'";
					$query2="SELECT * FROM userinfotable_employee WHERE employee_username='$username'";
					$query3="SELECT * FROM userinfotable_customer WHERE customer_username='$username'";

					$result1=mysqli_query($connect,$query1);
					$result2=mysqli_query($connect,$query2);
					$result3=mysqli_query($connect,$query3);

					if(!mysqli_num_rows($result1)>0)
					{
						if($usertype=='Admin')
						{
							$query="INSERT INTO userinfotable_admin VALUES ('','$fullname','$gender','$email','$username','$password','$usertype')";
							$result=mysqli_query($connect,$query);

							echo '<script type="text/javascript"> alert("User successfully registered!!!") </script>';
							header('location:manage_accts.php');
						}
					}
					elseif(!mysqli_num_rows($result2)>0)
					{
						if($usertype=='Employee')
						{
							$query="INSERT INTO userinfotable_employee VALUES ('','$fullname','$gender','$email','$username','$password','$usertype')";
							$result=mysqli_query($connect,$query);

							echo '<script type="text/javascript"> alert("User successfully registered!!!") </script>';
							header('location:manage_accts.php');
						}
					}
					elseif(!mysqli_num_rows($result3)>0)
					{
						if($usertype=='Customer')
						{
							$query="INSERT INTO userinfotable_customer VALUES ('','$fullname','$gender','$email','$username','$password','$usertype')";
							$result=mysqli_query($connect,$query);

							echo '<script type="text/javascript"> alert("User successfully registered!!!") </script>';
							header('location:manage_accts.php');
						}
					}
					else
					{
						echo '<script type="text/javascript"> alert("User already exists...try another username") </script>';
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