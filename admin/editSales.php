	<div class="modal fade" id="edit_sales<?php echo $row['order_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
		<form method="POST" name="finish-order" action="sendSalesData.php" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<center><h3 class="modal-title" id="myModalLabel">Κατάσταση Παραγγελίας:</h3></center>
				</div>
            <div class="modal-body">
                <h4 class="alert-info_yes">Η παραγγελία του χρήστη:<?php echo $row['id_user']; ?> με το νούμερο:<?php echo $row['order_id']; ?> βρίσκεται σε εξέλιξη!
				</h4>
				<h4 class="text-center">
				Επιθυμείτε να ολοκληρωθεί?
				</h4>
					
				<div class="alert-info_yes">
				<h4>Επιλέξτε ID, από τα διαθέσιμες πλακέτες esp8266:</h4>
					<input type="hidden"  name="order_id" value="<?php echo $row['order_id'];?>" >
					<input type="hidden"  name="user_id" value="<?php echo $row['id_user'];?>" >
				
						<select class="selection_sales"  id="esp_id" name="esp_id">
						   
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
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Κλείσιμο</button>
                <button type="submit"class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Ναι</button>
			   </form>
            </div>
        </div>
    </div>
</div>