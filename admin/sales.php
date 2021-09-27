<?php 
include('header.php'); 
require_once('../includes/js/messages.js');

$output = '';
$who=$_SESSION['who'];
$con=db_open();
$counter=0;
?>	
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>

	<div class="container">
	<div class="success_category" id="success_class">
	<span class="msg" id="success_message" >
	<?php 
	if(isset($_SESSION['yorder'])) 
	{   
		echo '<script type="text/javascript">success_message();</script>';
		if ($_SESSION['yorder'] == 1) 
		{
			echo "Η παραγγελίας σας καταχωρήθηκε επιτυχώς και αναμένεται για υλοποίηση της!";
			unset($_SESSION['yorder']);
		}
	}
	?>
	</span>
	</div>	
	<h1 class="page-header text-center">Παραγγελίες σε εξέλιξη:</h1>
	<table class="table table-striped table-bordered">
	<thead>
		<th>Ημερομηνία</th>
		<th>Συνολικές Αγορές Τιμή</th>
		<th>Κατάσταση</th>
		<th>Λεπτομέρειες</th>
	</thead>
	<div id="auto_refresh_data"> </div>
<?php
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
		<td>  '.date('M d, Y h:i A', strtotime($date)).'</td>
		<td class="text-right"> '.number_format($total, 2).'€</td>
		<td><a href="#edit_sales'.$row['order_id'].'" data-toggle="modal"  class="btn btn-success btn-sm"><span class="glyphicon glyphicon-ok"></span> Ολοκλήρωση</a></td>
		<td><a href="#details'.$row['order_id'].'" data-toggle="modal" data-date="'.$date.'"data-id="'.$row['order_id'].'" class="details_button btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span> Εμφάνιση </a></td>			
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
</table>
</div>	
<?php 
require('../includes/js/getData.js');
include('editSales.php');
require_once ('../includes/footer.php'); 
?> 
