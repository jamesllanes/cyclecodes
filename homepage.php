<!DOCTYPE html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/homepage.css">
	<title>Ace Hardware</title>
	<meta name="description" content="Write some words to describe your html page">
</head>
<body>
	<div class="blended_grid">
		<div class="topBanner">
			<table width=100%>
			<tr>
				<td rowspan="2"><a href="homepage.php"><img src="ace_logo.jpg" height="110" width="200"></td>	
			<form action="#" method="get">
				<td>
					PRODUCT SEARCH
				</td>
			</tr>
			<tr>
				<td>
					<div class="searchdiv">
					<input type="text" name="search" placeholder="What are you looking for?" width="20" height="50"></div>
					<div class="selectdiv">
					<label>
						<select>
						<option selected> Categories </option>
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
					<td>
						<input type="image" src="searchlogo.jpg" alt="Submit" width="30" height="30" style="border: 2px solid #dadada;">
					</td>
				</td>
			</form>
			</tr>
			<tr>
				<td colspan=2>
					<div class="dropdown">
					  <button class="dropbtn">Products</button>
					  <div class="dropdown-content">
						<a href="#">Link 1</a>
						<a href="#">Link 2</a>
						<a href="#">Link 3</a>
					  </div>
					</div>
					<div class="dropdown">
					  <button class="dropbtn">Brands</button>
					  <div class="dropdown-content">
						<a href="#">Link 1</a>
						<a href="#">Link 2</a>
						<a href="#">Link 3</a>
					  </div>
					</div>
					<div class="dropdown">
					<button class="dropbtn">
							<li class="menulink"><a href="#">Sale & Specials</a></li>
					</button>
					</div>
					<div class="dropdown">
					  <button class="dropbtn"><a href="#" style="text-decoration: none; color: black">Events</a></button>
					  </div>
					</div>
					<div class="dropdown">
					  <button class="dropbtn">Store Locator</button>
					  <div class="dropdown-content">
						<a href="#">Link 1</a>
						<a href="#">Link 2</a>
						<a href="#">Link 3</a>
					  </div>
					</div>
					<div class="dropdown">
					  <button class="dropbtn">Careers</button>
					  <div class="dropdown-content">
						<a href="#">Link 1</a>
						<a href="#">Link 2</a>
						<a href="#">Link 3</a>
					  </div>
					</div>
					<div class="dropdown">
					  <button class="dropbtn">About Us</button>
					  <div class="dropdown-content">
						<a href="#">Link 1</a>
						<a href="#">Link 2</a>
						<a href="#">Link 3</a>
					  </div>
					</div>
				</td>
			</tr>
			</table>
		</div>
		<div class="middleBanner">
		<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div><a href="#">
  <img src="hammer.jpg" style="width:100%">
  <div class="text">Construction</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div><a href="#">
  <img src="oven.jpg" style="width:100%">
  <div class="text">Home Appliances</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div><a href="#">
  <img src="tools.jpg" style="width:100%">
  <div class="text">Car Tools And Accessories</div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
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
		<div class="leftBanner">
		</div>
		<div class="rightBanner">
		</div>
		<div class="centerBanner">
		</div>
		<div class="bottomBanner">
		</div>
	</div>
</body>
</html>