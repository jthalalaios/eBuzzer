<?php
require_once ('../require.php');
$output = '';
try
	{
		$searchq = htmlspecialchars(filter_var($_POST["query"],FILTER_SANITIZE_STRING));
		$sql="select * from orders inner join history on history.history_oder_id =orders.order_id WHERE history_oder_id LIKE concat(:history_oder_id,'%')";
		$query = $con->prepare($sql);
		$query->execute(array(':history_oder_id'=>$searchq));
		$result=$query->fetchALL();
	}
catch(PDOException $e)
	{		
		echo $e->getMessage();
	}
foreach ($result as $row2) 
	{	
		$id_user=$row2['id_user'];
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
<div class="modal fade" id="details_order_dynamic<?php echo $row2['order_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Πληροφορίες Παρραγελίας</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <h5>Χρήστης: <b><?php echo $username; ?></b> <b><?php echo $userlastname; ?> </b>  ID:<b><?php echo $id_user; ?> </b>
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
								try 
								{
                                $sql3="select * from purchase inner join orders on orders.order_id =purchase.id_order  where  id_order=:id_order";
								$query3 = $con->prepare($sql3);
								$query3->execute(array(':id_order' =>$id_order));
								}
								catch(PDOException $e)
								{	
									echo $e->getMessage();
								}
								 foreach($query3->fetchAll() as $row3) 
								{
									$details=$row3['details'];
									$quantity=$row3['posothta'];
								}
								try 
								{
                                $sql4="select * from product inner join purchase on purchase.id_prod =product.product_id  where  id_order=:id_order";
								$query4 = $con->prepare($sql4);
								$query4->execute(array(':id_order' =>$id_order));
								}
								catch(PDOException $e)
								{	
									echo $e->getMessage();
								}
								$output = '';								
                                foreach($query4->fetchAll() as $row4) 
								{
								    $output .= '	
                                    <tr>
                                        <td>'.$row4['product_name'].'</td>
                                        <td class="text-right">'.number_format($row4['value'], 2).'€</td>
                                        <td>'.$quantity.'</td>
                                        <td class="text-right">'.$row4['details'].'</td>
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