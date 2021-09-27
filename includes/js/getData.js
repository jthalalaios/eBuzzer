<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
$(document).ready(function()
{	
	$('.details_button').click(function()
	{
		var id_order=$(this).data('id');
		var s_date=$(this).data('date');
		// $('.modal-content .modal-body').empty();
		$.ajax({
		url:"refreshOrders.php",
		method:"POST",
		data:{order_id: id_order,date: s_date},
		success:function(response)
		{	
			$('#details'+id_order).modal('show');
			$('.modal-body').html(response);
		}
	
	});
	});

});
</script>