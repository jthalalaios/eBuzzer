<?php
require_once ('../includes/js/item.js');
require_once ('../includes/js/getValueProduct.js');
$con=db_open();
?>
<div class="orderlist">
<?php	
if(isset($_POST["image_name"]))
{
	$id=filter_var($_POST["image_name"],FILTER_SANITIZE_NUMBER_INT);
}
$output = '';
try
{
	$sql2="select * from product left join categories on product.product_cat_id=categories.cat_id where product_cat_id=:product_cat_id ";
	$query2 = $con->prepare($sql2);
	$query2->execute(array(':product_cat_id'=>$id));
	$count1=$query2->fetchAll();
}
catch(PDOException $e)
{	
	echo $e->getMessage();
	die();
}	
foreach($count1 as $row)
 {
  $output .= '
  <table class="imagetable">  
            <form id="order" name"order" action="addProduct.php" method="post">
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
 require_once('../includes/modalLeftRight.php');
?>	

 
	