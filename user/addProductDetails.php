<?php
require_once ('../includes/js/item.js');
require_once ('../includes/js/getValueProduct.js');
require_once ('../includes/js/count.js');
require_once('../includes/js/cart_message.js');
$con=db_open();	
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<script src="../includes/js/bootstrap.min.js"></script>
<script src="../includes/js/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="orderlist">
<?php
$output = '';
if (isset($_POST["product_name"]))
{
	$id=filter_var($_POST["product_name"]);
}
try
{	
	$sql2="select * from product left join categories on product.product_cat_id=categories.cat_id where product_id=:product_id";
	$query2 = $con->prepare($sql2);
	$query2->execute(array(':product_id'=>$id));
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
			<tr>
			<td>
           <img src="../includes/product/'.$row["image"].'" class="imagetable"  name="hidden_name" value="id" />    </td><br/>
            <h4 class="text-info">'.$row["product_name"].'</h4> 
            </tr> <tr> <td> <h4 class="text-info">Τιμή:'.number_format($row["value"],2).'€ </h4>  </td>
					</tr>
            </table> 	
			  <div class="modalf-center">
					<form action="#" method="post">
						<button type="button" class="btn-" id="minus" onclick="countDown();"><i class="ispan"></i></button>
						<input  type="text" inputmode="decimal"  id="quantity" name="quantity" value="1" onclick="countCheck();" class="form-count">
						<button type="button" class="btnplus" id="plus" onclick="countUp();"><i class="ispan"> </i></button>
						<input type="hidden" name="hidden_id" id="id'.$row["product_id"].'" value="'.$row["product_id"].'" />
						<input type="hidden" name="hidden_name" id="name'.$row["product_id"].'" value="'.$row["product_name"].'" />
						<input type="hidden" name="hidden_price" id="price'.$row["product_id"].'" value="'.$row["value"].'" />
						</form> </div>	
					';
					if ($row["cat_checkvalue"] ==1) {
						$output .= '
						<textarea id="selectedtext" placeholder="Επιλέξτε έξτρα υλικά"></textarea>
							<div class="popup" id="popup-1">
							<div class="overlay"></div>
								<div class="content">
							    <h3>Επιλέξτε υλικά που επιθυμείτε να προσθέσετε:</h3>
								<br></br>
								<div class="checkboxstyle">  
									<label2 for="patata">Πατάτα:
									<input type="checkbox" class="get_value" id="product_val1"  value="Πατάτα" name="product_val1"  /> </label2> 
									<label2 for="ketsap">Κέτσαπ:					 
									<input type="checkbox" class="get_value" value="Κέτσαπ" id="product_val2"  name="product_val2"  /> </label2> 
									<label2 for="moustarda">Μουστάρδα:
									<input type="checkbox" class="get_value" value="Μουστάρδα" id="product_val3" name="product_val3"  /></label2> 
									<label2 for="ntomata">Ντομάτα:
									<input type="checkbox" class="get_value" value="Ντομάτα" id="product_val4" name="product_val4"  /></label2>  
									<label2 for="marouli">Μαρούλι:
									<input type="checkbox" class="get_value" value="Μαρούλι" id="product_val5" name="product_val5"  />  </label2>					
									</div>   
								
								<br>
									<button type="button" class="close btn" onclick="togglePopup()" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Κλείσιμο</button>
							</div>
						</div>
					  <br></br>
					  <button class="btn btn-shop" onclick="togglePopup()">Επιλέξτε Υλικά</button>
					  <input type="button" name="add_to_cart" id="'.$row["product_id"].'" class="btn1 btn-shop add_to_cart" value="Προσθήκη" />
					  ';}
						else {
							$output .= '
							<br>		
							<input type="button" name="add_to_cart" id="'.$row["product_id"].'" class="btn1 btn-shop add_to_cart" value="Προσθήκη" />
						';}
			$output .= '
  ';
 } 
 echo $output;
 require_once('../includes/modalLeftRight.php');
?>			
</div>