<?php 
require_once ('includes/require2.php');
require_once('includes/https.php');
require_once('includes/require.php');
require_once('includes/functions.php');
?>
</head>
<body>  
<div class="wrapper">
    <nav>
      <input type="checkbox" id="show-search">
      <input type="checkbox" id="show-menu">
      <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
      <div class="content">
      <div class="logo"><a href="#">eBuzzer</a></div>
        <ul class="links">
          <li><a href="index.php">Αρχική</a></li>
		   <li><a href="view.php">Προϊόντα</a></li>
          <li>
            <a href="#" class="desktop-link">Σύνδεση</a>
            <input type="checkbox" id="show-features">
            <label for="show-features">Σύνδεση</label>
            <ul>
              <li><a href="login.php">Είσοδος</a></li>
              <li><a href="register.php">Εγγραφή</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </div>


	