<div class="container">
<table class="table table-striped table-bordered">
<?php
require_once ('../require.php');

$con=db_open();
$output = '';
if(isset($_POST["query"]))
{
	try
	{
		$searchq = htmlspecialchars(filter_var($_POST["query"]));
		$sql="select * from orders inner join history on history.history_oder_id =orders.order_id WHERE history_oder_id LIKE concat(:history_oder_id,'%') LIMIT 1";
		$query = $con->prepare($sql);
		$query->execute(array(':history_oder_id'=>$searchq));
		$result=$query->fetchALL();
		$value=$query->rowCount();
	}
	catch(PDOException $e)
	{		
		echo $e->getMessage();
	}
if($result )
{
	$output .= '
		<thead>
			<th>Κωδικός Ιστορικού</th>
			<th>Κωδικός Παραγγελίας</th>
			<th>Ημερομηνία</th>
			<th>Συνολικές Αγορές Τιμή</th>
			<th>Λεπτομέρειες</th>
		</thead>
	';
	foreach ($result as $row) 
	{	
		$id_user=$row['id_user'];
		$id_order=$row['order_id'];
		$date=$row['s_date'];
		$total=$row['total'];
		$output .= '
		<tbody> 
			<td id="id_ordering" class="text-right">'.$row['history_id'].'</td>
			<td id="id_ordering" class="text-right">'.$id_order.'</td>
			<td> '.date('M d, Y h:i A', strtotime($date)).'</td>
			<td class="text-right">'.number_format($total, 2).'€</td>
			<td> <a href="#details_order_dynamic'.$row['order_id'].'" data-toggle="modal" id="details_order_modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span> Εμφάνιση </a>	</td>		
		</tbody>
</table></div>
		';
	}
echo $output;
}
else
{
 echo "Δεν βρέθηκε καμιά παραγγελία";
}
require_once('../edits/showOrderModal.php');
}
?>
