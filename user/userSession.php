<?php
session_start();
if(!$_SESSION['user'] ==1){
	returntostart("../index.php");
} 
?>