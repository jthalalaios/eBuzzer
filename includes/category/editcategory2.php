<?php
session_start();
require_once('../require.php');
$con=db_open();
if (isset($_POST['id'])) 
{	
	if(!empty($_POST["cat_checkbox"])) 
		{
			$checkbox_value=1;
		}
		else 
		{
			$checkbox_value=0;
		}
	try 
	{
		$id2=filter_var($_POST['id']);
		$sql1="select cat_image from categories  WHERE  cat_id=:cat_id ";
		$query1=$con->prepare($sql1);
		$query1->execute(array(':cat_id' => $id2));
		$count=$query1->fetchAll();
	}
	catch(PDOException $e)
        {	
         echo $sql1 . "<br>" . $e->getMessage();
		 die();
        }
	
	if(!empty($_POST["cname2"])) 
		{      
			$cname1=filter_var($_POST['cname2']);
		try {
			$fileinfo=PATHINFO($_FILES["photo"]["name"]);
			if (empty($fileinfo['filename'])){
				foreach ($count as $row) 
				{
					$location = $row['cat_image'];
				}
			}
			else{
				$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
				move_uploaded_file($_FILES["photo"]["tmp_name"],"upload/" . $newFilename);
				$location="upload/" . $newFilename;
			}
			try 
			{
				$sql2=" update categories set cat_name =:cat_name, cat_image =:cat_image, cat_checkvalue=:cat_checkvalue  WHERE  cat_id=:cat_id ";
				$query2=$con->prepare($sql2);
				$query2->execute(array(':cat_id' => $id2,':cat_name' => $cname1,':cat_image' =>$location,':cat_checkvalue' =>$checkbox_value));
				$_SESSION['yeditc'] = 1;
			}
			catch(PDOException $e)
			{	
				echo $sql2 . "<br>" . $e->getMessage();
				$_SESSION['neditc'] = 1;
				die();
			}
		}
	    catch(PDOException $e)
        {	
         echo $e->getMessage();
		 $_SESSION['neditc'] = 2;
		 die();
        }
	}
	else {
		$_SESSION['neditc'] = 3;
		}	
}
$con=null;
header("location:../../admin/category.php");
?>