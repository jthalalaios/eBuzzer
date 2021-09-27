<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<div class="modal fade" id="edit_esp<?php echo $row['id_esp']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Επεξεργασία Πλακέτας ID: <?php echo $row['id_esp']; ?></h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="../includes/esp/editEsp.php" enctype="multipart/form-data">
                    <div class="form-group" >
                        <div class="row">
							<input type="hidden"  name="id" value="<?php echo $row['id_esp']; ?>"</ >
						</div>
					<div class="form-group">
						<div class="row">
                            <div class="col-md-3" >
                            <label class="control-label">Εικόνα:</label>
                            </div>
                            <div class="col-md-9">
                            <input type="file" name="photo" class="form-control">
                            </div>
                        </div>
                    </div>
						<div class="form-group" >
						<div class="row">
							<div class="col-md-3" >
                            <label class="control-label">Διαθεσιμότητα:
                            </div>
							  
                          <div class="col-md-9">
								    <select class="form-control"  id="available_edit" name="available_edit">
                                    <?php
									try {
										$sql5 = "SELECT * FROM esp";
										$query5 = $con->prepare($sql5);
										$query5->execute(array());
										$result1 = $query5->fetchAll();
										}
									catch(PDOException $e)
										{
										echo $sql5 . "<br>" . $e->getMessage();
										die();
										}
                                    for($i=0; $i<=1; $i++) {
                                            if ($i==0){	
											?>
                                            <option value="0">0 - Μη Διαθέσιμο</option>
                                            <?php }
											if ($i==1){	
											?>
											<option value="1">1 - Διαθέσιμο</option>
											<?php }
										 }
                                    ?>
                                </select>
								</div>
							</div>
						</div>  </div></label>
						</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Κλείσιμο</button>
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Ενημέρωση</button>
                </form>
            </div>
        </div>
    </div>
</div></div>
<div class="modal fade" id="add_esp" tabindex="-1" role="dialog" aria-labelledby="add_esp" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="add_esp">Δημιουργία Νέας Πλακέτας</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="../includes/esp/addEsp.php" enctype="multipart/form-data">
					<div class="form-group" >
						<div class="row">
							<div class="col-md-3" >
                            <label class="control-label">Εικόνα:</label>
                            </div>
                            <div class="col-md-9">
                            <input type="file" name="photo" id="photo" class="form-control" required>
                            </div>
						</div>
                    </div>
				<div class="form-group" >
						<div class="row">
							<div class="col-md-3" >
                            <label class="control-label">Διαθεσιμότητα:
                            </div>
							  
                          <div class="col-md-9">
								    <select class="form-control"  id="available" name="available" required>
                                    <?php
                                    for($i=0; $i<=1; $i++) {
                                            if ($i==0){	
											?>
                                            <option value="0">0 - Μη Διαθέσιμο</option>
                                            <?php }
											if ($i==1){	
											?>
											<option value="1">1 - Διαθέσιμο</option>
											<?php }
										 }
                                    ?>
                                </select>
								</div>
							</div>
						</div>  </div></label>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Κλείσιμο</button>
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Αποθήκευση</button>
                </form>
            </div>
        </div>
    </div>
</div></div>
<div class="modal fade" id="delete_esp<?php echo $row['id_esp']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
	<form method="POST" action="../includes/esp/deleteEsp.php" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Διαγραφή Κατηγορίας ID: <?php echo $row['id_esp']; ?></h4></center>
            </div>
            <div class="modal-body">
                <h3 class="text-center"><?php echo $row['id_esp']; ?></h3>
					<input type="hidden"  name="id_esp" value="<?php echo $row['id_esp']; ?>" >
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Κλείσιμο</button>
                <button type="submit"class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Ναι</button>
			   </form>
            </div>
        </div>
    </div>
</div>