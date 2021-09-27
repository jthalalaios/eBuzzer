<?php
function db_open(){
$host=MYSQLHOST;
$dbname=MYSQLBASE;
$user=MYSQLUSER;
$passwd=MYSQLPASS;
try{
$conn = new PDO("mysql:".MYSQLHTYP."=$host;dbname=$dbname",$user,$passwd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
}
catch(PDOException $pe){
die('Connection error:' . $pe->getmessage());
}
return $conn;
}
?>


