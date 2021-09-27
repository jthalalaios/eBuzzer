<?php
//access administrator, register values for new user
session_start();
require_once ('require.php');
require_once ('functions.php');
$conn=db_open();
if(!empty($_POST["username"] && $_POST["pass1"] && $_POST["uname"] && $_POST["fullname"] && $_POST["mail"] && $_POST["address"] && $_POST["phone"])) 
    {     if($_SESSION['goRegister'] == 1)
		{
		  $username=filter_var($_POST["username"],FILTER_SANITIZE_STRING);
		  $password=md5(filter_var($_POST["pass1"]));
		  $name=filter_var($_POST["uname"],FILTER_SANITIZE_STRING);
		  $full_name=filter_var($_POST["fullname"],FILTER_SANITIZE_STRING);
		  $email=filter_var($_POST["mail"],FILTER_SANITIZE_EMAIL);
		  $address=filter_var($_POST["address"],FILTER_SANITIZE_STRING);
		  $phone_number=filter_var($_POST["phone"],FILTER_SANITIZE_NUMBER_INT);
		  $type=1;
	    try 
		{
			$sql=" INSERT INTO user(username ,password, first_name, last_name  ,email ,address ,telephone ,type ) VALUES (:username,:password,:first_name,:last_name,:email,:address,:telephone,:type)" ;
			$query = $conn->prepare($sql);
			$query->execute(array(':username'=>$username,':password'=>$password,':first_name'=>$name,':last_name'=>$full_name,':email'=>$email,':address'=>$address,':telephone'=>$phone_number,':type'=>$type)); 
			$_SESSION['yadd'] = 1;
			
		}
	    catch(PDOException $e)
        {	
			echo $sql . "<br>" . $e->getMessage();
			unset ($_SESSION['yadd']);
			$_SESSION['nadd'] = 0;
			die();
        }		
     }
	 else
	 {
	 	$_SESSION['nadd'] = 0;
	 }
  }  
$conn=null;
returntostart("../register.php");
?>
