<?php
require_once ('../require.php');
$con=db_open();
$output = '';
if(isset($_POST["query"]))
{
 $searchq = htmlspecialchars(filter_var($_POST["query"]));
 $sql = "SELECT id,type,first_name,last_name,username,type,email,address,telephone  FROM user   WHERE (username LIKE concat(:username,'%') OR id LIKE concat(:id,'%')) LIMIT 1  ";
 $get_name = $con->prepare($sql); 
 $get_name->execute(array(':username'=>filter_var($searchq),':id'=>filter_var($searchq)));
 $count=$get_name->fetchALL();

if($count!=$get_name->fetchALL() )
{
 $output .= '
    <table class="mytable">
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
 foreach($count as $row) 
 {
  $output .= '
   <tr>
    <td>'.$row["first_name"].'  </td>
    <td>'.$row["last_name"].'
	<td>'.$row["username"].'</td>
	<td>'.$row["type"].'</td>
	<td>'.$row["address"].'</td>
	<td>'.$row["email"].'</td>
	<td>'.$row["telephone"].'</td>
	<td><a href="#edit_user_dynamic'.$row['id'].'" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Επεξεργασία</a> || <a href="#delete_user_dynamic'.$row['id'].'" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-pencil"></span> Διαγραφή</a> </td>
	</tr>
  ';
 }
 echo $output;
}
else
{
 echo "Δεν βρέθηκε κανένας χρήστης";
}
require_once('../edits/showModalByDynamicSearch.php'); 
}
$con=null;
?>



