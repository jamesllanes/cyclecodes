<?php
	session_start();
	require '../dbconfig/config.php';
?>
<!DOCTYPE html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="../Admin/css/admin.css">
	<title>Ace Hardware | Dashboard</title>
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
				Dashboard
				</div>
			</div>
			<div id="Middle"> <!--Menu ICONS-->`
				<div class="icons_grid">
					<?php
						if($_SESSION['usertype']=='Admin')
						{?>
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
							</div><?php
						}
						elseif($_SESSION['usertype']=='Employee')
						{?>
							<div class="icons_two">
								<a href="employee_inventory.php"><img src="css/images/icon-inventory.png" height="80px"><br><p>Inventory</p></a>
							</div>
							<div class="icons_three">
								<a href="employee_supplier.php"><img src="css/images/icon-supplier.png" height="80px"><br><p>Supplier</p></a>
							</div>
							<div class="icons_four">
								<a href="../logout.php"><img src="css/images/icon-logout.png" height="90px"><p class="logout">Logout</p></a>
							</div><?php
						}
						else
						{?>
							//invalid
							<script type="text/javascript"> alert("Invalid Username or Password!"); window.location = "../index.php"; </script><?php
						}
				?>
				</div>
			</div>
		</div>
		<div id="Center"> <!--Menu Content-->
			<div class="grid_list">
			HELLO
			</div>
		</div>
		<div id="Footer"> <!--about us, contact us, privacy policy, disclaimer-->
			Footer
		</div>
	</div>
</body>
</html>