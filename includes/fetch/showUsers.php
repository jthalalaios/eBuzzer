<?php

$con=db_open();
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
}
else
{
 echo "Δεν βρέθηκε κανένας χρήστης";
}
require_once('../includes/edits/showModalUsers.php');
$con=null;
?>
 



