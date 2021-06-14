<?php 
require_once('../includes/functions.php');
require_once('../includes/https.php');
require_once('../includes/require.php');
require_once('adminSession.php');  
require_once ('requireadmin.php');
require_once ('../includes/js/logout-start.js');
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
					<li><a href="select_category.php">Δημιουργία</a> </li>
					<li><a href="sales.php">Παραγγελίες</a></li>
					<li><a href="history.php">Ιστορικό</a></li>
				</ul>
				</li>
				<li>
					<a href="#" class="desktop-link">Επεξεργασία <i class="fas fa-edit"></i> </a>
					<input type="checkbox" id="show-items">
					<label for="show-items">Επεξεργασία</label>
				<ul>
					<li><a href="category.php">Κατηγορίας</a> </li>
					<li><a href="product.php">Προϊόντος</a></li>
				</ul>
				</li>
				<li>
					<a href="#" class="desktop-link">Αναζήτηση <i class="fas fa-search"></i></a>
					<input type="checkbox" id="show-features2">
					<label for="show-features2">Αναζήτηση</label>
				<ul>
					<li><a href="suser.php">Χρηστών</a> </li>
					<li><a href="sorder.php">Παραγγελιών</a></li>
				</ul>
				</li>
				<li>
					<a href="../index.php" onclick="logout()">  Αποσύνδεση  <i class="fas fa-sign-out-alt">  </a></i>
				</li>
			</ul>
		</div>
    </nav>
</div>


