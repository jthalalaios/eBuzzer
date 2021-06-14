<?php
$output = '';
$i=0;
try 
{	
 $sql1="select first_name,last_name from user WHERE id=:id ";
 $query1 = $con->prepare($sql1);
 $query1->execute(array(':id' => $who));
}
catch(PDOException $e) {
	echo $e->getMessage();
}	
foreach($query1->fetchAll() as $row1) 
{
	$username=$row1['first_name'];
	$userlastname=$row1['last_name'];
}
try 
{	
	$sql2="select orders.* from orders WHERE id_user=:id_user Group BY order_id ";
	$query2 = $con->prepare($sql2);
	$query2->execute(array(':id_user' => $who));
}
catch(PDOException $e)
{	
	echo $e->getMessage();
}
foreach ($query2->fetchAll() as $row2) 
{
?>
<div class="modal fade" id="details<?php echo $row2['order_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Πληροφορίες Παρραγελίας</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <h5>Χρήστης: <b><?php echo $username; ?></b> <b><?php echo $userlastname; ?></b>
                        <span class="pull-right">
                            <?php echo date('M d, Y h:i A', strtotime($date)) ?>
                        </span>
                    </h5>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>Όνομα Προϊόντος</th>
                            <th>Τιμή</th>
                            <th>Ποσότητα</th>
                            <th>Yλικά</th>
                        </thead>
                        <tbody>
                            <?php	
								$id_order=$row2['order_id'];
								try 
								{
                                $sql3="select * from orders inner join product on product.product_id =orders.id_prod where  order_id=:order_id ";
								$query3 = $con->prepare($sql3);
								$query3->execute(array(':order_id' =>$id_order));
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
                                <td class="text-right">'.number_format($row3['total'], 2).'€ </td>
								</tr>
                        </tbody>
							';	
						echo $output;
						?>
					</table>
                </div>
			</div>
            <div class="modal-footer">
				<form method="POST" name="finish_order" action="edit_sales2.php" enctype="multipart/form-data">
					<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Κλείσιμο</button>
					<button type="submit"class="btn btn-success"><span class="glyphicon glyphicon-ok"></span>Ολοκλήρωση</button>
					<input type="hidden"  name="id-order" value="<?php echo $id_order;?>" >
			    </form>
			</div>
        </div>
    </div>
</div>
<?php
}
?>