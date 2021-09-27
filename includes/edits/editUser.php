<?php
session_start();
require_once('../require.php');
require_once('../functions.php'); 
$con=db_open();

if(isset($_SESSION['who']))
{
	$searchq =$_SESSION['who'];
	if(!empty(($_POST["uname"]) && ($_POST["fullname"]) && ($_POST["username"]) && ($_POST["pass1"]) && ($_POST["mail"]) && ($_POST["address"]) && ($_POST["phone"]))) 
	{
			$name=filter_var($_POST['uname'],FILTER_SANITIZE_STRING);
			$fname=filter_var($_POST['fullname'],FILTER_SANITIZE_STRING);
			$username=filter_var($_POST['username'],FILTER_SANITIZE_STRING);
			$pass=md5(filter_var($_POST['pass1']));
			$mail=filter_var($_POST['mail'],FILTER_SANITIZE_EMAIL);
			$address=filter_var($_POST['address'],FILTER_SANITIZE_STRING);
			$phone=filter_var($_POST['phone'],FILTER_SANITIZE_NUMBER_INT);
			try 
			{
			 $sql2=" update user set first_name =:first_name, last_name=:last_name, username=:username ,password=:password, email=:email, address=:address, telephone=:telephone   WHERE  id=:id ";
			 $query2=$con->prepare($sql2);
			 $query2->execute(array(':id' => $searchq,':first_name' => $name,':last_name' => $fname,':username' => $username,':password' => $pass,':email' => $mail,':address' => $address,':telephone' => $phone));
			 $_SESSION['ychange'] = 1;
			}
			catch(PDOException $e)
			{	
			 $_SESSION['nchange'] = 2;
			 echo $e->getMessage();
			 die();
			}
    }
	if (!isset($_SESSION['ychange']))
	{
		$_SESSION['nchange'] = 2;
	} 
	
}
$con=null;
returntostart( "../../user/index.php" );
?>