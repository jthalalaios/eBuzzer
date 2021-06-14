<?php
session_start();
require_once('../require.php');
$con=db_open();

	if(!empty($_GET["product"])) 
    {     
		  $a1=filter_var($_GET["product"]);

	try {
			$sql=" DELETE  FROM product WHERE  product_id= :product_id ";
			$query=$con->prepare($sql);
			$query->execute(array(':product_id' => $a1));
			$_SESSION['ydelp'] = 1;
		}
	    catch(PDOException $e)
        {	
        echo $sql . "<br>" . $e->getMessage();
		die();
		$_SESSION['ydelp'] = 0;
        }
	}
header("location:../../admin/product.php");
$con=null;
?>