<?php
session_start();
$total_price = 0;
$total_item = 0;

$output = '
<div class="table-responsive" id="order_table">
	<table class="table table-bordered table-striped">
		<tr>  
            <th>Όνομα Προϊόντος</th>  
            <th>Ποσότητα</th>  
            <th>Τιμή</th>  
            <th>Σύνολο</th>  
            <th>Ενέργειες</th>  
			<th>Υλικά</th>  
        </tr>
';
if(!empty($_SESSION["shopping_cart"]))
{
	foreach($_SESSION["shopping_cart"] as $keys => $values)
	{
		$output .= '
		<tr>
			<td>'.$values["product_name"].'</td>
			<td>'.$values["product_quantity"].'</td>
			<td align="right">'.number_format($values["product_price"],2).'€</td>
			<td align="right">'.number_format($values["product_quantity"] * $values["product_price"], 2).'€</td>
			<td><button name="delete" class="btn btn-danger btn-xs delete" id="'. $values["product_id"].'">Διαγραφή</button></td>
			<td colspan="5">'.$values["product_checkvalue"].'</td>	
		</tr>
		
		';
		$total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
		$total_item = $total_item + 1;
	}
	$output .= '
	<tr> 	
        <td colspan="3">Σύνολο</td>  
        <td align="right"> '.number_format($total_price, 2).'€</td>  
        <td></td>  
    </tr>
	';
}
else
{
	$output .= '
    <tr>
    	<td colspan="5">
    		Το καλάθι σας είναι άδειο!
    	</td>
    </tr>
    ';
}
$output .= '</table></div>';
$data = array(
	'cart_details'		=>	$output,
	'total_price'		=>	'€'.number_format($total_price,2),
	'total_item'		=>	$total_item 
);	
echo json_encode($data);
?>