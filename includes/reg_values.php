<?php
//access administrator, register values for new user
session_start();
require_once ('require.php');
require_once ('functions.php');
$conn=db_open();
if(!empty($_POST["username"] && $_POST["pass1"] && $_POST["uname"] && $_POST["fullname"] && $_POST["mail"] && $_POST["address"] && $_POST["phone"])) 
    {     
		  $username=filter_var($_POST["username"]);
		  $password=md5(filter_var($_POST["pass1"]));
		  $name=filter_var($_POST["uname"]);
		  $full_name=filter_var($_POST["fullname"]);
		  $email=filter_var($_POST["mail"]);
		  $address=filter_var($_POST["address"]);
		  $phone_number=filter_var($_POST["phone"]);
		  $type=0;
	    try {
			$sql=" INSERT INTO user(username ,password, first_name, last_name  ,email ,address ,telephone ,type ) VALUES (?,?,?,?,?,?,?,?)" ;
			$inar=array($username,$password,$name,$full_name,$email,$address,$phone_number,$type);
			$q=sqlexecute($conn,$sql,$inar,1);
			$dx=0; 
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
header("location:../register.php");
 $conn=null;
?>
