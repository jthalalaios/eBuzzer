<?php
require_once ('../includes/js/item.js');
require_once ('../includes/js/getValueProduct.js');
$con=db_open();
$id=filter_var($_POST["image_name"]);
?>
<div class="orderlist">
<?php	
 	$where = "WHERE product.product_cat_id = $id";
	$output = '';
					$sql2="select * from product left join categories on product.product_cat_id=categories.cat_id $where  order by product.product_id asc, product_name asc";
					$query2 = $con->prepare($sql2);
					$query2->bindParam(':product_id',$product_id );
					$query2->bindParam(':product_name',$product_name);
					$query2->bindParam(':product_cat_id',$product_cat_id);
					$query2->bindParam(':quantity',$quantity);
					$query2->bindParam(':value',$value);
					$query2->bindParam(':image',$image);
					$query2->execute(array(':product_id'=>$product_id,':product_name'=>filter_var($product_name),':product_cat_id'=>$product_cat_id,':quantity' => $quantity,':value' => $value,':image' => $image));
					$count1=$query2->fetchAll();
foreach($count1 as $row)
 {
  $output .= '
  <table class="imagetable">  
            <form id="order" name"order" action="add_product.php" method="post">
			<tr>
			<td>
            <input name="Submit" type="image" src="../includes/product/'.$row["image"].'" value="id" class="imagetable"  onclick="return setHidden2("id");"/>     </td><br/>
            <h4 class="text-info">'.$row["product_name"].'</h4> 
            </tr> <tr><td>   <input type="hidden" id="product_id" name="product_name" value="'.$row["product_id"].'" /> </td>
			</form>
			</tr>
            </table> 	
  ';
 }
 echo $output;
 require_once('../includes/modal_left_right.php');
?>	

 
	