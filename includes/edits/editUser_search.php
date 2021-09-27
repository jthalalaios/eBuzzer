<?php 
require_once ('../require.php');
foreach($run as $row) 
 {
 ?> 
<div class="modal fade" id="editUserNew_search<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editUserNew" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Επεξεργασία στοιχείων χρήστη:</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form id="reg3" name="reg3" method="post" action="../includes/edits/editUser5.php" enctype="multipart/form-data">
							<div class="form-group" >
							<div class="row">
								<div class="col-md-4" >
                                <label class="control-label">Όνομα:</label>
								</div>
								<div class="col-md-8">
								  <input type="hidden" class="form-control" form="reg3" value="<?php echo $row['id']; ?>" id="id2" name="id2">
                                <input type="text" form="reg3" class="form-control" value="<?php echo $row['first_name']; ?>" id="uname2" name="uname2">
								</div>
							</div>
						</div>
					    <div class="form-group">
							<div class="row">
								<div class="col-md-4" >
                                <label class="control-label">Επώνυμο:</label>
								</div>
								<div class="col-md-8">
                                <input type="text" class="form-control" form="reg3" value="<?php echo $row['last_name']; ?>" id="fullname2"name="fullname2">
								</div>
							</div>
						</div>
					    <div class="form-group" >
							<div class="row">
								<div class="col-md-4" >
                                <label class="control-label">Username:</label>
								</div>
								<div class="col-md-8">
                                <input type="text" class="form-control" form="reg3" value="<?php echo $row['username']; ?>" id="username2" name="username2">
								</div>
							</div>
						</div>
					  <div class="form-group" >
							<div class="row">
								<div class="col-md-4" >
                                <label class="control-label">Δικαιώματα:</label>
								</div>
								<div class="col-md-8">
								    <select class="form-control" form="reg3" name="rights2">
                                    <?php
									try {
										$sql5 = "SELECT * FROM user";
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
                                <input type="text" class="form-control" form="reg3" value="<?php echo $row['email']; ?>" id="mail2" name="mail2">
								</div>
							</div>
						</div>
					    <div class="form-group" >
							<div class="row">
								<div class="col-md-4" >
                                <label class="control-label">Διεύθυνση:</label>
								</div>
								<div class="col-md-8">
                                <input type="text" class="form-control" form="reg3" value="<?php echo $row['address']; ?>" id="address2" name="address2">
								</div>
							</div>
						</div>
					    <div class="form-group" >
							<div class="row">
								<div class="col-md-4" >
                                <label class="control-label">Τηλέφωνο:</label>
								</div>
								<div class="col-md-8">
                                <input type="text" class="form-control" form="reg3" value="<?php echo $row['telephone']; ?>" id="phone2" name="phone2">
								</div>
							</div>
						</div>
				</div>
			</div>
           <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Κλείσιμο</button>
                <button type="SUBMIT" form="reg3" id="submit-form" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span>Ενημέρωση</button>
             
            </div>
			  </form>
        </div>
    </div>
</div>
<div class="modal fade" id="deleteUser<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
	<form method="POST" id="del" name="del" action="../../includes/edits/deleteuser.php" enctype="multipart/form-data">
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
                <button type="submit" form="del" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Ναι</button>
			   </form>
            </div>
        </div>
    </div>
</div>
 <?php 
 } 
 require_once('../js/validate2.js');
 ?>