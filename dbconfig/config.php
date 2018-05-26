<?php
	/*$connect=mysqli_connect("localhost","root","") or die("Unable to connect");*/
	
	$connect=mysqli_init(); //mysqli_ssl_set($connect, NULL, NULL, {ca-cert filename}, NULL, NULL); 
	mysqli_real_connect($connect, "cyclecodes.mysql.database.azure.com", "unknownmind@ictc-obar", "#P@ssw0rd", "cyclecodes", "3306");

	mysqli_select_db($connect,"cyclecodes");
	if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
	}
?>
