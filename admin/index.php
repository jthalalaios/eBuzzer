<?php
require_once('header.php'); 

?>
<div class="main-container">
	<div class="header">
		<div class="container2">
			<div class="row">
				<h3>Καλωσήρθατε Διαχειριστή: <?php if (isset($_SESSION['name'])) {echo ''.$_SESSION['name'].'' ; }?> </h3>
			</div>
		</div>	
	</div>
 </div>
<div class="container3">
	<div class="row">
		<h3>Πληροφορίες: </h3>
	</div>
<?php require_once ('../includes/fetch/searchUser.php'); ?>    
</div>
<div class="failed" id="failed-class">
	<span class="msg_failed" id="failed_message" >
	<?php if(isset($_SESSION['nchange'])) {
	 ?><script>
          var element = document.getElementById('failed-class');
							element.style.opacity = "1";
                          setTimeout(function(){  
                               $('failed').fadeOut("Slow"); 
								element.style.opacity = "0";
                          }, 5000);  
		</script> <?php
	if ($_SESSION['nchange'] ==2) {
	    
		echo "Πρόβλημα στην επεξεργασία των στοιχείων του χρήστη!";
	}
	unset($_SESSION['nchange']);
	}
	?>
	</span>
</div>
<div class="success" id="success-class">
	<span class="msg" id="success_message" >
	<?php if(isset($_SESSION['ychange'])) {
		if ($_SESSION['ychange']==1) {
			?><script>
				var element = document.getElementById('success-class');
				element.style.opacity = "1";
                setTimeout(function(){  
                   $('success').fadeOut("Slow"); 
						element.style.opacity = "0";
                    }, 5000);  
			</script> <?php
		echo "Η επεξεργασία των στοιχείων του χρήστη, πραγματοποιήθηκε με επιτυχία!";
		unset($_SESSION['ychange']);
		}
	}
	?>
	</span>
</div>	
<?php require_once ('../includes/footer.php'); ?>
</body>
</html>
