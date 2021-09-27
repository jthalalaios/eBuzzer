<?php
require_once('../includes/require.php');
$output = '';
$con=db_open();
try 
{	
	$sql2="select * from orders";
	$query2 = $con->prepare($sql2);
	$query2->execute(array());
}
catch(PDOException $e)
{	
	echo $e->getMessage();
}
foreach ($query2->fetchAll() as $row2) 
{
	$id_user=$row2['id_user'];
	$total=$row2['total'];
	$id_order=$row2['order_id'];
	try 
	{	
		$sql1="select first_name,last_name from user WHERE id=:id ";
		$query1 = $con->prepare($sql1);
		$query1->execute(array(':id' => $id_user));
	}
	catch(PDOException $e) 
	{
		echo $e->getMessage();
	}	
	foreach($query1->fetchAll() as $row1) 
	{
		$username=$row1['first_name'];
		$userlastname=$row1['last_name'];
	}
?>
<div class="modal fade" id="details<?php echo $row2['order_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Πληροφορίες Παρραγελίας</h4></center>
            </div>
            <div class="modal-body" id="modal_body">
                <div class="container-fluid">
                    <h5>Χρήστης: <b><?php echo $username; ?></b> <b><?php echo $userlastname; ?></b>
                        <span class="pull-right">
                            <?php echo date('M d, Y h:i A', strtotime($date)) ?>
                        </span>
                    </h5>
                    <table class="table table-bordered table-striped">
                        <thead>
							<th>Κωδικός Παραγγελίας</th>
                            <th>Όνομα Προϊόντος</th>
                            <th>Τιμή</th>
                            <th>Ποσότητα</th>
                            <th>Yλικά</th>
                        </thead>
                        <tbody>
                            <?php	
								try 
								{
                                $sql3="select * from purchase inner join product on product.product_id =purchase.id_prod where  id_order=:id_order ";
								$query3 = $con->prepare($sql3);
								$query3->execute(array(':id_order' =>$id_order));
								}
								catch(PDOException $e)
								{	
									echo $e->getMessage();
								}	
								$output = '';
                                foreach($query3->fetchAll() as $row3) 
								{
								    $output .= '	
                                    <tr>
										<td>'.$row3['id_order'].'</td>
                                        <td>'.$row3['product_name'].'</td>
                                        <td class="text-right">'.number_format($row3['value'], 2).'€</td>
                                        <td>'.$row3['posothta'].'</td>
                                        <td class="text-right">'.$row3['details'].'</td>
                                    </tr>
									';
                                }
								$output .= '
								<tr>
                                <td colspan="1" class="text-right"><b>Σύνολο</b></td>
                                <td class="text-right">'.number_format($total, 2).'€ </td>
								</tr>
                        </tbody>
							';	
						echo $output;
						?>
					</table>
                </div>
                <h4 class="alert-info_yes ">Η παραγγελία του χρήστη:<?php echo $row2['id_user']; ?> με το νούμερο:<?php echo $row['order_id']; ?> βρίσκεται σε εξέλιξη!
				</h4>
	
				<div class="alert-info_yes ">
				<h4>Επιλέξτε ID, από τα διαθέσιμες πλακέτες esp8266:</h4>
					<form method="POST" name="finish_order" action="sendSalesDataFromView.php" enctype="multipart/form-data">
					<input type="hidden"  name="order_id_info" value="<?php echo $id_order;?>" >
					<input type="hidden"  name="user_id_info" value="<?php echo $id_user;?>" >
				
						<select class="selection_sales" id="esp_id_info" name="esp_id_info">
						   
                            <?php
								try {
									$etoimothta=1;
									$sql0 = "SELECT * FROM esp where available=:available";
									$query0 = $con->prepare($sql0);
									$query0->execute(array(':available'=>$etoimothta));
									$result0 = $query0->fetchAll();
									}
								catch(PDOException $e)
									{
									echo $sql0 . "<br>" . $e->getMessage();
									die();
									}
                                    foreach($result0 as $row0) 
									{   ?>
										<option value="<?php echo $row0['id_esp']; ?>"><?php echo $row0['id_esp']; ?></option>
                                        <?php
                                    }
                                    ?>
					</select></div>
			</div>
            <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Κλείσιμο</button>
					<button type="submit"class="btn btn-success"><span class="glyphicon glyphicon-ok"></span>Ολοκλήρωση</button>
			    </form>
			</div>
        </div>
    </div>
</div>
<?php
}
?>
