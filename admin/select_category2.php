<div class="orderlist">
<?php
require_once ('../includes/js/item.js');
require_once ('../includes/js/getValue.js');
$con=db_open();
$output = '';
			$sql = "SELECT * FROM categories";
			$query1 = $con->prepare($sql);
			$query1->execute(array());
			$count = $query1->fetchAll();
		
 foreach($count as $row)
 {
  $output .= '
  <table class="imagetable">  
			<tr>
			<td>
			<form id="order" name="order" action="select_product.php" method="post">
			<input name="Submit" type="image" src="../includes/category/'.$row["cat_image"].'" value="id" class="imagetable"  onclick="return setHidden("id");"/>  </td>
			<h4 class="text-info">'.$row["cat_name"].'</h4> 
		   </tr> <tr><td> 
		   <input type="hidden" id="image_id" name="image_name" value="'.$row["cat_id"].'" /> 
			</form>
			</td>
			</tr>
            </table> 
  ';
 }
 echo $output;
require_once('../includes/modal_left_right.php');
?>	
</div>