<!-- Edit Product -->
<div class="modal fade" id="editproduct<?php echo $row['product_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Επεξεργασία Προϊόντος</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="../includes/product/editproduct2.php?product=<?php echo $row['product_id']; ?>" enctype="multipart/form-data">
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
                                <input type="file" name="photo">
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
<div class="modal fade" id="deleteproduct<?php echo $row['product_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Διαγραφή Προϊόντος</h4></center>
            </div>
            <div class="modal-body">
                <h3 class="text-center"><?php echo $row['product_name']; ?></h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Κλείσιμο</button>
                <a href="../includes/product/deleteproduct.php?product=<?php echo $row['product_id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Ναι</a>
                </form>
            </div>
        </div>
    </div>
</div>