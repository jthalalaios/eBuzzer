<?php
$con=db_open();
$output = '';
			$sql = "SELECT * FROM categories";
			$query1 = $con->prepare($sql);
			$query1->bindParam(':cat_id',$cat_id);
			$query1->execute(array(':cat_id' => $cat_id));
			$count = $query1->fetchAll();
			
foreach($count as $row)
 {
  $output .= '
  <table class="imagetable;">  
			<tr>
			<td>
			<form id="order" name="order" action="selectProduct.php" method="post">
			<input name="Submit" type="image" src="../includes/category/'.$row["cat_image"].'" value="id" class="list-category"  onclick="return setHidden("id");"/>  
			<h5 class="text-info">'.$row["cat_name"].'</h5> 
		  </td> </tr> <tr><td> 
		   <input type="hidden" id="image_id" name="image_name" value="'.$row["cat_id"].'" /> 
			</form>
			</td>
			</tr>
            </table> 
  '; 
 }
 echo $output;
if ($output==null) { 
	echo "Δεν Υπάρχει Κανένα Προιον σε αυτήν την Κατηγορία!";
}
?>	