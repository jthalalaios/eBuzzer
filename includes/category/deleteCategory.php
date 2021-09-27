<?php
session_start();
require_once('../require.php');
require_once('../functions.php');
$con=db_open();
	if(!empty($_POST["id2"])) 
    {     
		  $id_cat=filter_var($_POST["id2"]);

	try {
			$sql=" DELETE  FROM categories WHERE  cat_id= :cat_id ";
			$query=$con->prepare($sql);
			$query->execute(array(':cat_id' => $id_cat));
			$_SESSION['ydelc'] = 1;
		}
	    catch(PDOException $e)
        {	
        echo $sql . "<br>" . $e->getMessage();
		$_SESSION['ydelc'] = 0;
		die();
        }
	}
$con=null;
returntostart("../../admin/category.php");
?>