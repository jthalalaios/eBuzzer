<?php
session_start();
require_once('../require.php');
require_once('../functions.php');
$con=db_open();

	$fileinfo=PATHINFO($_FILES["photo1"]["name"]);
	if(empty($fileinfo['filename'])){
		$location="";
	}
	else{
	$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
	move_uploaded_file($_FILES["photo1"]["tmp_name"],"upload/" . $newFilename);
	$location="upload/" . $newFilename;
	}	
	if(!empty($_POST["pname1"]) && (is_numeric($_POST['price1'])) && (!empty($_POST["category1"]))) 
    {     
		  $a1=filter_var($_POST["pname1"]);
		  $a2=filter_var($_POST["price1"]);
		  $a3=filter_var($_POST["category1"]);
		  $a4=$location;
	try {
			$sql="INSERT INTO product(product_name,value,product_cat_id,image) VALUES (?,?,?,?)" ;
			$inar=array($a1,$a2,$a3,$a4);
			$q=sqlexecute($con,$sql,$inar,1);
			$dx=0; 
			$_SESSION['yaddp'] = 1;
		}
	    catch(PDOException $e)
        {	
        echo $sql . "<br>" . $e->getMessage();
		$_SESSION['naddp'] = 0;
		die();
        }
	}
	if (empty($_POST["pname1"])) {
				$_SESSION['naddp'] = 1;
	}
	
	if (!is_numeric ($_POST['price1'])) {
				$_SESSION['naddp'] = 2;
				
	}
header("location:../../admin/product.php");
  $con=null;
?>