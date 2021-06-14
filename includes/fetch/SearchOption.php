<script>
$(document).ready(function(){
    $('#selectID').on('change', function(){
        var selectID = $(this).val();
        if(selectID){
            $.ajax({
                type:'POST',
                url:'SearchOption2.php',
                data:'select_id='+selectID,
                success:function(html){
                    $('#selectID').html(html);
                    
                }
            });  

});
</script>