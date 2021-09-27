<?php
session_start();
require_once ('../require.php');
$con=db_open();
$output = '';
if(isset($_POST['user_name']))
{
	$username=filter_var($_POST["user_name"],FILTER_SANITIZE_STRING);
	$sql="select * from user where username=:username";
	$query=$con->prepare($sql);
	$result=$query->execute(array(':username'=>$username));
	
	if($query->rowCount()>0)
	{
		echo '<span  class="text-danger"><h4> Το username υπάρχει ήδη! </h4></span>';
		$_SESSION['goRegister'] = 0;
	}
	else
	{
		echo '<span class="text-success"><h4> Το username είναι διαθέσιμο! </h4></span>';
		$_SESSION['goRegister'] = 1;
	}
	
}
?>