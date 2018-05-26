<!DOCTYPE html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/homepage2.css">
	<title>Ace Hardware</title>
	<meta name="description" content="Write some words to describe your html page">
</head>
<body>
	<div class="blended_grid">
		<div class="topBanner">
			<table width=100% cellspacing="0">
			<tr>
				<td rowspan="5"><a href="homepage.php"><img src="ace_logo.jpg" height="110" width="200"></a></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td>
					<div class="product"><b>PRODUCT SEARCH</b></div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="searchbox">
						<form action="#" method="get">
						<div class="searchdiv">
							<input type="text" name="search" placeholder="What are you looking for?" width="20" height="50">
						</div>
					</div>
					<div class="categories">
						<div class="selectdiv">
						<label>
							<select>
							<option selected> Categories&nbsp;&nbsp;<img src="arrow down.png" height="12" width="12"></option>
								<option>Paints and Sundries</option>
								<option>Tools</option>
								<option>Electrical</option>
								<option>Plumbing</option>
								<option>Home Hardware</option>
								<option>Houseware</option>
								<option>Lawn and Outdoor</option>
								<option>Automotive</option>
								<option>Small Appliances</option>
								<option>Chemicals and Batteries</option>
								<option>Pets</option>
							</select>
						</label>
						</div>
					</div>
					<div class="brands">
						<div class="selectdiv">
						<label>
							<select>
							<option selected> Brands </option>
								<option>Paints and Sundries</option>
								<option>Tools</option>
								<option>Electrical</option>
								<option>Plumbing</option>
								<option>Home Hardware</option>
								<option>Houseware</option>
								<option>Lawn and Outdoor</option>
								<option>Automotive</option>
								<option>Small Appliances</option>
								<option>Chemicals and Batteries</option>
								<option>Pets</option>
							</select>
						</label>
						</div>
					</div>
					<td>
						<img src="searchlogo.jpg" width="32" height="32" style="border:2px solid #dadada;">
					</td>
				</td>
			</form>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td></td></tr>
			<tr>
				<td colspan=4 align=center>
					<nav>
							<div class="arrowdiv">
								<a class="linkmenu-1" href="#">Products</a>
							</div>
							</div>
							<div class="arrowdiv">
								<a class="linkmenu-2" href="#">Brands</a>
							</div>
							<a class="linkmenu-3" href="sale_and_specials.php">Sale & Specials</a>
							<a class="linkmenu-4" href="#">Store Locator</a>
							<a class="linkmenu-5" href="#">Careers</a>
							<a class="linkmenu-6" href="#">About Us</a>
					</nav>
				</td>
			</tr>
			</table>
		</div>
		<div class="middleBanner">
			<div class="slideshow-container">
			<div class="mySlides fade">
			  <!--<div class="numbertext">1 / 3</div><a href="#">-->
			  <img src="slideshow1.png">
			  <!--<div class="text">Construction</div>-->
			</div>

			<div class="mySlides fade">
			  <!--<div class="numbertext">2 / 3</div><a href="#">-->
			  <img src="slideshow2.png">
			  <!--<div class="text">Home Appliances</div>-->
			</div>

			<div class="mySlides fade">
			  <!--<div class="numbertext">3 / 3</div><a href="#">-->
			  <img src="slideshow3.png">
			  <!--<div class="text">Car Tools And Accessories</div>-->
			</div>

			</div>
			<br>

			<div class="dot-div">
			  <span class="dot" style="position:relative;left:460px;top:270px;"></span> 
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
		<div class="centerBanner">
			<div class="wrapper">
				<div class="one">
					<a class="categorynames">Paints and Sundries</a><br>
					<a href="#" class="categorylinks">Paints</a><br>
					<a href="#" class="categorylinks">Brushes & Rollers</a><br>
					<a href="#" class="categorylinks">Caulks & Sealants</a><br>
					<a href="#" class="categorylinks">Adhesives & Tapes</a><br>
					<a href="#" class="categorylinks">Ladders</a><br>
					<a href="#" class="viewall">VIEW ALL ></a>
				</div>
				<div class="two">
					<a class="categorynames">Tools</a><br>
					<a href="#" class="categorylinks">Power Tools</a><br>
					<a href="#" class="categorylinks">Hand Tools</a><br>
					<a href="#" class="categorylinks">Measuring Tools</a><br>
					<a href="#" class="categorylinks">Tool Organizers</a><br>
					<a href="#" class="viewall">VIEW ALL ></a>
				</div>
				<div class="three">
					ADVERTISEMENT
				</div>
				<div class="four">
					<a class="categorynames">Electrical</a><br>
					<a href="#" class="categorylinks">Bulbs & Flourecent Lights</a><br>
					<a href="#" class="categorylinks">Lightning Fixtures</a><br>
					<a href="#" class="categorylinks">Flashlight & Batteries</a><br>
					<a href="#" class="categorylinks">Rechargeables</a><br>
					<a href="#" class="categorylinks">Power Supply</a><br>
					<a href="#" class="categorylinks">Extension Cords, Wires & Cables</a><br>
					<a href="#" class="categorylinks">Wiring Devices</a><br>
					<a href="#" class="categorylinks">Audio, Video & Telephone</a><br>
					<a href="#" class="categorylinks">Supplies</a><br>
					<a href="#" class="viewall">VIEW ALL ></a>
				</div>
				<div class="five">
					<a class="categorynames">Plumbing</a><br>
					<a href="#" class="categorylinks">Air Purifier</a><br>
					<a href="#" class="categorylinks">Faucets</a><br>
					<a href="#" class="categorylinks">Fittings</a><br>
					<a href="#" class="categorylinks">Showers & Bidets</a><br>
					<a href="#" class="categorylinks">Water Filtration</a><br>
					<a href="#" class="categorylinks">Water Heaters</a><br>
					<a href="#" class="categorylinks">Water Storage & Pumps</a><br>
					<a href="#" class="categorylinks">Water Closet & Accessories</a><br>
					<a href="#" class="categorylinks">Sink, Lavatory & Accessories</a><br>
					<a href="#" class="viewall">VIEW ALL ></a>
				</div>
				<div class="six">
					<a class="categorynames">Home Hardware</a><br>
			  		<a href="#" class="categorylinks">Building Materials & Supplies</a><br>
					<a href="#" class="categorylinks">Door & Cabinet Hardware</a><br>
					<a href="#" class="categorylinks">Home Safety & Security</a><br>
					<a href="#" class="categorylinks">Industrial & Exhaust Fans</a><br>
					<a href="#" class="categorylinks">Locksets & Padlocks</a><br>
					<a href="#" class="categorylinks">Utility Racks & Carts</a><br>
					<a href="#" class="categorylinks">Wall Mounts & Shelvings</a><br>
					<a href="#" class="viewall">VIEW ALL ></a>
				</div>
				<div class="seven">
					<a class="categorynames">Houseware</a><br>
					<a href="#" class="categorylinks">Bathroom Accessories</a><br>
					<a href="#" class="categorylinks">Cleaning Implements</a><br>
					<a href="#" class="categorylinks">Dish Drainers & Kitchen</a><br>
					<a href="#" class="categorylinks">Accessories</a><br>
					<a href="#" class="categorylinks">Drawers & Closets</a><br>
					<a href="#" class="categorylinks">Laundry Implements</a><br>
					<a href="#" class="categorylinks">Mats & Carpets</a><br>
					<a href="#" class="categorylinks">Pails & Buckets</a><br>
					<a href="#" class="categorylinks">Stackables & Storage Accessories</a><br>
					<a href="#" class="categorylinks">Trash Bins</a><br>
					<a href="#" class="viewall">VIEW ALL ></a>
				</div>
				<div class="eight">
					<a class="categorynames">Lawn and Outdoor</a><br>
					<a href="#" class="categorylinks">Coolers & Jugs</a><br>
					<a href="#" class="categorylinks">Gardening Tools</a><br>
					<a href="#" class="categorylinks">Grills & Outdoor Cooking</a><br>
					<a href="#" class="categorylinks">Hoses,Sprayers & Sprinklers</a><br>
					<a href="#" class="categorylinks">Mowers & Trimmers</a><br>
					<a href="#" class="categorylinks">Outdoor Furniture</a><br>
					<a href="#" class="categorylinks">Seeds, Soil & Fertilizers</a><br>
					<a href="#" class="categorylinks">Tents & Camping</a><br>
					<a href="#" class="viewall">VIEW ALL ></a>
				</div>
				<div class="nine">
					<a class="categorynames">Automotive</a><br>
					<a href="#" class="categorylinks">Accessories</a><br>
					<a href="#" class="categorylinks">Car Audio</a><br>
					<a href="#" class="categorylinks">Cleaning Supplies</a><br>
					<a href="#" class="categorylinks">Lightning</a><br>
					<a href="#" class="categorylinks">Maintenance</a><br>
					<a href="#" class="categorylinks">Tools</a><br>
					<a href="#" class="viewall">VIEW ALL ></a>
				</div>
				<div class="ten">
					<a class="categorynames">Small Appliances</a><br>
					<a href="#" class="categorylinks">Air Coolers</a><br>
					<a href="#" class="categorylinks">Aircon</a><br>
					<a href="#" class="categorylinks">Beds & Furniture</a><br>
					<a href="#" class="categorylinks">Fans</a><br>
					<a href="#" class="viewall">VIEW ALL ></a>
				</div>
				<div class="eleven">
			        <a class="categorynames">Chemicals and Batteries</a><br>
					<a href="#" class="categorylinks">Batteries</a><br>
					<a href="#" class="categorylinks">Household Chemicals</a><br>
					<a href="#" class="categorylinks">Insect & Pest Control</a><br>
					<a href="#" class="viewall">VIEW ALL ></a>
				</div>
				<div class="twelve">
					<a class="categorynames">Pets</a><br>
					<a href="#" class="categorylinks">Pet Accessories</a><br>
					<a href="#" class="categorylinks">Pet Care & Grooming</a><br>
					<a href="#" class="categorylinks">Pet Food</a><br>
					<a href="#" class="viewall">VIEW ALL ></a>
				</div>
			</div>
			
			<div class="bottomBanner">
				<img src="ace_hardware_logos.png"><br><br>
				<b>Products Brands Sale & Specials Events Branches About Us Contact Us Careers Privacy Policy Disclaimer</b>
			</div>
		</div>
		<!--<div class="leftBanner">
		</div>
		<div class="rightBanner">
		</div>-->
	</div>
</body>
</html>