<?php
session_start();
require_once('../require.php');
require_once('../functions.php');
$con=db_open();
echo var_dump($_POST);
	if(!empty($_POST["id_esp"])) 
    {     
		  $a1=filter_var($_POST["id_esp"]);
		  echo "mesa";

	try {
			$sql="DELETE FROM esp WHERE  id_esp =:id_esp  ";
			$query=$con->prepare($sql);
			$query->execute(array(':id_esp'=> $a1));
			$_SESSION['ydelesp'] = 1;
		}
	    catch(PDOException $e)
        {	
        echo $sql . "<br>" . $e->getMessage();
		$_SESSION['ndelesp'] = 0;
		die();
        }
	}
$con=null;
returntostart("../../admin/esp.php");
?>