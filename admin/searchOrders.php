<?php 
require_once ('header.php');
?>
<body>
<div class="page">
	<div class="gen">
		<div class="panel">
			<div class="news-letter">
				<div class="logo">
					<h5>Αναζήτηση Παραγγελίας: </h5>
					</div>
					<div class="form-group">
						<div class="input-group2">
							<input type="text" name="search_text" id="search_text" placeholder="Εισάγετε ID" class="form-control" />
						</div>
					</div>           
					<div id="result"></div>
			</div>
		</div>
	</div>
</div>
<?php require_once('../includes/js/searchOrder.js'); ?>
<?php require_once ('../includes/footer.php'); ?>
</body>
</html>
