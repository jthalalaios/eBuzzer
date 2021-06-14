 <?php  
 session_start();
 if(isset($_POST["product_checkvalue"]))  
 {  
	function returnvalue() {
		$timh=filter_var($_POST["product_checkvalue"]);
	print $timh;
	return $timh;
	}	
}  	
returnvalue();  
 ?>  
