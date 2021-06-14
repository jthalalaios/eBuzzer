<?php
session_start();
require_once('../require.php');
$con=db_open();

	if(!empty($_POST["id2"])) 
    {     
		  $a1=filter_var($_POST["id2"]);

	try {
			$sql=" DELETE  FROM categories WHERE  cat_id= :cat_id ";
			$query=$con->prepare($sql);
			$query->execute(array(':cat_id' => $a1));
			$_SESSION['ydelc'] = 1;
		}
	    catch(PDOException $e)
        {	
        echo $sql . "<br>" . $e->getMessage();
		$_SESSION['ydelc'] = 0;
		die();
        }
	}
header("location:../../admin/category.php");
$con=null;
?>