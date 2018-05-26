<?php
	session_start();
	require('dbconfig/config.php');
?>
<html>
<body>
<center><h1>MY CART</h1></center>
<?php

	$Prod_ID=$_REQUEST['Prod_ID'];
	$_SESSION['Prod_ID']=$Prod_ID;

	$Quantity=$_REQUEST['Quantity'];
	$_SESSION['Quantity']=$Quantity;

	echo "$_SESSION[Prod_ID]<br>";
	echo "$_SESSION[Price]<br>";
	echo "$_SESSION[Quantity]<br>";

	$select_inv="SELECT * FROM inventory WHERE Prod_ID='$_SESSION[Prod_ID]'";
	$result_inv=mysqli_query($connect,$select_inv);

	if(mysqli_num_rows($result_inv)>0)
	{
		while($row=mysqli_fetch_array($result_inv))
		{
			if($row['Prod_ID']==$_SESSION["Prod_ID"])
			{
				$Prod_ID=$row['Prod_ID'];
				$Prod_Name=$row['Prod_Name'];
				$Price=$row['Price'];
			}
		}
	}
	else
	{
		echo "Product not found.";
	}

	$result1="SELECT * FROM cart WHERE Prod_ID='$_SESSION[Prod_ID]'";
	$result2=mysqli_query($connect,$result1);
	if(mysqli_num_rows($result2)>0)
	{
		while($row=mysqli_fetch_array($result2))
		{
			if($row['Prod_ID']==$_SESSION["Prod_ID"])
			{
				$sql2="UPDATE cart SET Quantity ='".$Quantity."'";
				$query3=mysqli_query($connect,$sql2);

				echo "update";
			}
			else
				echo "failed";
		}

	}
	else
	{
		$query1="INSERT INTO cart (Prod_ID, Prod_Name, Quantity, Price) VALUES ('$_SESSION[Prod_ID]', '$Prod_Name', '$_SESSION[Quantity]','$Price')";
		$query=mysqli_query($connect,$query1);

		if($query)
		{
			echo "successfuly inserted";
		
		}
		else
		{
			echo "failed to insert";
			die(mysql_error());
		}
	}
?>
</table>
</body>
</html>