<?php 
require_once ('header.php');
?>
<div class="news-letter">
	<div class="logo">
		<h1>Αναζήτηση Χρήστη: </h1>
		<div class="form-group">
			<div class="input-group">
				<input type="text" name="search_text" id="search_text" placeholder="Εισάγετε Χρήστη" class="form-control" />
			</div>
        </div>           
	</div>
	<div id="result"></div>
</div>
<?php require_once('../includes/js/searchUser.js'); ?>
<?php require_once ('../includes/footer.php'); ?>
</body>
</html>
