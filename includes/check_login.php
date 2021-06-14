<?php
// access = administrator purpose = check the values of login 
session_start();
require_once ('require.php');
$con=db_open();
function returnheader($location){
	$returnheader = header("location: $location");
	return $returnheader;
} 
if(!empty($_POST['usname']) && (!empty($_POST['pass']))) 
    {     
        $name = stripslashes($_POST["usname"]); 
	$name=filter_var($_POST["usname"]);
        $password1 = stripslashes($_POST["pass"]); 
	$password1=filter_var($_POST["pass"]);
        $en_pass=md5($password1);
		try 
		{
			$sql="SELECT username,password,type,id,first_name FROM user WHERE username=:username AND  password=:password ";
			$result = $con->prepare($sql); 
			$result->bindParam(':username',$username);
			$result->bindParam(':password',$password);
			$result->bindParam(':type',$type);
			$result->bindParam(':id',$id);
			$result->bindParam(':first_name',$first_name);
			$result->execute(array(':username'=>$name,':password'=>$en_pass));
			$result1 = $result->fetchAll();
		}
		catch(PDOException $e) 
		{
			echo $sql . "<br>" . $e->getMessage();
			die();
		}
		foreach((array)$result1 as $row) 
		{
			$rows1=$row['username'];
			$rows2=$row['password'];
			$rows3=$row['type'];
			$rows4=$row['first_name'];
			$rows5=$row['id'];
		}
        if($rows3 == 0 && $rows1== $name && $rows2== $en_pass)  
		{
			$_SESSION['root'] = true;
			$_SESSION['who'] = $rows5;
			$_SESSION['name']=$rows4;
			returnheader("../admin/index.php");
			} 
			else 
			{     
				$_SESSION['nologin'] = 1;
				header("location:../login.php");
			}
	}  
$con=null;		    
?>
