<!-- 
access = Everyone
purpose = register to enter the site-->
<?php
session_start();
require_once('includes/require.php');
require_once('includes/https.php');
require_once ('includes/require2.php');
require_once ('includes/header.php'); 
require_once ('includes/js/validate.js'); 
require_once('includes/js/messages.js');
require_once('includes/js/checkUsername.js');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="main3">
<div class="container">
<div class="success_category" id="success_class">
<span class="msg" id="success_message">
<?php if(isset($_SESSION['yadd'])) 
{
	if ($_SESSION['yadd']==1) 
	{
		echo '<script type="text/javascript">success_message();</script>';
		echo "Η εγγραφή χρήστη πραγματοποιήθηκε με επιτυχία";
		unset($_SESSION['yadd']);
	}
}
?>
</span>
</div>	
<div class="failed_register" id="failed_class">
<span class="msg_failed" id="failed_message" >
<?php 
if(isset($_SESSION['nadd'])) 
{
	echo '<script type="text/javascript">error_message();</script>';
	if ($_SESSION['nadd'] ==0) 
	{
		echo "Πρόβλημα στην εγγραφή χρήστη";
		unset($_SESSION['nadd']);
	}
}	
?>
</span>
</div>
<div class="main-container">

		<div class="header">
			<div class="logo">
				<h6>Εγγραφή Χρήστη:</h6>
			</div>
		</div>
	<div class="container2">
		<div class="row">
			<form id="reg" name="reg" action="includes/regValues.php" method="post" onsubmit="return validate()" >
				<div class="col-100">
					<input required type="text" placeholder="Εισάγετε το όνομα χρήστη" name="username" id="usname" /></div>
					<span id="available"> </span>
				<div class="col-100">
					<input required type="password" name="pass1" placeholder="Είσαγετε τον κωδικό πρόσβασης" id="pass" /></div>
				<div class="col-100">
					<input required type="password" name="pass2" placeholder="Επιβεβαιώστε τον κωδικό πρόσβασης" id="pass" /></div>
				<div class="col-100">
					<input required type="text" placeholder="Εισάγετε το όνομά σας" name="uname"  id="usname" /></div>
				<div class="col-100">
					<input required type="text" placeholder="Εισάγετε το επίθετό σας" name="fullname" id="usname" /></div>
				<div class="col-100">
					<input required type="text" placeholder="Εισάγετε την ηλεκτρονική σας διεύθυνση" name="mail" id="usname" /></div>
				<div class="col-100">
					<input required type="text" placeholder="Εισάγετε την τοποθεσία σας" name="address" id="usname" /></div>
				<div class="col-100">
					<input required type="number_format" placeholder="Εισάγετε το τηλέφωνό σας" name="phone" id="usname" /></div>
				<div class="col-100-btn">
					<input type="submit"  value="ΕΓΓΡΑΦΗ" id="form-submit" />
				</div>
			</form>
		</div>
	</div>
	</div> 
</div>   
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js"> </script>
<?php require_once('includes/footer.php'); ?>
</body>
</html>
