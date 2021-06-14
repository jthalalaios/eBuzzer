<?php
// access = Everyone purpose = login-type username and password to enter the site 
session_start();
require_once('includes/require.php');
require_once('includes/https.php');
require_once ('includes/require2.php');
require_once ('includes/header.php');
?>
<div class="main">
	<div class="main-container">
		<div class="header">
			<div class="logo">
				<h3>Είσοδος Χρήστη:</h3>
			</div>
		</div>
	<div class="container2">
		<div class="row">
			<form id="check_con" action="includes/check_login.php" method="post">
				<div class="col-100">
					<input required type="text" placeholder="Εισάγετε το όνομα χρήστη" name="usname" id="usname" /> 
				</div>
				<div class="col-100">
					<input required type="password" name="pass" placeholder="Είσαγετε Κωδικό Πρόσβασης" id="pass" />
				</div>
				<div class="col-100-btn">
					<input type="submit" class="login-form" value="ΕΙΣΟΔΟΣ" id="form-submit" />
				</div>
			</form>
			<form id="register" action="register.php" method="post">
				<div class="col-100-btn">
					<input type="submit" value="ΕΓΓΡΑΦΗ" id="form-submit" /></div>
			</form>
		</div>
	</div>
	</div>
</div>
<div class="failed" id="failed-class">
<span class="msg_failed" id="failed_message" >
<?php if(isset($_SESSION['nologin'])) {
	if ($_SESSION['nologin']==1) {
	    ?><script>
          var element = document.getElementById('failed-class');
							element.style.opacity = "1";
                          setTimeout(function(){  
                               $('failed').fadeOut("Slow"); 
								element.style.opacity = "0";
                          }, 5000);  
    </script> <?php
	echo "Λάθος εισαγωγή στοιχείων";
	unset($_SESSION['nologin']);
	}
}
?>
</span>
</div>
<?php require_once('includes/footer.php'); ?>
</body>
</html>
