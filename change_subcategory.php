<?php
$select_sales="SELECT * FROM inventory";
$result_sales=mysqli_query($connect,$select_sales);
if(mysqli_num_rows($result_sales)>0)
{
	while($row=mysqli_fetch_array($result_sales))
	{
		$Prod_ID2=$row['Prod_ID'];
		if($Prod_ID1==$Prod_ID2)
		{
			$Quantity=$row['Quantity']+$Quantity_update;
			$update_qty="UPDATE sales SET Quantity ='$Quantity'";
			$result_qty=mysqli_query($connect,$update_qty);

			$Additional=$row['Total']+$Subtotal;
			$update_total="UPDATE sales SET Total ='$Additional'";
			$result_total=mysqli_query($connect,$update_total);

			//echo "update";
		}
	}
}
?>