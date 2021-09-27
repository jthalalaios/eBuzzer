<?php 
require_once('../includes/functions.php');
require_once('../includes/https.php');
require_once('../includes/require.php');
require_once('userSession.php');  
require_once ('requireUser.php');
?>
</head>
<body>
<div class="wrapper">
    <nav>
      <input type="checkbox" id="show-search">
      <input type="checkbox" id="show-menu">
      <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
      <div class="content">
		<div class="logo"><a href="">eBuzzer</a></div>
			<ul class="links">
				<li>
					<a href="index.php"> <i class="fa fa-fw fa-home"> </i></a>
				</li> 
				<li>
					<a href="#" class="desktop-link">Παραγγελία <i class="fas fa-hamburger"></i></a>
					<input type="checkbox" id="show-features">
					<label for="show-features">Παραγγελία</label>
				<ul>
					<li><a href="selectCategory.php">Δημιουργία</a> </li>
					<li><a href="history.php">Ιστορικό</a></li>
				</ul>
				</li>
				<li>
					<a href="../includes/logout.php">  Αποσύνδεση  <i class="fas fa-sign-out-alt">  </a></i>
				</li>
			</ul>
		</div>
    </nav>
</div>


