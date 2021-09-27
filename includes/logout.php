<?php 
 session_start();
setcookie(ID_my_site, gone, $past); 
setcookie(Key_my_site, gone, $past); 

if(isset($_SESSION["root"])){
	setcookie("root", false);
	setcookie ("root", "", time()-3600 , '/' );
	unset($_SESSION["root"]);
}
if(isset($_SESSION["who"])){
	setcookie("who", false);
	setcookie ("who", "", time()-3600 , '/' );
	unset($_SESSION["who"]);
}
if(isset($_SESSION['name'])){
	setcookie("name", false);
	setcookie ("name", "", time()-3600 , '/' );
	unset($_SESSION["name"]);
}
if(isset($_SESSION["user"])){
	setcookie("user", false);
	setcookie ("user", "", time()-3600 , '/' );
	unset($_SESSION["user"]);
}
session_destroy();
header("Location: ../index.php"); 
?>