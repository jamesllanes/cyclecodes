<?php
	session_start();
	require 'dbconfig/config.php';

	$Cart_ID=$_REQUEST['Cart_ID'];
	$customer_ID=$_REQUEST['customer_ID'];
	if($_REQUEST['c']!=1)
	{
		$query_customer="DELETE FROM cart WHERE customer_ID = '$customer_ID'";
		$result_delete=mysqli_query($connect,$query_customer);
		if($result)
		{
			?><meta  http-equiv="refresh" content=".000001;url=cart.php?customer_ID=<?php echo $customer_ID?>&c=0"/><?php
		}
	}
	else
	{
		$_REQUEST['c'];
		$query="DELETE FROM cart WHERE Cart_ID = '$Cart_ID'";
		$result=mysqli_query($connect,$query);
		if($result)
		{
			?><meta  http-equiv="refresh" content=".000001;url=cart.php?customer_ID=<?php echo $customer_ID?>&c=0"/><?php
		}
	}
	
?>