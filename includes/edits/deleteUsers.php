<?php
session_start();
require_once('../require.php');
require_once('../functions.php');
$con=db_open();
	if(!empty($_POST["id_del_user"])) 
    { 
		$user_id=filter_var($_POST["id_del_user"],FILTER_SANITIZE_NUMBER_INT);
		try 
		{
			$sql="SET FOREIGN_KEY_CHECKS = 0;";
			$query=$con->prepare($sql);
			$query->execute(array());
		}
	    catch(PDOException $e)
        {	
        echo $sql . "<br>" . $e->getMessage();
		die();
        }
		try 
		{
			$sql="ALTER table user Engine=InnoDB";
			$query=$con->prepare($sql);
			$query->execute(array());
		}
	    catch(PDOException $e)
        {	
        echo $sql . "<br>" . $e->getMessage();
		die();
        }
		try 
		{
			$sql="DELETE FROM user WHERE id=:id";
			$query=$con->prepare($sql);
			$query->execute(array(':id'=> $user_id));
			$_SESSION['ydeluser'] = 1;
		}
	    catch(PDOException $e)
        {	
        echo $sql . "<br>" . $e->getMessage();
		$_SESSION['ndeluser'] = 0;
		die();
        }
		try 
		{
			$sql="SET FOREIGN_KEY_CHECKS = 1;";
			$query=$con->prepare($sql);
			$query->execute(array());
		}
	    catch(PDOException $e)
        {	
        echo $sql . "<br>" . $e->getMessage();
		die();
        }
		try 
		{
			$sql="ALTER table user Engine=InnoDB";
			$query=$con->prepare($sql);
			$query->execute(array());
		}
	    catch(PDOException $e)
        {	
        echo $sql . "<br>" . $e->getMessage();
		die();
        }
	}
$con=null;
returntostart("../../admin/searchUsers.php");
?>