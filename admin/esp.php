<?php 
require_once ('header.php');
require_once ('../includes/functions.php');
require_once('../includes/js/messages.js');
$con=db_open();
$output='';
?>
<div class="container">
<div class="success_category" id="success_class">
<span class="msg" id="success_message" >
<?php 
if(isset($_SESSION['yeditesp'])) 
{
	if ($_SESSION['yeditesp']==1) 
	{
		echo '<script type="text/javascript">success_message();</script>';
		echo "Η επεξεργασία της πλακέτας πραγματοποιήθηκε με επιτυχία";
		unset($_SESSION['yeditesp']);
	}
}
if (isset($_SESSION['yaddesp'])) 
{
	if ($_SESSION['yaddesp'] == 1)
	{
		echo '<script type="text/javascript">success_message();</script>';
		echo "Η προσθήκη της πλακέτας πραγματοποιήθηκε με επιτυχία";
		unset($_SESSION['yaddesp']);
	}
}
if (isset($_SESSION['ydelesp'])) 
{
	if($_SESSION['ydelesp'] == 1) 
	{
		echo '<script type="text/javascript">success_message();</script>';
		echo "Η διαγραφή της πλακέτας πραγματοποιήθηκε με επιτυχία";
		unset($_SESSION['ydelesp']);
	}
}
?>
</span>
</div>
<div class="failed_category" id="failed_class">
<span class="msg_failed" id="failed_message" >
<?php if(isset($_SESSION['neditesp'])) 
{
	echo '<script type="text/javascript">error_message();</script>';
	if ($_SESSION['neditesp'] ==1 ) 
	{
		echo "Πρόβλημα στην επεξεργασία της πλακέτας";
		unset($_SESSION['neditesp']);
	}
}
if (isset($_SESSION['naddesp'])) 
{
	if ($_SESSION['naddesp'] == 1) 
	{
		echo '<script type="text/javascript">error_message();</script>';
		echo "Πρόβλημα στην προσθήκη πλακέτας";
	}
	unset($_SESSION['naddesp']);
}
if (isset($_SESSION['ndelesp'])) 
{
	if ($_SESSION['ndelesp'] == 0)
	{
		echo '<script type="text/javascript">error_message();</script>';
		echo "Πρόβλημα, στην διαγραφή της πλακέτας";
		unset($_SESSION['ydelesp']);
	}
}	
?>
</span>
</div>	
	<div class="logo">
		<h3>Πλακέτα esp8266:</h3>
	</div>
	<div class="row">
		<div class="col-md-12">
			<a href="#add_esp" data-toggle="modal" aria-labelledby="add_esp" class="pull-right btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Πλακέτα</a>
		</div>
	</div>
	<table class="menutable">
		<thead>
			<th>Εικόνα</th>
			<th>ID</th>
			<th>Διαθεσιμότητα</th>
			<th>Ενέργειες</th>
		</thead>
		<tbody>
<?php
$num_per_page=7;
if(isset($_GET["page"]))
{
	$page=filter_var($_GET["page"]);
}
else
{
	$page=1;
}
$start_from=($page-1)*7;
try {
	$sql6 = "SELECT * FROM esp limit $start_from,$num_per_page ";
	$query1 = $con->prepare($sql6);
	$query1->bindParam(':image',$image);
	$query1->bindParam(':id_esp',$id_esp);
	$query1->bindParam(':available',$available);
	$query1->execute(array(':id_esp' => $id_esp,':image' => $image,':available' => $available));
	$result1 = $query1->fetchAll();
	}
	catch (PDOException $e) {
		echo $sql6 . "<br>" . $e->getMessage();
		die();
	}
	foreach((array)$result1 as $row) {
			?>
			<tr>
			<td> <img class="category_image" src="https://zafora.ece.uowm.gr/~ece00592/eBuzzer/includes/esp/<?php  echo $row['image']; ?>"  /> </td> 
			<td><?php echo $row['id_esp']; ?></td>
			<td><?php echo $row['available']; ?></td>
			<td>
			<a href="#edit_esp<?php echo $row['id_esp']; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Επεξεργασία</a> || <a href="#delete_esp<?php echo $row['id_esp']; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Διαγραφή</a>
			<?php include('../includes/esp/showModals.php'); ?>
			</td>
			</tr>
	<?php }	
	if(!$result1){
	$output .= '
	<h4 class="page-header text-center">Δεν υπάρχει καμιά κατοχυρωμένη πλακέτα για υλοποίηση!</h4>';
	echo $output;
	}
	?>
		</tbody>
	</table>
</div>
<?php 
include('../includes/esp/showModals.php'); 
if($query1->fetchAll())
{
$rs_result=$query1->rowCount();
$total_records=$query1->columnCount();
$total_pages=ceil($total_records/$num_per_page);
$check=$total_records/$rs_result;
?>
<div class="viewpage">
<?php
	if($page>1)
    {
		echo "<a href='esp.php?page=".($page-1)."' class='btnview viewbutton '>Προηγούμενη</a>";
    }
  for($i=1;$i<=$total_pages;$i++)
    {
		if($page>1) {
        echo "<a href='esp.php?page=".$i."'>".$i."</a>" ;
		}
    }
	if($i>$page) {
	if ($rs_result>=$num_per_page) 
    {
		echo "<a href='esp.php?page=".($page+1)."' class='btnview viewbutton'>Επόμενη</a>";
    }
    }
    ?>
</div>  
<?php require_once('../includes/footer2.php'); 
}
?>
</body>
</html>
