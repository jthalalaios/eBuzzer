 <script>
$(document).ready(function(){

$("#usname").blur(function()
{
	var username = $(this).val();

   $.ajax({
   url:"includes/fetch/checkUsername.php",
   method:"POST",
   data:{user_name:username},
   dataType:"text",
   success:function(data)
   {
    $('#available').html(data);
   }
  });
 });
});
</script>