<script>
function error_message()
{
	var element = document.getElementById('failed_class');
	element.style.opacity = "1";
    setTimeout(function()
	{  
		$('failed').fadeOut("Slow"); 
		element.style.opacity = "0";
	}, 5000);  
}
</script>

<script>
function success_message()
{
	var element = document.getElementById('success_class');
	element.style.opacity = "1";
    setTimeout(function()
	{  
    $('success-edit').fadeOut("Slow"); 
	element.style.opacity = "0";
    }, 5000);  
}
</script>