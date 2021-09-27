<script>
     function send_data()
	{
	var user_id = $(this).attr("id2");
	console.log("user_id",user_id);
	$.ajax({
		url:"../edits/editUser4.php",
		method:"POST",
		data:{user_id:user_id},
		dataType:"text",
		success:function(data)
		{
			$('#id2').val(user_id]);
		}
	})
  }
</script>