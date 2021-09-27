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
		try 
		{
			$sql1=" SELECT order_id FROM orders";
			$query1 = $conn->prepare($sql1);
			$query1->bindParam(':order_id',$order_id);
			$query1->execute(array(':order_id'=>$order_id));
			$result1=$query1->fetchAll();
		}
		catch(PDOException $e)
		{	
			echo $e->getMessage();
		}
		if (!$query1->fetchAll())
		{	
			$count_order_id=$query1->rowCount();
			$count_order_id=$count_order_id+1;
		}
		else 
		{
			$count_order_id=1;
		}
	foreach($_SESSION["shopping_cart"] as $keys => $values)
			{
				$total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
				$date=date('Y-m-d H:i:s');;
			}
			try 
				{
					$sql2=" INSERT INTO purchase(id_prod,posothta,details) VALUES (:id_prod,:posothta,:details)" ;
					$result2 = $conn->prepare($sql2);
				}
			catch(PDOException $e)
				{	
					echo $e->getMessage();
				}				
					foreach ($_SESSION["shopping_cart"] as $item) 
					{
						$session_array_countrows=count($_SESSION["shopping_cart"]);
						$result2->execute(array(':id_prod' => $item['product_id'],':posothta' => $item['product_quantity'],':details' => $item['product_checkvalue']));
						$last_id=$conn->lastInsertId(); 
					}
					
					try 
					{
						$sql3="select id_pur from purchase where id_pur=:id_pur ";
						$query3=$conn->prepare($sql3);
						$result3=$query3->execute(array(':id_pur'=>$last_id));
						$result3=$query3->fetchAll();
					}
					catch(PDOException $e)
					{
						$_SESSION['norder'] = 1;
						echo $e->getMessage();
					}
					
					try 
					{
						$sql4="INSERT INTO orders (order_id,id_user,s_date,total) VALUES (:order_id,:id_user,:s_date,:total) ";
						$query4=$conn->prepare($sql4);
						$result4=$query4->execute(array(':order_id'=>$count_order_id,':id_user'=>$id_u,':s_date'=>$date,':total'=>$total_price));
						$result4=$query4->fetchAll();
					}
					catch(PDOException $e)
					{
						$_SESSION['norder'] = 1;
						echo $e->getMessage();
					}
					foreach ($result3 as $row3)
					{
						for ($i=0; $i<=$session_array_countrows; $i++)
						{
							try
							{	
								if (empty($id))
								{
									$id=$last_id;
								}
								$sql3=" update purchase set id_order=:id_order  WHERE  id_pur=:id_pur ";
								$query3=$conn->prepare($sql3);
								$result3=$query3->execute(array(':id_pur'=>$id,':id_order'=>$count_order_id,));
								$id=$last_id-$i;
							}
							catch(PDOException $e)
							{
								echo $e->getMessage();
							}
						}
					}
					$_SESSION['yorder'] = 1;
$conn=null;
returntostart("history.php" );						
}
else 
{	
	$_SESSION['norder'] = 2;
	returntostart( "selectCategory.php" );	
}	
?>