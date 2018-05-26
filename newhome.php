<?php
	session_start();
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/newhome.css">
	<title>Cycle Codes</title>
	<meta name="description" content="Write some words to describe your html page">
</head>
<body class="preload">
	<div class="blended_grid">
		<div id="fixed_top">
			<div id="TopNav"> <!--logo, signin, search, customer service, others-->
				<a href="newhome.php"><img src="cycle_codes.png" width="14%"></a>
				<div id="Login_Container1">
					<div id="Login_Content">
						<?php  
							if(empty($_SESSION['customer_ID']))
							{
								echo "Welcome Guest!";?>
								<br><a href="index.php"> Create account | Sign in</a><?php
							}
							elseif(!empty($_SESSION['customer_ID']))
							{
								echo "Welcome<br><font color='red'><b>".$_SESSION['fullname']."</b></font>!";
								echo "<form action='logout.php' method='POST'><input type='submit' value='Logout' class='logout'/></form>";
							}
							else
							{
								echo '<script type="text/javascript"> alert("Invalid Username or Password!") </script>';
							} 
						?>
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
			<div id="MenuNav"> <!--shop, sale&specials, wishlist, careers, about us-->
				<div class="dropdown">
				  <button class="dropbtn">Categories</button>
				  <div class="dropdown-content">
				    <a href="category/builtbikes.php">Built Bikes</a>
				    <a href="category/accessories.php">Accessories</a>
				    <a href="category/brakeset.php">Brakeset</a>
				    <a href="category/cables.php">Cables</a>
				    <a href="category/chain.php">Chain</a>
				    <a href="category/cogs.php">Cogs</a>
				    <a href="category/crankset.php">Crankset</a>
				  </div>
				</div>
				<div class="tab">
				  <a href="sale_and_specials.php"><button class="tablinks">Sale & Specials</button></a>
				  <button class="tablinks" onclick="location.href='wishlist.php?customer_ID=<?php echo $_SESSION["customer_ID"]?>&w=0'">Wishlist</button>
				  <a href="careers.php"><button class="tablinks">Careers</button></a>
				  <a href="about_us.php"><button class="tablinks">About Us</button></a>
				</div>
				<div class="cart_tab">
					<p>Cart: 0 Items</p>
				</div>
			</div>
		</div>
		<div id="Middle1"> <!--Hot Picks-->
			<br><center><img src="hotpicks/header.jpg" height="300px" width="1000px"></center>
		</div>
		<div id="Middle"> <!--slideshow-->
			<div class="slideshow-container">
			<!--<div class="mySlides fade">
			  <!--<div class="numbertext">1 / 3</div><a href="#">
			  <img src="slideshow1.png">
			  <!--<div class="text">Construction</div>
			</div>-->

			<div class="mySlides fade">
			  <!--<div class="numbertext">2 / 3</div><a href="#">-->
			  <img src="hotpicks/slideshow2.png">
			  <!--<div class="text">Home Appliances</div>-->
			</div>

			<div class="mySlides fade">
			  <!--<div class="numbertext">3 / 3</div><a href="#">-->
			  <img src="hotpicks/slideshow3.png">
			  <!--<div class="text">Car Tools And Accessories</div>-->
			</div>

			</div>
			<br>

			<div class="dot-div">
			  <span class="dot" style="position:relative;left:460px;top:270px;"></span> 
			  <span class="dot" style="position:relative;left:460px;top:270px;"></span> 
			</div>

			<script>
			var slideIndex = 0;
			showSlides();

			function showSlides() {
			    var i;
			    var slides = document.getElementsByClassName("mySlides");
			    var dots = document.getElementsByClassName("dot");
			    for (i = 0; i < slides.length; i++) {
			       slides[i].style.display = "none";  
			    }
			    slideIndex++;
			    if (slideIndex > slides.length) {slideIndex = 1}    
			    for (i = 0; i < dots.length; i++) {
			        dots[i].className = dots[i].className.replace(" active", "");
			    }
			    slides[slideIndex-1].style.display = "block";  
			    dots[slideIndex-1].className += " active";
			    setTimeout(showSlides, 3000); 
			}
			</script>
		</div>
		<div id="Center"> <!--category links-->
			<br><br><center><a class="bike">BIKE PARTS</a></center>
			<div class="wrapper">
				<div class="one">
					<a class="categorynames" href="category/accessories.php"><center><img src="css/images/accessories_icon.png" height="250px" width="250px"></center></a><br>
				</div>
				<div class="two">
					<a class="categorynames" href="category/brakeset.php"><center><img src="css/images/brakeset_icon.png" height="250px" width="250px"></center></a><br>
				</div>
				<div class="three">
					<a class="categorynames" href="category/cables.php"><center><img src="css/images/cables_icon.png" height="250px" width="250px"></center></a><br>
				</div>
			</div>

			<br><center><a class="viewall" href="category/bikeparts.php">VIEW ALL >></a></center><br><br><hr>
			<br><br><center><a class="bike">BIKES</a></center>

			<div class="wrapper">
				<div class="one">
					<a class="categorynames" href="category/builtbikes.php"><center><img src="css/images/builtbikes_icon.png" height="250px" width="850px"></center></a><br>
				</div>
			</div>
			<br><center><a class="viewall">VIEW ALL >></a></center>
		</div>
	</div>
</body>
</html>