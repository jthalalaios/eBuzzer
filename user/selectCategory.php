<?php 
require_once ('header.php');
require_once('../includes/js/messages.js');
?>
   <div class="rpanel">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="glyphicon glyphicon-menu-hamburger"></span>
      </button>
<?php 
require_once ('cartPopover.php');
?>
<div class="container">
	<div class="failed_order" id="failed_class">
	<span class="msg_failed" id="failed_message" >
	<?php if(isset($_SESSION['norder'])) 
	{
		echo '<script type="text/javascript">error_message();</script>';
		if ($_SESSION['norder'] == 2) 
		{
			echo "Πρόβλημα στην δημιουργία της παραγγελίας. Το καλάθι σας είναι άδειο!";
		}
		if ($_SESSION['norder'] == 1) 
		{
			echo "Πρόβλημα στην δημιουργία της παραγγελίας!";
		}
		unset($_SESSION['norder']);
	}
	?>
	</span>
	</div>
	<h1 class="logo_order">Εξέλιξη Παραγγελίας:</h1>
	<div class="but">
	<button id="modalButor" class="butor"> Παράγγειλε τώρα </button>
	</div>
	<div id="sModal" class="modall">
	<div class="modall-content">
	<span class="closebutor">&times; </span>
	<p> Επιλέξτε την κατηγορία από το προϊόν που επιθυμείτε να παραγγείλετε! </p>
		<?php require_once ('getCategory.php'); ?>
	</div></div>
</div>
<?php 
require_once ('requireOrder.php');
require_once ('../includes/footer2.php');
?>
</body>
</html>

