<?php 
include('header.php'); 
$output = '';
$who=$_SESSION['who'];
$con=db_open();
?>	
<div class="container">
	<h1 class="page-header text-center">Ιστορικό Παραγγελιών:</h1>
	<table class="table table-striped table-bordered">
	<thead>
		<th>Κωδικός Παραγγελίας</th>
		<th>Ημερομηνία</th>
		<th>Συνολικές Αγορές Τιμή</th>
		<th>Λεπτομέρειες</th>
	</thead>
<?php
try
{
	$sql="select * from orders inner join history on history.history_oder_id =orders.order_id  where  id_user=:id_user";
	$query = $con->prepare($sql);
	$query->execute(array(':id_user' => $who));
	$value=$query->rowCount();
}
catch(PDOException $e)
{	
	echo $e->getMessage();
}
$id_order_array=array();
foreach ($query->fetchAll() as $row) 
{	
	$id_order=$row['order_id'];
	$date=$row['s_date'];
	$total=$row['total'];
	$output .= '
	<tbody> 
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
<div class="success" id="success-class">
	<span class="msg" id="success_message" >
	<?php if(isset($_SESSION['yaddsales'])) {
		if ($_SESSION['yaddsales'] == 1) {
			?><script>
				var element = document.getElementById('success-class');
				element.style.opacity = "1";
                setTimeout(function(){  
                   $('success').fadeOut("Slow"); 
						element.style.opacity = "0";
                    }, 5000);  
			</script> <?php
		echo "Η παραγγελίας σας έχει ολοκληρωθεί! Μπορείτε να την παραλάβετε!";
		unset($_SESSION['yaddsales']);
		}
	}
	?>
	</span>
</div>
<?php 
require_once ('../includes/footer.php'); 
require_once('historyInfo.php'); 
?> 