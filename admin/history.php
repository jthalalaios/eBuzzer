<?php 
include('header.php'); 
$output = '';
$who=$_SESSION['who'];
$con=db_open();
$count=0;
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
	$sql="select order_id from history WHERE idh_user=:idh_user GROUP BY order_id  ";
	$query = $con->prepare($sql);
	$query->execute(array(':idh_user' => $who));
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
	$sql2="select history.* from history WHERE idh_user=:idh_user GROUP BY order_id";
	$query2 = $con->prepare($sql2);
	//$query2->bindParam(':order_id',$order_id);
	$query2->execute(array(':idh_user' => $who));
}
catch(PDOException $e)
{	
	echo $e->getMessage();
}
foreach ($query2->fetchAll() as $row2) 
{
	$id_order=$row2['order_id'];
	$date=$row2['s_date'];
	$total=$row2['total'];
	$hid=$row2['idh_prod'];
	$output .= '
	<tbody> 
		<td id="id_ordering" class="text-right">'.$id_order.'</td>
		<td> '.date('M d, Y h:i A', strtotime($date)).'</td>
		<td class="text-right">'.number_format($total, 2).'€</td>
		<td> <a href="#details'.$row2['order_id'].'" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span> Εμφάνιση </a>	</td>		
	</tbody>
';
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
require_once('history_info.php'); 
?> 