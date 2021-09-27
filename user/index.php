<?php
require_once('header.php');
require_once('../includes/js/messages.js'); 
?>
<div class="container">
<div class="success_category" id="success_class">
	<span class="msg" id="success_message" >
	<?php 
	if(isset($_SESSION['ychange'])) 
	{
		if ($_SESSION['ychange']==1) 
		{
			echo '<script type="text/javascript">success_message();</script>';
			echo "Η επεξεργασία των στοιχείων του χρήστη, πραγματοποιήθηκε με επιτυχία!";
			unset($_SESSION['ychange']);
		}
	}
	?>
	</span>
</div>
<div class="failed_category" id="failed_category">
	<span class="msg_failed" id="failed_message" >
	<?php 
	if(isset($_SESSION['nchange'])) 
	{
	if ($_SESSION['nchange'] == 2) 
	{
	    echo '<script type="text/javascript">error_message();</script>';
		echo "Πρόβλημα στην επεξεργασία των στοιχείων του χρήστη!";
	}
	unset($_SESSION['nchange']);
	}
	?>
	</span>
</div>
</div>
<div class="main-container">
	<div class="header">
		<div class="container2">
			<div class="row">
				<h3>Καλωσήρθατε Χρήστη: <?php if (isset($_SESSION['name'])) {echo ''.$_SESSION['name'].'' ; }?> </h3>
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
<?php require_once ('../includes/footer.php'); ?>
</body>
</html>
