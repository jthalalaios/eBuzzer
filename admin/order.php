<?php
require_once ('../includes/functions.php');
require_once ('../includes/require.php');
session_start();
$total_price=0;
$conn=db_open();
if(isset($_SESSION["shopping_cart"]))
{
	if (isset($_SESSION['who'])) 
	{
		$id_u=$_SESSION['who'];
	}
	foreach($_SESSION["shopping_cart"] as $keys => $values)
			{
				$total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
				$date=date('Y-m-d H:i:s');;
			}
			try 
				{
					$sql1=" INSERT INTO orders(id_user,id_prod,posothta,details,total,s_date) VALUES (:id_user,:id_prod,:posothta,:details,:total,:s_date)" ;
					$result = $conn->prepare($sql1);
				}
			catch(PDOException $e)
				{	
					echo $e->getMessage();
				}				
					foreach ($_SESSION["shopping_cart"] as $item) 
					{
						$result->execute(array(':id_user' => $id_u,':id_prod' => $item['product_id'],':posothta' => $item['product_quantity'],':details' => $item['product_checkvalue'],':total' => $total_price,':s_date' => $date));
						$last_id=$conn->lastInsertId(); 
					}
					try 
					{
						$sql2=" update orders set order_id =:order_id WHERE  s_date=:s_date ";
						$query2=$conn->prepare($sql2);
					}
					catch(PDOException $e)
					{
						$_SESSION['norder'] = 1;
						echo $e->getMessage();
					}
					foreach ($_SESSION["shopping_cart"] as $item) 
					{
						$query2->execute(array(':s_date' => $date,'order_id' => $last_id));
						
					}
$_SESSION['yorder'] = 1;
$conn=null;
header( "refresh:0; url=sales.php" );						
}
else 
{	
	$_SESSION['norder'] = 2;
	header( "refresh:0; url=test.php" );	
}	
?>