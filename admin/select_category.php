<?php 
require_once ('header.php');
?>
   <div class="rpanel">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="glyphicon glyphicon-menu-hamburger"></span>
      </button>
<?php 
require_once ('cart-popover.php');
?>
<div class="container">
	<h1 class="logo">Εξέλιξη Παραγγελίας:</h1>
	<div class="but">
	<button id="modalButor" class="butor"> Παράγγειλε τώρα </button>
	</div>
	<div id="sModal" class="modall">
	<div class="modall-content">
	<span class="closebutor">&times; </span>
	<p> Επιλέξτε την κατηγορία από το προϊόν που επιθυμείτε να παραγγείλετε! </p>
		<?php require_once ('select_category2.php'); ?>
	</div></div>
</div>
<div class="failed" id="failed-class">
	<span class="msg_failed" id="failed_message" >
	<?php if(isset($_SESSION['norder'])) {
	 ?><script>
          var element = document.getElementById('failed-class');
							element.style.opacity = "1";
                          setTimeout(function(){  
                               $('failed').fadeOut("Slow"); 
								element.style.opacity = "0";
                          }, 5000);  
		</script> <?php
	if ($_SESSION['norder'] == 2) {
	    
		echo "Πρόβλημα στην δημιουργία της παραγγελίας. Το καλάθι σας είναι άδειο!";
	}
	if ($_SESSION['norder'] == 1) {
	    
		echo "Πρόβλημα στην δημιουργία της παραγγελίας!";
	}
	unset($_SESSION['norder']);
	}
	?>
	</span>
</div>
<?php 
require_once ('require-order.php');
require_once ('../includes/footer2.php');
?>
</body>
</html>

