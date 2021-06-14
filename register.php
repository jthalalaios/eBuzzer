<!-- 
access = Everyone
purpose = register to enter the site-->
<?php
require_once('includes/require.php');
require_once('includes/https.php');
require_once ('includes/require2.php');
require_once ('includes/header.php'); 
?>
<script defer src="includes/js/validate.js" ></script>
<body>

<div class="clearing"></div>
<div class="header">
  <div class="logo">
    <h3>Εγγραφή Χρήστη:</h3>
  </div>
</div>

<div class="generic">
   <div class="login-form">     
	  <div class="news-letter">
        <div class="title">
			<form id="reg" name"reg" action="includes/reg_values.php" method="post" onsubmit="return validate()" >
				<br><input required type="text" placeholder="Εισάγετε το όνομα χρήστη" name="username" id="usname" /></br>
				<br><input required type="password" name="pass1" placeholder="Είσαγετε τον κωδικό πρόσβασης" id="pass" /></br>
				<br><input required type="password" name="pass2" placeholder="Επιβεβαιώστε τον κωδικό πρόσβασης" id="pass" /></br>
				<br><input required type="text" placeholder="Εισάγετε το όνομά σας" name="uname"  id="usname" /></br>
				<br><input required type="text" placeholder="Εισάγετε το επίθετό σας" name="fullname" id="usname" /></br>
				<br><input required type="text" placeholder="Εισάγετε την ηλεκτρονική σας διεύθυνση" name="mail" id="usname" /></br>
				<br><input required type="text" placeholder="Εισάγετε την τοποθεσία σας" name="address" id="usname" /></br>
				<br><input required type="number_format" placeholder="Εισάγετε το τηλέφωνό σας" name="phone" id="usname" /></br>
				<br><input type="submit"  value="ΕΓΓΡΑΦΗ" id="form-submit" /></br>
			</form>
			
		</div>
      </div>
	  </div> </div>  
	 
<?php require_once('includes/footer.php'); ?>
</body>
</html>
