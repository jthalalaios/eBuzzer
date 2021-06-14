<?php
function sqlexecute($conn,$sql,$inar="",$reqfe=0){
//echo "sql : $sql <pre>";print_r($inar);echo "</pre>";
$q=$conn->prepare($sql);
if (!$q) {
    echo "\nPDO::errorInfo():\n";
    print_r($conn->errorInfo());
	die ("<br /><br />Error...");
}
$q->execute($inar);
//echo "res<pre>";print_r($q);echo "</pre> next: </br>done<br />";
if($reqfe==1){return $q;}else{return $conn->errorInfo();}
}

function returntostart($location){
	$returnheader = header("location: $location");
	return $returnheader;	
}
?>

