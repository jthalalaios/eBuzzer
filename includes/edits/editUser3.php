<?php require_once('../js/validate2.js'); ?>
<div class="modal fade" id="editUserNew<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Επεξεργασία στοιχείων χρήστη:</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form id="reg3" name="reg3" method="post" action="../includes/edits/editUser4.php" onsubmit="return validate2()" enctype="multipart/form-data">
						<div class="form-group" >
							<div class="row">
								<div class="col-md-4" >
                                <label class="control-label">Όνομα:</label>
								</div>
								<div class="col-md-8">
                                <input type="text" class="form-control" value="<?php echo $row['first_name']; ?>" name="uname">
								</div>
							</div>
						</div>
					    <div class="form-group" >
							<div class="row">
								<div class="col-md-4" >
                                <label class="control-label">Επώνυμο:</label>
								</div>
								<div class="col-md-8">
                                <input type="text" class="form-control" value="<?php echo $row['last_name']; ?>" name="fullname">
								</div>
							</div>
						</div>
					    <div class="form-group" >
							<div class="row">
								<div class="col-md-4" >
                                <label class="control-label">Username:</label>
								</div>
								<div class="col-md-8">
                                <input type="text" class="form-control" value="<?php echo $row['username']; ?>" name="username">
								</div>
							</div>
						</div>
					  <div class="form-group" >
							<div class="row">
								<div class="col-md-4" >
                                <label class="control-label">Δικαιώματα:</label>
								</div>
								<div class="col-md-8">
                                <input type="text" class="form-control" value="<?php echo $row['type']; ?>" name="rights">
								</div>
							</div>
						</div>
					   <div class="form-group" >
							<div class="row">
								<div class="col-md-4" >
                                <label class="control-label">Ηλ/Ταχυδρομείο:</label>
								</div>
								<div class="col-md-8">
                                <input type="text" class="form-control" value="<?php echo $row['email']; ?>" name="mail">
								</div>
							</div>
						</div>
					    <div class="form-group" >
							<div class="row">
								<div class="col-md-4" >
                                <label class="control-label">Διεύθυνση:</label>
								</div>
								<div class="col-md-8">
                                <input type="text" class="form-control" value="<?php echo $row['address']; ?>" name="address">
								</div>
							</div>
						</div>
					    <div class="form-group" >
							<div class="row">
								<div class="col-md-4" >
                                <label class="control-label">Τηλέφωνο:</label>
								</div>
								<div class="col-md-8">
                                <input type="text" class="form-control" value="<?php echo $row['telephone']; ?>" name="phone">
								</div>
							</div>
						</div>
				</div>
			</div>
           <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Κλείσιμο</button>
                <button type="SUBMIT" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span>Ενημέρωση</button>
               </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
	<form method="POST" action="../../includes/edits/deleteuser.php" enctype="multipart/form-data">
        <div class="modal-content">
			<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Διαγραφή Χρήστη</h4></center>
            </div>
            <div class="modal-body">
                <h3 class="text-center"><?php echo " ID:",$row['id']," ", "Ονοματεπώνυμο:"," ", $row['first_name']," ", $row['last_name']; ?></h3>
				<input type="hidden"  name="id2" value="<?php echo $row['id'];?>" >
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Κλείσιμο</button>
                <button type="submit"class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Ναι</button>
			   </form>
            </div>
        </div>
    </div>
</div>