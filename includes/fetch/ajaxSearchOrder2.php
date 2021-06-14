<?php
require_once ('../require.php');
$con=db_open();
$output = '';
if(isset($_POST["query"]))
{
$searchq = htmlspecialchars(filter_var($_POST["query"]));
$sql = "SELECT *  FROM history   WHERE s_date LIKE concat(:s_date,'%')   ";
$get_name = $con->prepare($sql); 
$get_name->execute(array('s_date'=>filter_var($searchq)));
$count=$get_name->fetchALL();
echo '<br>';
if($count!=$get_name->fetchALL() )
{

 $output .= '
        <table class="mytable">
    <tr>
	<th>Ημ/νία</th>
     <th>ID-Χρήστη</th>
     <th>ID-Προιόντος</th>
     <th>Ποσότητα</th>
	   <th>Σύνολο</th>
    </tr>
	
 ';
 foreach($count as $row) 
 {
  $output .= '
   <tr>
	<td>'.$row["s_date"].'</td>
    <td>'.$row["idh_user"].'  </td>
    <td>'.$row["idh_prod"].'
	 <td>'.$row["posothta"].'</td>
	 <td>'.$row["total"].'€</td>
   </tr>
  ';
  
 

 
}
echo $output;
 
}
else
{
 echo "Σφάλμα αναζήτησης Παραγγελίας";
}

$con=null;
}
?>



