<?php
session_start();
if(!$_SESSION['root'] ==1){
	returntostart("../index.php");
} 
?>