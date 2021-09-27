<?php 
include('header.php'); 
require_once('../includes/js/messages.js');
$output = '';
$who=$_SESSION['who'];
$con=db_open();
?>	
<div class="container">
<div class="success_category" id="success_class">
<span class="msg" id="success_message">
<?php 
if(isset($_SESSION['yaddsales'])) 
{
	if ($_SESSION['yaddsales']==1) 
	{
		echo '<script type="text/javascript">success_message();</script>';
		echo "Η παραγγελίας σας έχει ολοκληρωθεί! Μπορείτε να την παραλάβετε!";
		unset($_SESSION['yaddsales']);
	}
}
?>
</span>
</div>	
	<h1 class="page-header text-center">Ιστορικό Παραγγελιών:</h1>
	<table class="table table-striped table-bordered">
	<thead>
		<th>Κωδικός Ιστορικού</th>
		<th>Κωδικός Παραγγελίας</th>
		<th>Ημερομηνία</th>
		<th>Συνολικές Αγορές Τιμή</th>
		<th>Λεπτομέρειες</th>
	</thead>
<?php
try
{
	$sql="select * from orders inner join history on history.history_oder_id =orders.order_id ORDER BY history_id ASC";
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
	$id_order=$row['order_id'];
	$date=$row['s_date'];
	$total=$row['total'];
	$output .= '
	<tbody> 
		<td id="id_ordering" class="text-right">'.$row['history_id'].'</td>
		<td id="id_ordering" class="text-right">'.$id_order.'</td>
		<td> '.date('M d, Y h:i A', strtotime($date)).'</td>
		<td class="text-right">'.number_format($total, 2).'€</td>
		<td> <a href="#details'.$row['order_id'].'" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span> Εμφάνιση </a>	</td>		
	</tbody>
';
}
if($value==0)
{		$output = '';
		$output .= '
		<h4 class="page-header text-center">Δεν υπάρχει καμιά κατοχυρωμένη παραγγελία που ολοκληρώθηκε!</h4>';
		echo $output;
		$output = '';
}
echo $output;
?>
</table>
</div>
<?php 
require_once('historyInfo.php'); 
require_once ('../includes/footer2.php'); 
?> 