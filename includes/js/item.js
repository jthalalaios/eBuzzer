<script>  
$(document).ready(function(){

	load_cart_data();
	
	function load_cart_data()
	{
		$.ajax({
			url:"fcart.php",
			method:"POST",
			dataType:"json",
			success:function(data)
			{
				$('#cart_details').html(data.cart_details);
				$('.total_price').text(data.total_price);
				$('.badge').text(data.total_item);
			}
		});
	}

	$('#cart-popover').popover({
		html : true,
        container: 'body',
        content:function(){
        	return $('#popover_content_wrapper').html();
        }
	});
	
	$('#popup-2').popover({
		html : true,
        container: 'body',
        content:function(){
        	return $('#popup-2').html();
        }
	});

	$(document).on('click', '.add_to_cart', function(){
		var product_id = $(this).attr("id");
		var product_name = $('#name'+product_id+'').val();
		var product_price = $('#price'+product_id+'').val();
		var product_quantity = $('#quantity').val();
		var action = "add";
		var product_checkvalue = [];
			
           $('.get_value').each(function(){  
                if($(this).is(":checked"))  
                {  
                     product_checkvalue.push($(this).val());  
                }  
           });  
           product_checkvalue = product_checkvalue.toString();  
           $.ajax({  
                url:"insert_checkbox.php",  
                method:"GET",  
                data:{product_checkvalue:product_checkvalue},  
                success:function(data){    
					 timh=(data);
                }  
           });  
         
			
				   
		if(product_quantity > 0)
		{
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{product_id:product_id, product_name:product_name, product_price:product_price, product_quantity:product_quantity, product_checkvalue:product_checkvalue, action:action},
				success:function(data)
				{
					load_cart_data();
					alert("Το προϊόν εισάχθηκε επιτυχώς!");
				}
			});
		}
		else
		{
			alert("Παρακαλώ, εισάγετε τον αριθμό της ποσότητας του προϊόντος");
		}
	});

	$(document).on('click', '.delete', function(){
		var product_id = $(this).attr("id");
		var action = 'remove';
		if(confirm("Θέλετε να διαγράψετε το συγκεκριμένο προϊόν?"))
		{
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{product_id:product_id, action:action},
				success:function()
				{
					load_cart_data();
					$('#cart-popover').popover('hide');
					alert("Το προϊόν έχει διαγραφτεί επιτυχώς!");
				}
			})
		}
		else
		{
			return false;
		}
	});
	
	

	$(document).on('click', '#clear_cart', function(){
		var action = 'empty';
		$.ajax({
			url:"action.php",
			method:"POST",
			data:{action:action},
			success:function()
			{
				load_cart_data();
				$('#cart-popover').popover('hide');
				alert("Το καλάθι σας έχει διαγραφτεί επιτυχώς!");
			}
		});
	});
	
	$(document).on('click', '#check_out_cart', function(){
		var action = 'order';
		$.ajax({
			url:"order.php",
			method:"POST",
			data:{action:action},
			success:function()
			{
				
			}
		});
	});
    
});

</script>