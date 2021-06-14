<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<div class="modal fade" id="editcategory<?php echo $row['cat_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Επεξεργασία Κατηγορίας:</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="../includes/category/editcategory2.php?category=<?php echo $row['cat_id']; ?>" enctype="multipart/form-data">
                    <div class="form-group" >
                        <div class="row">
                            <div class="col-md-3" >
                            <label class="control-label">Όνομα Κατηγορίας:</label>
                            </div>
                            <div class="col-md-9">
                            <input type="text" class="form-control" value="<?php echo $row['cat_name']; ?>" name="cname2">
							<input type="hidden"  name="id" value="<?php echo $row['cat_id'];?>" >
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
						<div class="form-group" >
						<div class="row">
							<div class="col-md-3" >
                            <label class="control-label">Είναι Φαγόσιμο?:
                            </div>
							  
                            <div class="col-md-9">
                          <input type="checkbox" class="form-control2" id="cat_checkbox" name="cat_checkbox" value="1">
                            </div></label>
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
<div class="modal fade" id="addcategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Δημιουργία Νέας Κατηγορίας</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="../includes/category/addcategory.php" enctype="multipart/form-data">
                    <div class="form-group" >
                        <div class="row">
                            <div class="col-md-3" >
                            <label class="control-label">Όνομα Κατηγορίας:</label>
                            </div>
                            <div class="col-md-9">
                            <input type="text" class="form-control" name="cname" required>
                            </div>
                        </div>
                    </div>
					<div class="form-group" >
						<div class="row">
							<div class="col-md-3" >
                            <label class="control-label">Εικόνα:</label>
                            </div>
                            <div class="col-md-9">
                            <input type="file" name="photo" class="form-control" required>
                            </div>
						</div>
                    </div>
					<div class="form-group" >
						<div class="row">
							<div class="col-md-3" >
                            <label class="control-label">Είναι Φαγόσιμο?:
                            </div>
							  
                            <div class="col-md-9">
                          <input type="checkbox" class="form-control2" id="cat_checkbox" name="cat_checkbox" value="1">
                            </div>
							</label>
						</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Κλείσιμο</button>
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Αποθήκευση</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deletecategory<?php echo $row['cat_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
	<form method="POST" action="../includes/category/deletecategory.php" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Διαγραφή Κατηγορίας</h4></center>
            </div>
            <div class="modal-body">
                <h3 class="text-center"><?php echo $row['cat_name']; ?></h3>
					<input type="hidden"  name="id2" value="<?php echo $row['cat_id'];?>" >
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Κλείσιμο</button>
                <button type="submit"class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Ναι</button>
			   </form>
            </div>
        </div>
    </div>
</div>