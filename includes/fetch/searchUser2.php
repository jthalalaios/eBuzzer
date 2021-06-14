<?php
require_once ('../require.php');
$con=db_open();
$output = '';
if(isset($_POST["query"]))
{
 $searchq = htmlspecialchars(filter_var($_POST["query"]));
 $sql = "SELECT id,type,first_name,last_name,username,type,email,address,telephone  FROM user   WHERE (username LIKE concat(:username,'%') OR first_name LIKE concat(:first_name,'%') OR last_name LIKE concat(:last_name,'%'))  ";
 $get_name = $con->prepare($sql); 
 $get_name->execute(array('username'=>filter_var($searchq),'first_name'=>filter_var($searchq),'last_name'=>filter_var($searchq)));
 $count=$get_name->fetchALL();
echo '<br>';
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
	<td><a href="#editUserNew'.$row['id'].'" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Επεξεργασία</a> || <a href="#deleteUser" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-pencil"></span> Διαγραφή</a> </td>
   </tr>
  ';
}
echo $output;
 
}
else
{
 echo "Δεν βρέθηκε κανένας χρήστης";
}
require_once('../edits/editUser3.php');
require_once('../js/validate2.js'); 
$con=null;
}
?>



