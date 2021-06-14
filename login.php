<!-- 
access = Everyone
purpose = login-type username and password to enter the site -->
<?php
require_once('includes/require.php');
require_once('includes/https.php');
require_once ('includes/require2.php');
require_once ('includes/header.php');
?>
<body>
<div class="clearing"></div>
<div class="header">
  <div class="logo">
    <h3>Είσοδος:</h3>
  </div>
</div>
<div class="generic">
   <div class="login-form">     
	  <div class="news-letter">
        <div class="title">
				<form id="check_con" action="includes/check_login.php" method="post">
					<br><input required type="text" placeholder="Εισάγετε το όνομα χρήστη" name="usname" id="usname" /></br>
					<br><input required type="password" name="pass" placeholder="Είσαγετε Κωδικό Πρόσβασης" id="pass" /></br>
					<br><input type="submit" value="ΕΙΣΟΔΟΣ" id="form-submit" /></br>
				 </form>
				<form id="register" action="register.php" method="post">
					<br><input type="submit" value="ΕΓΓΡΑΦΗ" id="form-submit" /></br>
				</form>
		</div>
      </div>
	</div> 
</div> 
<?php require_once('includes/footer.php'); ?>
</body>
</html>
