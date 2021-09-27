<?php 
require_once('../includes/require.php'); 
$con=db_open();
$output = '';
$counter=0;
try 
{	
	$sql="select * from orders";
	$query = $con->prepare($sql);
	$query->execute(array());
	$value=$query->rowCount();
}
catch(PDOException $e)
{	
	echo $e->getMessage();
}
foreach ($query->fetchAll() as $row) 
{
	$status=$row['status'];
	$id_order=$row['order_id'];
	$id_user=$row['id_user'];
	$date=$row['s_date'];
	$total=$row['total'];
	include('editSales.php');
	if ($status==0)
	{
	$counter=$counter+1;
	$output .= '
	<tbody> 
		<td> '.date('M d, Y h:i A', strtotime($date)).'</td>
		<td class="text-right">'.number_format($total, 2).'€</td>
		<td><a href="#edit_sales'.$row['order_id'].'" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-ok"></span> Ολοκλήρωση</a></td>
		<td><a href="#details'.$row['order_id'].'" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span> Εμφάνιση </a></td>			
	</tbody>
	';
	}	
}
echo $output;
if($value==0)
{
	$output = '';
	$output .= ' <h4 class="page-header text-center">Δεν υπάρχει καμιά κατοχυρωμένη παραγγελία για υλοποίηση!</h4>';
	echo $output;
}
if(isset($status))
{
	if($status==1 && ($counter==0)) 
	{
		$output = '';
		$output .= ' <h4 class="page-header text-center">Δεν υπάρχει καμιά κατοχυρωμένη παραγγελία για υλοποίηση!</h4>';
		echo $output;
	}
}
$output = '';
?>