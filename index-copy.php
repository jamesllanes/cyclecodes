<?php
	session_start();
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/newhome.css">
	<title>Ace Hardware</title>
	<meta name="description" content="Write some words to describe your html page">
</head>
<body>
	<div class="blended_grid">
		<div id="fixed_top">
			<div id="TopNav"> <!--logo, signin, search, customer service, others-->
				<a href="newhome.php"><img src="ace2.png" width="14%"></a>
				<div id="Login_Container2">
					<div id="Login_Content">
						<form action ="login.php" method="POST">
							<input type="text" name="username" placeholder="username" class="username" required/>
							<input type="password" name="password" placeholder="password" class="password" required/>
							<button type="submit" class="login"/>Login</button>
						</form>
						<form action="register.php" method="POST">
							<input type="submit" value="Register" class="register"/>
						</form>
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
				    <a href="1Paints_and_Sundries/paints_and_sundries.php">Paints and Sundries</a>
				    <a href="2Tools/tools.php">Tools</a>
				    <a href="3Electrical/electrical.php">Electrical</a>
				    <a href="4Plumbing/plumbing.php">Plumbing</a>
				    <a href="5Home_Hardware/home_hardware.php">Home Hardware</a>
				    <a href="6Houseware/houseware.php">Houseware</a>
				    <a href="7Lawn/lawn.php">Lawn and Outdoor</a>
				    <a href="8Automotive/automotive.php">Automotive</a>
				    <a href="9Appliances/appliances.php">Small Appliances</a>
				    <a href="10Chemicals/chemicals.php">Chemicals and Batteries</a>
				    <a href="11Pets/pets.php">Pets</a>
				  </div>
				</div>
				<div class="tab">
				  <a href="sale_and_specials.php"><button class="tablinks">Sale & Specials</button></a>
				  <a href="#"><button class="tablinks">Wishlist</button></a>
				  <a href="careers.php"><button class="tablinks">Careers</button></a>
				  <a href="about_us.php"><button class="tablinks">About Us</button></a>
				</div>
				<div class="cart_tab">
					<p>Cart: 0 Items</p>
				</div>
			</div>
		</div>
		<div id="Middle"> <!--slideshow-->
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
		<div id="Center"> <!--category links-->
			<div class="wrapper">
				<div class="one">
					<a class="categorynames">Paints and Sundries</a><br>
					<a href="1Paints_and_Sundries/1paint.php" class="categorylinks">Paints</a><br>
					<a href="1Paints_and_Sundries/2brushes.php" class="categorylinks">Brushes & Rollers</a><br>
					<a href="1Paints_and_Sundries/3caulks.php" class="categorylinks">Caulks & Sealants</a><br>
					<a href="1Paints_and_Sundries/4adhesives.php" class="categorylinks">Adhesives & Tapes</a><br>
					<a href="1Paints_and_Sundries/5ladders.php" class="categorylinks">Ladders</a><br>
					<a href="1Paints_and_Sundries/paints_and_sundries.php" class="viewall">VIEW ALL ></a>
				</div>
				<div class="two">
					<a class="categorynames">Tools</a><br>
					<a href="2Tools/1power_tools.php" class="categorylinks">Power Tools</a><br>
					<a href="2Tools/2hand_tools.php" class="categorylinks">Hand Tools</a><br>
					<a href="2Tools/3measuring_tools.php" class="categorylinks">Measuring Tools</a><br>
					<a href="2Tools/4tool_organizers.php" class="categorylinks">Tool Organizers</a><br>
					<a href="2Tools/tools.php" class="viewall">VIEW ALL ></a>
				</div>
				<div class="three">
					<a class="categorynames">Electrical</a><br>
					<a href="3Electrical/bulbs.php" class="categorylinks">Bulbs & Flourecent Lights</a><br>
					<a href="3Electrical/lightning.php" class="categorylinks">Lightning Fixtures</a><br>
					<a href="3Electrical/flashlight.php" class="categorylinks">Flashlight & Batteries</a><br>
					<a href="3Electrical/rechargeables.php" class="categorylinks">Rechargeables</a><br>
					<a href="3Electrical/power_supply.php" class="categorylinks">Power Supply</a><br>
					<a href="3Electrical/extension_cords.php" class="categorylinks">Extension Cords, Wires & Cables</a><br>
					<a href="3Electrical/wiring_devices.php" class="categorylinks">Wiring Devices</a><br>
					<a href="3Electrical/audio.php" class="categorylinks">Audio, Video & Telephone</a><br>
					<a href="3Electrical/supplies.php" class="categorylinks">Supplies</a><br>
					<a href="3Electrical/electrical.php" class="viewall">VIEW ALL ></a>
				</div>
				<div class="four">
					<a class="categorynames">Plumbing</a><br>
					<a href="4Plumbing/air_purifier.php" class="categorylinks">Air Purifier</a><br>
					<a href="4Plumbing/faucets.php" class="categorylinks">Faucets</a><br>
					<a href="4Plumbing/fittings.php" class="categorylinks">Fittings</a><br>
					<a href="4Plumbing/showers.php" class="categorylinks">Showers & Bidets</a><br>
					<a href="4Plumbing/water_filtration.php" class="categorylinks">Water Filtration</a><br>
					<a href="4Plumbing/water_heaters.php" class="categorylinks">Water Heaters</a><br>
					<a href="4Plumbing/water_storage.php" class="categorylinks">Water Storage & Pumps</a><br>
					<a href="4Plumbing/water_closet.php" class="categorylinks">Water Closet & Accessories</a><br>
					<a href="4Plumbing/sink.php" class="categorylinks">Sink, Lavatory & Accessories</a><br>
					<a href="4Plumbing/plumbing.php" class="viewall">VIEW ALL ></a>
				</div>
				<div class="five">
					<a class="categorynames">Home Hardware</a><br>
			  		<a href="5Home_Hardware/building_materials.php" class="categorylinks">Building Materials & Supplies</a><br>
					<a href="5Home_Hardware/doors.php" class="categorylinks">Door & Cabinet Hardware</a><br>
					<a href="5Home_Hardware/home_safety.php" class="categorylinks">Home Safety & Security</a><br>
					<a href="5Home_Hardware/industrial.php" class="categorylinks">Industrial & Exhaust Fans</a><br>
					<a href="5Home_Hardware/lockets.php" class="categorylinks">Locksets & Padlocks</a><br>
					<a href="5Home_Hardware/utility_racks.php" class="categorylinks">Utility Racks & Carts</a><br>
					<a href="5Home_Hardware/wall_mounts.php" class="categorylinks">Wall Mounts & Shelvings</a><br>
					<a href="5Home_Hardware/home_hardware.php" class="viewall">VIEW ALL ></a>
				</div>
				<div class="six">
					<a class="categorynames">Houseware</a><br>
					<a href="6Houseware/bathroom.php" class="categorylinks">Bathroom Accessories</a><br>
					<a href="6Houseware/cleaning.php" class="categorylinks">Cleaning Implements</a><br>
					<a href="6Houseware/dish_drainers.php" class="categorylinks">Dish Drainers & Kitchen</a><br>
					<a href="6Houseware/accessories.php" class="categorylinks">Accessories</a><br>
					<a href="6Houseware/drawers.php" class="categorylinks">Drawers & Closets</a><br>
					<a href="6Houseware/laundry_implements.php" class="categorylinks">Laundry Implements</a><br>
					<a href="6Houseware/mats.php" class="categorylinks">Mats & Carpets</a><br>
					<a href="6Houseware/pails.php" class="categorylinks">Pails & Buckets</a><br>
					<a href="6Houseware/stackables.php" class="categorylinks">Stackables & Storage Accessories</a><br>
					<a href="6Houseware/trash_bins.php" class="categorylinks">Trash Bins</a><br>
					<a href="6Houseware/houseware.php" class="viewall">VIEW ALL ></a>
				</div>
				<div class="seven">
					<a class="categorynames">Lawn and Outdoor</a><br>
					<a href="7Lawn/coolers.php" class="categorylinks">Coolers & Jugs</a><br>
					<a href="7Lawn/gardening.php" class="categorylinks">Gardening Tools</a><br>
					<a href="7Lawn/grills.php" class="categorylinks">Grills & Outdoor Cooking</a><br>
					<a href="7Lawn/hoses.php" class="categorylinks">Hoses,Sprayers & Sprinklers</a><br>
					<a href="7Lawn/mowers.php" class="categorylinks">Mowers & Trimmers</a><br>
					<a href="7Lawn/outdoor_furniture.php" class="categorylinks">Outdoor Furniture</a><br>
					<a href="7Lawn/seeds.php" class="categorylinks">Seeds, Soil & Fertilizers</a><br>
					<a href="7Lawn/tents.php" class="categorylinks">Tents & Camping</a><br>
					<a href="7Lawn/lawn.php" class="viewall">VIEW ALL ></a>
				</div>
				<div class="eight">
					<a class="categorynames">Automotive</a><br>
					<a href="8Automotive/accessories.php" class="categorylinks">Accessories</a><br>
					<a href="8Automotive/car_audio.php" class="categorylinks">Car Audio</a><br>
					<a href="8Automotive/cleaning_supplies.php" class="categorylinks">Cleaning Supplies</a><br>
					<a href="8Automotive/lightning.php" class="categorylinks">Lightning</a><br>
					<a href="8Automotive/maintenance.php" class="categorylinks">Maintenance</a><br>
					<a href="8Automotive/tools.php" class="categorylinks">Tools</a><br>
					<a href="8Automotive/automotive.php" class="viewall">VIEW ALL ></a>
				</div>
				<div class="nine">
					<a class="categorynames">Small Appliances</a><br>
					<a href="9Small_Appliances/air_coolers.php" class="categorylinks">Air Coolers</a><br>
					<a href="9Small_Appliances/aircon.php" class="categorylinks">Aircon</a><br>
					<a href="9Small_Appliances/beds.php" class="categorylinks">Beds & Furniture</a><br>
					<a href="9Small_Appliances/fans.php" class="categorylinks">Fans</a><br>
					<a href="9Small_Appliances/small_appliances.php" class="viewall">VIEW ALL ></a>
				</div>
				<div class="ten">
			        <a class="categorynames">Chemicals and Batteries</a><br>
					<a href="10Chemicals/batteries.php" class="categorylinks">Batteries</a><br>
					<a href="10Chemicals/household.php" class="categorylinks">Household Chemicals</a><br>
					<a href="10Chemicals/insect.php" class="categorylinks">Insect & Pest Control</a><br>
					<a href="10Chemicals/chemicals.php" class="viewall">VIEW ALL ></a>
				</div>
				<div class="eleven">
					<a class="categorynames">Pets</a><br>
					<a href="11Pet/pet_accessories.php" class="categorylinks">Pet Accessories</a><br>
					<a href="11Pet/pet_care.php" class="categorylinks">Pet Care & Grooming</a><br>
					<a href="11Pet/pet_food.php" class="categorylinks">Pet Food</a><br>
					<a href="11Pet/pet.php" class="viewall">VIEW ALL ></a>
				</div>
			</div>
		</div>
		<div id="Footer"> <!--about us, contact us, privacy policy, disclaimer-->
			Footer
		</div>
	</div>
</body>
</html>