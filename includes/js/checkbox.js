 <script>  
 $(document).ready(function(){  
      $('#add_to_cart').click(function(){  
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
                method:"POST",  
                data:{product_checkvalue:product_checkvalue},  
                success:function(data){  
                     $('#result').html(data);  
					
                }  
           });  
      });  
	
 });  
 </script> 
