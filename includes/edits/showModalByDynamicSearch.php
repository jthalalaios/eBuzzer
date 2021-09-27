<?php
 foreach($count as $row) 
 {
?>
<div class="modal fade" id="edit_user_dynamic<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Επεξεργασία στοιχείων χρήστη: <?php echo $row['id']; ?></h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form id="edit_users_form_id_dynamic" name="edit_users_form_dynamic" action="../includes/edits/editUsersByDynamicModal.php" method="POST"   enctype="multipart/form-data">
						<div class="form-group" >
							<div class="row">
								<div class="col-md-4" >
                                <label class="control-label">Όνομα:</label>
								</div>
								<div class="col-md-8">
								 <input type="hidden"  class="form-control" value="<?php echo $row['id']; ?>" form="edit_users_form_id_dynamic" name="id_dynamic" id="id_dynamic">
                                <input type="text" class="form-control" value="<?php echo $row['first_name']; ?>" form="edit_users_form_id_dynamic" id="uname_dynamic" name="uname_dynamic">
								</div>
							</div>
						</div>
					    <div class="form-group" >
							<div class="row">
								<div class="col-md-4" >
                                <label class="control-label">Επώνυμο:</label>
								</div>
								<div class="col-md-8">
                                <input type="text" class="form-control" value="<?php echo $row['last_name']; ?>" form="edit_users_form_id_dynamic" id="fullname_dynamic" name="fullname_dynamic">
								</div>
							</div>
						</div>
					    <div class="form-group" >
							<div class="row">
								<div class="col-md-4" >
                                <label class="control-label">Username:</label>
								</div>
								<div class="col-md-8">
                                <input type="text" class="form-control" value="<?php echo $row['username']; ?>" form="edit_users_form_id_dynamic" id="username_dynamic" name="username_dynamic">
								</div>
							</div>
						</div>
					     <div class="form-group" >
							<div class="row">
								<div class="col-md-4" >
                                <label class="control-label">Δικαιώματα:</label>
								</div>
								<div class="col-md-8">
								    <select class="form-control" form="edit_users_form_id_dynamic" id="rights_dynamic" name="rights_dynamic">
                                    <?php
                                    for($i=0; $i<=1; $i++) {
                                            if ($i==0){	
											?>
                                            <option value="0">0-Διαχειριστής</option>
                                            <?php }
											if ($i==1){	
											?>
											<option value="1">1-Χρήστης</option>
											<?php }
										 }
                                    ?>
                                </select>
								</div>
							</div>
						</div>
					    <div class="form-group" >
							<div class="row">
								<div class="col-md-4" >
                                <label class="control-label">Ηλ/Ταχυδρομείο:</label>
								</div>
								<div class="col-md-8">
                                <input type="text" class="form-control" value="<?php echo $row['email']; ?>" form="edit_users_form_id_dynamic" id="mail_dynamic" name="mail_dynamic">
								</div>
							</div>
						</div>
					    <div class="form-group" >
							<div class="row">
								<div class="col-md-4" >
                                <label class="control-label">Διεύθυνση:</label>
								</div>
								<div class="col-md-8">
                                <input type="text" class="form-control" value="<?php echo $row['address']; ?>" form="edit_users_form_id_dynamic" id="address_dynamic" name="address_dynamic">
								</div>
							</div>
						</div>
					    <div class="form-group" >
							<div class="row">
								<div class="col-md-4" >
                                <label class="control-label">Τηλέφωνο:</label>
								</div>
								<div class="col-md-8">
                                <input type="text" class="form-control" value="<?php echo $row['telephone']; ?>" form="edit_users_form_id_dynamic" id="phone_dynamic" name="phone_dynamic">
								</div>
							</div>
						</div>
                </div>
			
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Κλείσιμο</button>
                <button type="submit" id="edit_button_dynamic" form="edit_users_form_id_dynamic" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Ενημέρωση</button>
            </div>
			</form>
			</div>
        </div>
    </div>
</div>
<div class="modal fade" id="delete_user_dynamic<?php echo $row['id'];  ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
	<form method="POST" id="delete_users_form_dynamic" name="delete_users_form_dynamic" action="../includes/edits/deleteUsersFromDynamicSearch.php" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Διαγραφή Χρήστη ID: <?php echo $row['id'];  ?></h4></center>
            </div>
            <div class="modal-body">
                <h3 class="text-center">Όνοματεπώνυμο:<?php echo " ";  echo $row['first_name']; echo " "; echo $row['last_name'];  ?></h3>
					<input type="hidden" form="delete_users_form_dynamic"id="id_del_user_dynamic" name="id_del_user_dynamic" value="<?php echo $row['id']; ?>" >
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Κλείσιμο</button>
                <button type="submit" id="delete_button_dynamic" form="delete_users_form_dynamic"class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Ναι</button>
			   </form>
            </div>
        </div>
    </div>
</div>
<?php
 }
 ?>
<script src="../includes/js/validateDynamicSearchUser.js"></script> 
