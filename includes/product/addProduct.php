<?php
session_start();
require_once('../require.php');
require_once('../functions.php');
$con=db_open();
$fileinfo=PATHINFO($_FILES["photo1"]["name"]);
if(empty($fileinfo['filename']))
{
	$location="";
}
else
{
	$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
	move_uploaded_file($_FILES["photo1"]["tmp_name"],"upload/" . $newFilename);
	$location="upload/" . $newFilename;
}	
if(!empty($_POST["pname1"]) && (is_numeric($_POST['price1'])) && (!empty($_POST["category1"]))) 
    {     
		  $product_name=filter_var($_POST["pname1"],FILTER_SANITIZE_STRING);
		  $product_price=filter_var($_POST["price1"],FILTER_SANITIZE_STRING);
		  $product_category=filter_var($_POST["category1"],FILTER_SANITIZE_NUMBER_INT);
		  $product_image=$location;
		  var_dump($product_name,$product_price,$product_category,$product_image);
	try {
			$sql="INSERT INTO product(product_name,value,product_cat_id,image) VALUES (:product_name,:value,:product_cat_id,:image)" ;
			$query=$con->prepare($sql);
			$query->execute(array(':product_name'=>$product_name,':value'=>$product_price,':product_cat_id'=>$product_category,':image'=>$product_image));
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
	if (!is_numeric ($_POST['price1'])) 
	{
		$_SESSION['naddp'] = 2;	
	}
$con=null;
returntostart("../../admin/product.php");
?>