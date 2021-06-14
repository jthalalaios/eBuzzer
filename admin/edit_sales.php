<div class="modal fade" id="editsales<?php echo $row2['order_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
		<form method="POST" name="finish-order" action="edit_sales3.php" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<center><h3 class="modal-title" id="myModalLabel">Κατάσταση Παραγγελίας:</h3></center>
				</div>
            <div class="modal-body">
                <h4 class="text-center">Η παραγγελία με το νούμερο:<?php echo $row2['order_id']; ?> βρίσκεται σε εξέλιξη!
				Επιθυμείτε να ολοκληρωθεί?
				</h4>
					<input type="hidden"  name="id2" value="<?php echo $row2['order_id'];?>" >
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Κλείσιμο</button>
                <button type="submit"class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Ναι</button>
			   </form>
            </div>
        </div>
    </div>
</div>