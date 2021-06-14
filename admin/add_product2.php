<?php
require_once ('../includes/js/item.js');
require_once ('../includes/js/getValueProduct.js');
require_once ('../includes/js/count.js');
$con=db_open();
$id=filter_var($_POST["product_name"]);	
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<script src="../includes/js/bootstrap.min.js"></script>
<script src="../includes/js/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="orderlist">
	<?php
 	$where = "WHERE product.product_id = $id";
	$output = '';
					$sql2="select * from product left join categories on product.product_cat_id=categories.cat_id $where  order by product.product_id asc, product_name asc";
					$query2 = $con->prepare($sql2);
					$query2->bindParam(':product_id',$product_id );
					$query2->bindParam(':product_name',$product_name);
					$query2->bindParam(':product_cat_id',$product_cat_id);
					$query2->bindParam(':value',$value);
					$query2->bindParam(':image',$image);
					$query2->execute(array(':product_id'=>$product_id,':product_name'=>filter_var($product_name),':product_cat_id'=>$product_cat_id,':value' => $value,':image' => $image));
					$count1=$query2->fetchAll();
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
								<div class="close-btn" onclick="togglePopup()">&times;</div>
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
 require_once('../includes/modal_left_right.php');
?>			
		</div>