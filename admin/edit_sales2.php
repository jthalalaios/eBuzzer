<?php
require_once ('../includes/require.php');
session_start();
$total_price=0;
$conn=db_open();
if (isset($_SESSION['who'])) 
	{
		$id_u=$_SESSION['who'];
	}	
if(isset($_POST["id-order"]))
{
	$id_order=filter_var($_POST["id-order"]);
	
		try 
		{
			$sql=" select * from orders where order_id=:order_id" ;
			$result = $conn->prepare($sql);
			$result->execute(array(':order_id' => $id_order));
		}
	catch(PDOException $e)
		{	
			echo $e->getMessage();
		}
	foreach ($result->fetchAll() as $row1) 
	{
			$id_order=$row1['order_id'];
			$id_user=$row1['id_user'];
			$id_prod=$row1['id_prod'];
			$posothta =$row1['posothta'];
			$s_date=$row1['s_date'];
			$details =$row1['details'];
			$total=$row1['total']; 
	try 
		{
			$sql1=" INSERT INTO history(idh_user,idh_prod,posothta,details,total,s_date,order_id) VALUES (:idh_user,:idh_prod,:posothta,:details,:total,:s_date,:order_id)" ;
			$result1 = $conn->prepare($sql1);
			$result1->execute(array(':idh_user' => $id_u,':idh_prod' => $id_prod,':posothta' => $posothta,':details' => $details,':total' => $total,':s_date' => $s_date,':order_id' => $id_order));		
		}
	catch(PDOException $e)
		{
			$_SESSION['naddsales'] = 1;
			echo $e->getMessage();
		}
	}
	try 
	{
		$sql2=" DELETE FROM orders WHERE (id_user=:id_user  AND order_id=:order_id)" ;
		$result2 = $conn->prepare($sql2);
		$result2->execute(array(':id_user' => $id_u,':order_id' => $id_order));
	}
	catch(PDOException $e)
	{	
		echo $e->getMessage();
	}
	$_SESSION['yaddsales'] = 1;
header( "refresh:0; url=../admin/history.php" );	
}