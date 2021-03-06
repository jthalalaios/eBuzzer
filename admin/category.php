<?php 
require_once ('header.php');
require_once('../includes/js/messages.js');
$output='';
?>
<div class="container">
<div class="success_category" id="success_class">
<span class="msg" id="success_message">
<?php if(isset($_SESSION['yeditc'])) {
		if ($_SESSION['yeditc']==1) 
		{
			echo '<script type="text/javascript">success_message();</script>';
			echo "Η επεξεργασία της κατηγορίας πραγματοποιήθηκε με επιτυχία";
			unset($_SESSION['yeditc']);
		}
	}
	if (isset($_SESSION['yaddc'])) {
	if ($_SESSION['yaddc'] == 1) 
	{
		echo '<script type="text/javascript">success_message();</script>';
		echo "Η προσθήκη της κατηγορίας πραγματοποιήθηκε με επιτυχία";
		unset($_SESSION['yaddc']);
	}
   }
   if (isset($_SESSION['ydelc'])) {
	if($_SESSION['ydelc'] == 1) 
	{
		echo '<script type="text/javascript">success_message();</script>';
		echo "Η διαγραφή της κατηγορίας πραγματοποιήθηκε με επιτυχία";
		unset($_SESSION['ydelc']);
	}
   }
?>
</span>
</div>	
<div class="failed_category" id="failed_class">
<span class="msg_failed" id="failed_message" >
<?php 
if(isset($_SESSION['neditc'])) 
{
	echo '<script type="text/javascript">error_message();</script>';
	if ($_SESSION['neditc'] ==1 || $_SESSION['neditc'] ==2 || $_SESSION['neditc'] == 3) 
	{    
		if ($_SESSION['neditc'] == 1 || $_SESSION['neditc'] == 2 ) 
		{
			echo "Πρόβλημα στην επεξεργασία της κατηγορίας";
		}
		if ($_SESSION['neditc'] == 3) 
		{
		echo "Πρόβλημα, δεν καταχωρήθηκε το όνομα της κατηγορίας";
		}
	unset($_SESSION['neditc']);
	}
}
if (isset($_SESSION['naddc'])) 
{
	if ($_SESSION['naddc'] == 1 || $_SESSION['naddc'] == 0)
	{
		echo '<script type="text/javascript">error_message();</script>';
		if ($_SESSION['naddc'] == 1) 
		{
			echo "Πρόβλημα στην προσθήκη κατηγορίας";
		}
		if ($_SESSION['naddc'] == 0) 
		{
			echo "Πρόβλημα, δεν καταχωρήθηκε το όνομα στην προσθήκη κατηγορίας";
		}
	}
	unset($_SESSION['naddc']);
}
if (isset($_SESSION['ydelc'])) {
	if ($_SESSION['ydelc'] == 0)
	{
		echo '<script type="text/javascript">error_message();</script>';
		echo "Πρόβλημα, στην διαγραφή της κατηγορίας";
		unset($_SESSION['ydelc']);
	}
}	
?>
</span>
</div>
	<div class="logo">
		<h3>Κατηγορίες Προϊόντων:</h3>
	</div>
	<div class="row">
		<div class="col-md-12">
			<a href="#add_category" data-toggle="modal" class="pull-right btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Κατηγορία</a>
		</div>
	</div>
	<table class="menutable">
		<thead>
			<th>Εικόνα</th>
			<th>Όνομα Κατηγορίας</th>
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
$con=db_open();
try {
	$sql6 = "SELECT * FROM categories limit $start_from,$num_per_page ";
	$query1 = $con->prepare($sql6);
	$query1->bindParam(':cat_id',$cat_id);
	$query1->bindParam(':cat_image',$cat_image);
	$query1->execute(array(':cat_id' => $cat_id,':cat_image' => $cat_image));
	$result1 = $query1->fetchAll();
	}
	catch (PDOException $e) {
		echo $sql6 . "<br>" . $e->getMessage();
		die();
	}
	foreach((array)$result1 as $row) {
			?>
			<tr>
			<td> <img class="category_image" src="https://zafora.ece.uowm.gr/~ece00592/eBuzzer/includes/category/<?php  echo $row['cat_image']; ?>"  /> </td> 
			<td><?php echo $row['cat_name']; ?></td>
			<td>
			<a href="#edit_category<?php echo $row['cat_id']; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Επεξεργασία</a> || <a href="#delete_category<?php echo $row['cat_id']; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Διαγραφή</a>
			<?php include('../includes/category/showModals.php'); ?>
			</td>
			</tr>
	<?php 
	}	
	if(!$result1)
	{
		$output .= '
		<h4 class="page-header text-center">Δεν υπάρχει καμιά κατοχυρωμένη κατηγορία προϊόντων για υλοποίηση!</h4>';
		echo $output;
	}
	?>
		</tbody>
	</table>
</div>
<?php 
include('../includes/category/showModals.php');
$rs_result=$query1->rowCount();
$total_records=$query1->columnCount();
$total_pages=ceil($total_records/$num_per_page);
if($rs_result!=0)
{
$check=$total_records/$rs_result;
}
?>
<div class="viewpage">
<?php
	if($page>1)
    {
		echo "<a href='category.php?page=".($page-1)."' class='btnview viewbutton '>Προηγούμενη</a>";
    }
  for($i=1;$i<=$total_pages;$i++)
    {
		if($page>1) 
		{
			echo "<a href='category.php?page=".$i."'>".$i."</a>" ;
		}
    }
	if($i>$page) 
	{
		if ($rs_result>=$num_per_page) 
		{
			echo "<a href='category.php?page=".($page+1)."' class='btnview viewbutton'>Επόμενη</a>";
		}
    }
    ?>
</div>  
<?php require_once('../includes/footer2.php'); ?>
</body>
</html>