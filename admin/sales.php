<?php 
include('header.php'); 
//include_once("post.php.inc");savemsg(json_encode($_REQUEST));
$output = '';
$who=$_SESSION['who'];
$con=db_open();
$count=0;
?>	
	<div class="container">
	<h1 class="page-header text-center">Παραγγελίες σε εξέλιξη:</h1>
	<table class="table table-striped table-bordered">
	<thead>
		<th>Ημερομηνία</th>
		<th>Συνολικές Αγορές Τιμή</th>
		<th>Κατάσταση</th>
		<th>Λεπτομέρειες</th>
	</thead>
<?php
try
{
	$sql="select order_id from orders WHERE id_user=:id_user GROUP BY order_id  ";
	$query = $con->prepare($sql);
	$query->execute(array(':id_user' => $who));
	$count_id_order=$query->rowCount();
}
catch(PDOException $e)
{	
	echo $e->getMessage();
}
$id_order_array=array();
foreach ($query->fetchAll() as $row) 
{	
	$id_order=$row['order_id'];
	array_push($id_order_array,$id_order);		
}
try 
{	
	$sql2="select orders.* from orders WHERE id_user=:id_user GROUP BY order_id";
	$query2 = $con->prepare($sql2);
	$query2->execute(array(':id_user' => $who));
}
catch(PDOException $e)
{	
	echo $e->getMessage();
}
foreach ($query2->fetchAll() as $row2) 
{
	$count_id=$count_id_order;
	include('edit_sales.php'); 
	$date=$row2['s_date'];
	$total=$row2['total'];
	$pur_id=$row2['id_pur'];
	$hid=$row2['id_prod'];
	$output .= '
	<tbody> 
		<td> '.date('M d, Y h:i A', strtotime($date)).'</td>
		<td class="text-right">'.number_format($total, 2).'€</td>
		<td><a href="#editsales'.$row2['order_id'].'" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-ok"></span> Ολοκλήρωση</a></td>
		<td><a href="#details'.$row2['order_id'].'" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span> Εμφάνιση </a></td>			
	</tbody>
';
}
echo $output;
?>
</table>
</div>
<div class="success" id="success-class">
	<span class="msg" id="success_message" >
	<?php if(isset($_SESSION['yorder'])) {
		if ($_SESSION['yorder'] == 1) {
			?><script>
				var element = document.getElementById('success-class');
				element.style.opacity = "1";
                setTimeout(function(){  
                   $('success').fadeOut("Slow"); 
						element.style.opacity = "0";
                    }, 5000);  
			</script> <?php
		echo "Η παραγγελίας σας καταχωρήθηκε επιτυχώς και αναμένεται για υλοποίηση της!";
		unset($_SESSION['yorder']);
		}
	}
	?>
	</span>
</div>	
<?php
require_once('salesinfo.php'); 
require_once ('../includes/footer.php'); 
?> 
