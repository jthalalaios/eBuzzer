<?php 
 session_start();
setcookie(ID_my_site, gone, $past); 
setcookie(Key_my_site, gone, $past); 

if(isset($_COOKIE["authenticated"])){
	setcookie("authenticated", false);
	setcookie ("authenticated", "", time()-3600 , '/' );
	unset($_COOKIE["authenticated"]);
}
if(isset($_COOKIE["who"])){
	setcookie("who", false);
	setcookie ("who", "", time()-3600 , '/' );
	unset($_COOKIE["who"]);
}
if(isset($_SESSION['name'])){
	setcookie("name", false);
	setcookie ("name", "", time()-3600 , '/' );
	unset($_COOKIE["name"]);
}
if(isset($_COOKIE["user"])){
	setcookie("user", false);
	setcookie ("user", "", time()-3600 , '/' );
	unset($_COOKIE["user"]);
}
session_destroy();
header("Location: ../index.php"); 
?>