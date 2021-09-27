<!-- Add Product -->
<div class="modal fade" id="add_product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Εισαγωγή Προϊόντος</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="../includes/product/addProduct.php" enctype="multipart/form-data">
                    <div class="form-group" style="auto;">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:auto;">
                                <label class="control-label">Όνομα Προϊόντος:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="pname1" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:auto;">
                                <label class="control-label">Κατηγορία:</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control" name="category1">
                                    <?php
									try {
										$sql5 = "SELECT * FROM categories ";
										$query5 = $con->prepare($sql5);
										$query5->execute(array());
										$result1 = $query5->fetchAll();
										}
									catch(PDOException $e)
										{
										echo $sql5 . "<br>" . $e->getMessage();
										die();
										}
                                    foreach((array)$result1 as $row1) {
                                            ?>
                                            <option value="<?php echo $row1['cat_id']; ?>"><?php echo $row1['cat_name']; ?></option>
                                            <?php
										 }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:auto;">
                                <label class="control-label">Τιμή:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="price1" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:auto;">
                                <label class="control-label">Εικόνα:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="file"class="form-control" name="photo1">
                            </div>
                        </div>
                    </div>
                </div>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Κλείσιμο</button>
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Αποθήκευση</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Edit Product -->
<div class="modal fade" id="edit_product<?php echo $row['product_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Επεξεργασία Προϊόντος ID: <?php echo $row['product_id']; ?></h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="../includes/product/editProduct.php?product=<?php echo $row['product_id']; ?>" enctype="multipart/form-data">
                    <div class="form-group" style="margin-top:auto;">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="control-label">Όνομα Προϊόντος:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="<?php echo $row['product_name']; ?>" name="pname">
                            </div>
							
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="control-label">Κατηγορία:</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control" name="category">
                                    <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></option>
                                    <?php
										$con=db_open();
                                        $sql3="select * from categories where cat_id =:cat_id ";
										$val= ! $row['cat_id'];
										$query3 = $con->prepare($sql3);
										$query3->bindParam(':cat_id',$cat_id );
                                        $query3->execute(array(':cat_id' => $val));

                                        foreach($query3->fetchALL() as $row2){
                                            ?>
                                            <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div> 
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" >
                                <label class="control-label">Τιμή:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="<?php echo $row['value']; ?>" name="price">
                            </div>
                        </div>
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
                </div>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Κλείσιμο</button>
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Ενημέρωση</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Delete Product -->
<div class="modal fade" id="delete_product<?php echo $row['product_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Διαγραφή Προϊόντος ID: <?php echo $row['product_id']; ?> </h4></center>
            </div>
            <div class="modal-body">
                <h3 class="text-center"><?php echo $row['product_name']; ?></h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Κλείσιμο</button>
                <a href="../includes/product/deleteProduct.php?product=<?php echo $row['product_id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Ναι</a>
                </form>
            </div>
        </div>
    </div>
</div>