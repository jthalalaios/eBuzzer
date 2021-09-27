<?php
$con=db_open();
$output = '';
if(isset($_SESSION['who']))
{
$searchq =$_SESSION['who'];
$sql = "SELECT id,first_name,last_name,username,type,email,address,telephone  FROM user   WHERE  id = :id ";
$get_name = $con->prepare($sql); 
$get_name->execute(array('id'=>$searchq));
$count=$get_name->fetchALL();
echo '<br>';
if($count!=$get_name->fetchALL() )
{

 $output .= '
        <table class="table table-striped table-bordered">
    <tr>
     <th>Όνομα</th>
     <th>Επώνυμο</th>
     <th>Username</th>
	 <th>Διεύθυνση</th>
	 <th>Ηλ/Ταχυδρομείο</th>
	 <th>Τηλέφωνο</th>
	 <th>Ενέργειες</th> 
    </tr>
	
 ';
 foreach($count as $row) 
 {
  $output .= '
   <tr>
    <td>'.$row["first_name"].'  </td>
    <td>'.$row["last_name"].'
	<td>'.$row["username"].'</td>
	<td>'.$row["address"].'</td>
	<td>'.$row["email"].'</td>
	<td>'.$row["telephone"].'</td>
	<td><a href="#edituser'.$row['id'].'" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Επεξεργασία</a> </td>
   </tr>
  ';
}
echo $output;

}
else
{
 echo "Δεν βρέθηκε ο χρήστης";
}
include('../includes/edits/showModalEditUser.php'); 
require_once('../includes/js/validate.js'); 
$con=null;
}
?>



