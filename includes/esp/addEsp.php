<?php
session_start();
require_once('../require.php');
require_once('../functions.php');
$con=db_open();
if(isset($_POST["available"])) 
    {   
		$diathesimothta=filter_var($_POST["available"],FILTER_SANITIZE_NUMBER_INT);
		$fileinfo=PATHINFO($_FILES["photo"]["name"]);
	if (empty($fileinfo['filename']))
	{
		$location = $row['image'];
	}
	else{
		$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
		move_uploaded_file($_FILES["photo"]["tmp_name"],"upload/" . $newFilename);
		$location="upload/" . $newFilename;
	}
	  $new_location_image=$location;
	try {
			$sql=" INSERT INTO esp (available,image) VALUES (:available,:image)" ;
			$query=$con->prepare($sql);
			$query->execute(array(':available'=>$diathesimothta,':image'=>$new_location_image));
			$_SESSION['yaddesp'] = 1;
		}
	    catch(PDOException $e)
        {	
			echo $sql . "<br>" . $e->getMessage();
			die();
		}
	}
	else 
	{
		$_SESSION['naddesp'] = 1;
		die();
	}
$con=null;
returntostart("../../admin/esp.php");
?>