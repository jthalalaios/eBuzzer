<?php
var_dump($_POST);
if (isset($_POST['order_id']))
{
	$id_order=filter_var($_POST['order_id']);	
}

?>