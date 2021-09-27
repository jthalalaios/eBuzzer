<?php
session_start();
require_once('../require.php');
require_once('../functions.php');
$con=db_open();
	
	if(!empty($_POST["cname"] )) 
    {     
		$category_name=filter_var($_POST["cname"],FILTER_SANITIZE_STRING);
		if(!empty($_POST["cat_checkbox"])) 
		{
			$category_checkbox_value=1;
		}
		else 
		{
			$category_checkbox_value=0;
		}
		$fileinfo=PATHINFO($_FILES["photo"]["name"]);
	if (empty($fileinfo['filename'])){
		$location = $row['image'];
	}
	else{
		$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
		move_uploaded_file($_FILES["photo"]["tmp_name"],"upload/" . $newFilename);
		$location="upload/" . $newFilename;
	}
	  $new_location_image=$location;
	try {
			$sql=" INSERT INTO categories (cat_name,cat_image,cat_checkvalue) VALUES (:cat_name,:cat_image,:cat_checkvalue)" ;
			$query=$con->prepare($sql);
			$query->execute(array(':cat_name'=>$category_name,':cat_image'=>$new_location_image,':cat_checkvalue'=>$category_checkbox_value));
			$_SESSION['yaddc'] = 1;
		}
	    catch(PDOException $e)
        {	
			echo $sql . "<br>" . $e->getMessage();
			$_SESSION['naddc'] = 0;
			die();
		}
    }
	else {
		$_SESSION['naddc'] = 1;
		die();
	}
$con=null;
returntostart("../../admin/category.php");
?>