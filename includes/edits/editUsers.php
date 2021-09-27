<?php
session_start();
require_once('../functions.php');
require_once('../require.php');
$con=db_open();

if(isset($_SESSION['who']))
{
	$id =filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
	$name=filter_var($_POST['uname'],FILTER_SANITIZE_STRING);
	$fname=filter_var($_POST['fullname'],FILTER_SANITIZE_STRING);
	$username=filter_var($_POST['username'],FILTER_SANITIZE_STRING);
	$mail=filter_var($_POST['mail'],FILTER_SANITIZE_EMAIL);
	$address=filter_var($_POST['address'],FILTER_SANITIZE_STRING);
	$phone=filter_var($_POST['phone'],FILTER_SANITIZE_NUMBER_INT);
	$rights=filter_var($_POST['rights'],FILTER_SANITIZE_NUMBER_INT);
	try 
	{
		$sql2=" update user set first_name =:first_name, last_name=:last_name, username=:username, email=:email, address=:address, telephone=:telephone, type=:type  WHERE  id=:id ";
		$query2=$con->prepare($sql2);
		$query2->execute(array(':id' => $id,':first_name' => $name,':last_name' => $fname,':username' => $username,':email' => $mail,':address' => $address,':telephone' => $phone,':type' => $rights));
		$_SESSION['ychange'] = 1;
	}
	catch(PDOException $e)
	{	
		$_SESSION['nchange'] = 1;
		echo $e->getMessage();
	}
	
}   
$con=null;
returntostart( "../../admin/searchUsers.php" );
?>
