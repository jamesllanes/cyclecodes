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

	<style type="text/css">
#cover{
position:fixed;
top:0;
left:0;
background:rgba(0,0,0,0.6);
z-index:10;
width:100%;
height:100%;
display:none;
}
#loginScreen
{
    height:380px;
    width:340px;
    margin:0 auto;
    position:absolute;
    left: 100px;
    z-index:25;
    display:none;
	background: white;
	border:5px solid #cccccc;
	border-radius:10px;
}
#loginScreen:target, #loginScreen:target + #cover{
    display:block;
    opacity:2;
}
.cancel
{
    display:block;
    position:absolute;
    top:3px;
    right:2px;
    background:rgb(245,245,245);
    color:black;
    height:30px;
    width:35px;
    font-size:30px;
    text-decoration:none;
    text-align:center;
    font-weight:bold;
}
	</style>
</head>
<body>
	<div class="blended_grid">
		<div id="fixed_top">
			<div id="TopNav"> <!--logo, signin, search, customer service, others-->
				<a href="newhome.php"><img src="cycle_codes.png" width="14%"></a>
				<div id="Login_Container2">
					<div id="Login_Content">
						<form action ="login.php" method="POST">
							<input type="text" name="username" placeholder="username" class="username" required/>
							<input type="password" name="password" placeholder="password" class="password" required/>
							<button type="submit" class="login"/>Login</button>
						</form>
						<form action="index.php" method="POST">
							<!--<input type="submit" value="Register" class="register"/>-->
							<button class="register"><a href="#loginScreen">Register</a></button>
							<div id="loginScreen">
								<br><b>Registration Form</b>
							    <a href="" class="cancel">&times;</a>
							    <table align="center">
                                        <th colspan="2">Customer Information</th><hr>
                                        <tr>
                                            <td><label>Fullname:</label></td>
                                            <td><input type="text" name="fullname" placeholder="Fullname" required/></td>
                                        </tr>
                                        <tr>
                                            <td><label>Gender:</label></td>
                                            <td>
                                                <input type="radio" name="gender" value="male" checked required/>Male
                                                <input type="radio" name="gender" value="female" required/>Female
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label>Email:</label></td>
                                            <td><input type="email" name="email" placeholder="Email" required/></td>
                                        </tr>
                                        <tr>
                                            <td><label>Phone Number:</label></td>
                                            <td><input type="text" name="phone_number" placeholder="Phone Number" required/></td>
                                        </tr>
                                        <tr>
                                            <td><label>Address:</label></td>
                                            <td><input type="text" name="address" placeholder="Address" required/></td>
                                        </tr>
                                        <tr>
                                            <td><label>Username:</label></td>
                                            <td><input type="text" name="username" placeholder="Username" required/></td>
                                        </tr>
                                        <tr>
                                            <td><label>Password:</label></td>
                                            <td><input type="password" name="password" placeholder="Password" required/></td>
                                        </tr>
                                        <tr>
                                            <td><label>Confirm Password:</label></td>
                                            <td><input type="password" name="cpassword" placeholder="Confirm Password" required/></td>
                                        </tr><br>
                                        <tr>
                                            <td><button type="submit" name="register" onclick="location='index.php'">Register</button></td>
                                            <td><button type="submit" name="cancel" onclick="location='newhome.php'">Cancel</button></td>
                                        </tr>
                                    </table>
							</div>
							<div id="cover" >
							</div>
							<?php
							if(isset($_POST['register']))
								{
									$fullname=$_POST['fullname'];
									$gender=$_POST['gender'];					
									$email=$_POST['email'];	
									$phone_number=$_POST['phone_number'];	
									$address=$_POST['address'];									
									$username=$_POST['username'];											
									$password=$_POST['password'];											
									$usertype='customer';											

									$check_query="SELECT * FROM userinfotable_customer WHERE customer_username='$username' AND customer_password='$password'";
									$check_result=mysqli_query($connect,$check_query);

									if(mysqli_num_rows($check_result)>0)
									{
										//there is already an existing same username
										echo '<script type="text/javascript"> alert("User already exists...try another username") </script>';
										?><meta http-equiv="refresh" content=".000001;url=index.php"/><?php
									}
									else
									{
										$insert_query="INSERT INTO userinfotable_customer VALUES ('','$fullname','$gender','$email','$phone_number','$address',$username','$password','$usertype')";
										$result_query=mysqli_query($connect,$insert_query);

										if($result_query)
										{
											echo '<script type="text/javascript"> alert("User has been successfully registered!") </script>';
											?><meta http-equiv="refresh" content=".000001;url=newhome.php"/><?php
										}
										else
										{
											echo '<script type="text/javascript"> alert("ERROR!") </script>';
										}   
									}
								}
								else
								{
									" ";
								}
							?>
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