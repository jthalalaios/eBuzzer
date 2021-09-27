<?php
session_start();
require_once('../functions.php');
require_once('../require.php');
$con=db_open();

if(isset($_SESSION['who']))
{
	$id =filter_var($_POST['id_dynamic']);
	$name=filter_var($_POST['uname_dynamic']);
	$fname=filter_var($_POST['fullname_dynamic']);
	$username=filter_var($_POST['username_dynamic']);
	$mail=filter_var($_POST['mail_dynamic']);
	$address=filter_var($_POST['address_dynamic']);
	$phone=filter_var($_POST['phone_dynamic']);
	$rights=filter_var($_POST['rights_dynamic']);
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
		die();
	}
}   
$con=null;
returntostart( "../../admin/searchUsers.php" );
?>
