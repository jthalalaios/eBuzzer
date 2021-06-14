<?php
$output = '';
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
	$sql2="select history.* from history WHERE idh_user=:idh_user Group BY order_id ";
	$query2 = $con->prepare($sql2);
	$query2->execute(array(':idh_user' => $who));
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
                                $sql3="select * from history inner join product on product.product_id =history.idh_prod where  order_id=:order_id ";
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
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Κλείσιμο</button>
            </div>
        </div>
    </div>
</div>
<?php
}
?>