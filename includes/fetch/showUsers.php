<?php
$con=db_open();
$num_per_page=7;
if(isset($_GET["page"]))
{
	$page=filter_var($_GET["page"],FILTER_SANITIZE_NUMBER_INT);
}
else
{
	$page=1;
}
$start_from=($page-1)*7;
try
{	
 $sql1 = "SELECT * FROM user";
 $query=$con->prepare($sql1);
 $query->execute(array());
 $run=$query->fetchAll();
}
catch(PDOException $e)
{
 echo $e->getMessage();
}
$output = '';
if($run!=$query->fetchALL() )
{
 $output .= '
    <table class="table table-striped table-bordered">
    <tr>
     <th>Όνομα</th>
     <th>Επώνυμο</th>
     <th>Username</th>
	 <th>Δικαιώματα</th>
	 <th>Διεύθυνση</th>
	 <th>Ηλ/Ταχυδρομείο</th>
	 <th>Τηλέφωνο</th>
	 <th>Ενέργειες</th>	  
    </tr>
 ';
 foreach($run as $row) 
 {
	 $id_new=$row['id'];
  $output .= '
   <tr>
    <td>'.$row["first_name"].'  </td>
    <td>'.$row["last_name"].'
	<td>'.$row["username"].'</td>
	<td>'.$row["type"].'</td>
	<td>'.$row["address"].'</td>
	<td>'.$row["email"].'</td>
	<td>'.$row["telephone"].'</td>
	<td><a href="#edit_users'.$row['id'].'" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Επεξεργασία</a> || <a href="#delete_users'.$row['id'].'" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-pencil"></span> Διαγραφή</a> </td>
	</tr>
  ';
 }
 echo $output;
 echo '</table>';
}
else
{
 echo "Δεν βρέθηκε κανένας χρήστης";
}
require_once('../includes/edits/showModalUsers.php');
$rs_result=$query->rowCount();
$total_records=$query->columnCount();
$total_pages=ceil($total_records/$num_per_page);
$con=null;
?>
 



