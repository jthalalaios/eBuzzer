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
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="main">
	<div class="main-container">
		<div class="header">
			<div class="logo">
				<h3>Εγγραφή Χρήστη:</h3>
			</div>
		</div>
	<div class="container2">
		<div class="row">
			<form id="reg" name="reg" action="includes/reg_values.php" method="post" onsubmit="return validate()" >
				<div class="col-100">
					<input required type="text" placeholder="Εισάγετε το όνομα χρήστη" name="username" id="usname" /></div>
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
<div class="failed" id="failed-class">
<span class="msg_failed" id="failed_message" >
<?php if(isset($_SESSION['nadd'])) {
	if ($_SESSION['nadd']==0) {
	    ?><script>
          var element = document.getElementById('failed-class');
							element.style.opacity = "1";
                          setTimeout(function(){  
                               $('failed').fadeOut("Slow"); 
								element.style.opacity = "0";
                          }, 5000);  
    </script> <?php
	echo "Πρόβλημα στην εγγραφή χρήστη";
	unset($_SESSION['nadd']);
	}
}
?>
</span>
</div>
<div class="success" id="success-class">
<span class="msg" id="success_message" >
<?php if(isset($_SESSION['yadd'])) {
	if ($_SESSION['yadd']==1) {
	    ?><script>
          var element = document.getElementById('success-class');
							element.style.opacity = "1";
                          setTimeout(function(){  
                               $('success').fadeOut("Slow"); 
								element.style.opacity = "0";
                          }, 5000);  
    </script> <?php
	echo "Η εγγραφή χρήστη πραγματοποιήθηκε με επιτυχία";
	unset($_SESSION['yadd']);
	}
}
?>
</span>
</div>	  
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js"> </script>
<?php require_once('includes/footer.php'); ?>
</body>
</html>
