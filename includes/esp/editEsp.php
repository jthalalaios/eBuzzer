<?php
session_start();
require_once('../require.php');
require_once('../functions.php');
$con=db_open();
if (isset($_POST['id'])) 
{	
	$id=filter_var($_POST['id']);
	$available_new=filter_var($_POST['available_edit']);
	try 
	{
		$sql1="select image from esp  WHERE  id_esp=:id_esp ";
		$query1=$con->prepare($sql1);
		$query1->execute(array(':id_esp' => $id));
		$count=$query1->fetchAll();
	}
	catch(PDOException $e)
        {	
         echo $sql1 . "<br>" . $e->getMessage();
		 die();
        }    
		try {
			$fileinfo=PATHINFO($_FILES["photo"]["name"]);
			if (empty($fileinfo['filename'])){
				foreach ($count as $row) 
				{
					$location = $row['image'];
				}
			}
			else{
				$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
				move_uploaded_file($_FILES["photo"]["tmp_name"],"upload/" . $newFilename);
				$location="upload/" . $newFilename;
			}
			try 
			{
				$sql2=" update esp set available=:available, image=:image  WHERE  id_esp=:id_esp ";
				$query2=$con->prepare($sql2);
				$query2->execute(array(':id_esp' => $id,':available'=> $available_new,':image' =>$location));
				$_SESSION['yeditesp'] = 1;
			}
			catch(PDOException $e)
			{	
				echo $sql2 . "<br>" . $e->getMessage();
				die();
			}
		}
	    catch(PDOException $e)
        {	
         echo $e->getMessage();
		 die();
        }
	}
	else 
	{
		$_SESSION['neditesp'] = 1;
	}	
$con=null;
returntostart("../../admin/esp.php");
?>