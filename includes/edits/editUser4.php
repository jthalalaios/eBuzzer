<?php
session_start();
require_once('../require.php');
$con=db_open();

if(isset($_SESSION['who']))
{
	$searchq =$_SESSION['who'];
	if(!empty(($_POST["uname"]) && ($_POST["fullname"]) && ($_POST["username"]) && ($_POST["pass1"]) && ($_POST["mail"]) && ($_POST["address"]) && ($_POST["phone"]) && ($_POST["rights"]))) 
	{
			$name=filter_var($_POST['uname']);
			$fname=filter_var($_POST['fullname']);
			$username=filter_var($_POST['username']);
			$pass=md5(filter_var($_POST['pass1']));
			$mail=filter_var($_POST['mail']);
			$address=filter_var($_POST['address']);
			$phone=filter_var($_POST['phone']);
			$rights=filter_var($_POST['rights']);
			try 
			{
			 $sql2=" update user set first_name =:first_name, last_name=:last_name, username=:username ,password=:password, email=:email, address=:address, telephone=:telephone, type=:type   WHERE  id=:id ";
			 $query2=$con->prepare($sql2);
			 $query2->execute(array(':id' => $searchq,':first_name' => $name,':last_name' => $fname,':username' => $username,':password' => $pass,':email' => $mail,':address' => $address,':telephone' => $phone,':type' => $rights));
			 $_SESSION['ychange'] = 1;
			}
			catch(PDOException $e)
			{	
			 $_SESSION['ychange'] = 2;
			 echo $e->getMessage();
			}
    }   
}

 if(isset($_SESSION['ychange']))
 {
		if ($_SESSION['ychange'] == 1) 
		{
			echo '<script language="javascript">';
			echo ' alert("Επιτυχής επεξεργασία των στοιχειών του χρήστη:")';
			echo '</script>' ;	
			unset($_SESSION["ychange"]);
        }
	    else 
		{	
		   echo '<script language="javascript">';
           echo 'alert("Πρόβλημα στην επεξεργασία των στοιχειών του χρήστη:")';
	       echo '</script>' ;
		   unset($_SESSION["ychange"]);
	    }
 }	
$con=null;
header( "refresh:0; url=../../admin/index.php" );
?>