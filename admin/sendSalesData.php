<?php
require_once ('../includes/require.php');
require_once ('../includes/functions.php');
session_start();
$total_price=0;
$conn=db_open();

if(isset($_POST['order_id']) && ($_POST['esp_id']) && ($_POST['user_id']))
{
	$id_u=filter_var($_POST['user_id']);
	$id_order=filter_var($_POST['order_id']);
	$id_esp=filter_var($_POST['esp_id']);
	try 
		{
			$sql1=" INSERT INTO history(history_oder_id) VALUES (:history_oder_id)" ;
			$result1 = $conn->prepare($sql1);
			$result1->execute(array(':history_oder_id' => $id_order));
		}
	catch(PDOException $e)
		{
			$_SESSION['naddsales'] = 1;	
			echo $e->getMessage();
		}
	try 
	{
		$status=1;
		$sql2=" UPDATE orders SET status=:status WHERE (id_user=:id_user  AND order_id=:order_id)" ;
		$result2 = $conn->prepare($sql2);
		$result2->execute(array(':id_user' => $id_u,':order_id' => $id_order,':status' => $status));
	}
	catch(PDOException $e)
	{	
		echo $e->getMessage();
	}
	try 
	{
		$sql3="UPDATE esp SET status=:status,order_id_esp=:order_id_esp WHERE id_esp=:id_esp " ; 
		$result3 = $conn->prepare($sql3);
		$result3->execute(array(':order_id_esp'=>$id_order,':status' => $status,':id_esp' => $id_esp));
		$_SESSION['esp_order'] = $id_order;
	}
	catch(PDOException $e)
	{	
		echo $e->getMessage();
	}
	$_SESSION['yaddsales'] = 1;	
}
returntostart( "../admin/history.php" );

