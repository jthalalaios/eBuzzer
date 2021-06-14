<?php 
require_once ('header.php');
?>
	<div class="lpanel">
	<h4> Κατηγορίες: </h4>
	 <?php require_once ('list-category.php'); ?>
	</div>
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
	<p>Έχετε επιλέξει: </p>
	<?php require_once ('test6.php'); ?>
	</div></div>	
</div>
<?php 
require_once ('require-order.php');
require_once ('../includes/footer2.php');
?>
</body>
</html>

