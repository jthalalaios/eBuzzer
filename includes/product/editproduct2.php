<?php
session_start();
require_once('../require.php');
require_once('../functions.php');
$con=db_open();
if (isset($_GET['product'])) 
{
	if(!empty($_POST['pname']) && (is_numeric ($_POST['price']))) 
	{
	$id=filter_var($_GET['product']);
	$pname=filter_var($_POST['pname']);
	$category=filter_var($_POST['category']);
	$price=filter_var($_POST['price']);			
	try 
	{
		$sql="select image from product WHERE product_id=:product_id";
		$query1 = $con->prepare($sql);
		$query1->bindParam(':image',$image);
		$query1->execute(array(':product_id' => $id));
		$count=$query1->fetchAll();
	}
	catch(PDOException $e)
    {	
		echo $sql . "<br>" . $e->getMessage();
		die();
	}
	$fileinfo=PATHINFO($_FILES["photo"]["name"]);

	if (empty($fileinfo['filename'])){
		foreach ($count as $row) 
		{
		$location = $row['image'];
		}
	}
	else
	{
		$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
		move_uploaded_file($_FILES["photo"]["tmp_name"],"upload/" . $newFilename);
		$location="upload/" . $newFilename;
	}
	try {
			$sql2="update product set product_name=:product_name, product_cat_id=:product_cat_id, value=:value, image =:image where product_id =:product_id";
			$query2=$con->prepare($sql2);
			$query2->execute(array(':product_id' => $id,':product_name' => $pname,':product_cat_id' => $category,':value' => $price,':image' => $location));
			$_SESSION['yeditp'] = 1;
		}
	    catch(PDOException $e)
        {	
			echo $sql2 . "<br>" . $e->getMessage();
			$_SESSION['neditp'] = 1;
			die();
        }
 }
 elseif (!is_numeric ($_POST['price'])) 
 {
	$_SESSION['neditp'] = 3;
 }
else 
 {
	$_SESSION['neditp'] = 2;
 }
}
$con=null;
header("location:../../admin/product.php");
?>