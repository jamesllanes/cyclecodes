<!DOCTYPE html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/sale_and_specials.css">
	<title>Ace Hardware</title>
	<meta name="description" content="Write some words to describe your html page">
</head>
<body>
	<div class="blended_grid">
		<div id="fixed_top">
			<div id="TopNav"> <!--logo, signin, search, customer service, others-->
				<a href="newhome.php"><img src="ace2.png" width="14%"></a>
				<div id="Login_Container">
					<div id="Login_Content">
						Welcome! <br> Create account | Signin
					</div>
				</div>
				<div id="Search">
					<form action="search.php" method="GET">
						<div id="Search_Content">
							<input type="text" id="search_box" name="search" placeholder="Search Product">
							<button type="submit" id="search_btn"><img src="search3.png" width="20px"></button>
						</div>
					</form>
				</div>
			</div>
				<div id="CustomerService_btn">
					<button class="button">CUSTOMER SERVICE</button>
				</div>
			<div id="MenuNav"> <!--shop, sale&specials, wishlist, careers, about us-->
				<div class="dropdown">
				  <button class="dropbtn">Categories</button>
				  <div class="dropdown-content">
				    <a href="1paint.php">Paints and Sundries</a>
				    <a href="2tools.php">Tools</a>
				    <a href="3electrical.php">Electrical</a>
				    <a href="4plumbing.php">Plumbing</a>
				    <a href="5home_hardware.php">Home Hardware</a>
				    <a href="6houseware.php">Houseware</a>
				    <a href="7lawn.php">Lawn and Outdoor</a>
				    <a href="8automotive.php">Automotive</a>
				    <a href="9appliances.php">Small Appliances</a>
				    <a href="10chemicals.php">Chemicals and Batteries</a>
				    <a href="11pets.php">Pets</a>
				  </div>
				</div>
				<div class="tab">
				  <button class="tablinks" onclick="#">Sale & Specials</button>
				  <button class="tablinks" onclick="#">Wishlist</button>
				  <button class="tablinks" onclick="#">Careers</button>
				  <button class="tablinks" onclick="#">About Us</button>
				</div>
				<div class="cart_tab">
					<p>Cart: 0 Items</p>
				</div>
			</div>
		</div>
		<div id="Middle"> <!--breadcrumb-->
			<div class="breadcrumbs">
				<p>Specials</p>
			</div>
		</div>
		<div id="Center"> <!--category links-->
			<div class="specials">
				<img src="specials2.jpg">
			</div>
		</div>
		<div id="Footer"> <!--about us, contact us, privacy policy, disclaimer-->
			Footer
		</div>
	</div>
</body>
</html>