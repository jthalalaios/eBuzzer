<script>
$(document).ready(function(){
	$('.get_value').click(function(){
		var text= "";
		$('.get_value:checked').each(function(){
			text+=$(this).val()+ ',';
		});
		text=text.substring(0,text.length-1);
		$('#selectedtext').val(text);
	});
   });
</script>