<?php 
require_once ('header.php');
?>
<body>
<div class="page">
	<div class="gen">
		<div class="panel">
			<div class="news-letter">
				<div class="logo">
					<h1>Αναζήτηση Παραγγελίας: </h1>
					<div class="form-group">
						<div class="input-group">
							<input type="text" name="search_text" id="search_text" placeholder="Εισάγετε Ημ/νία" class="form-control" />
						</div>
					</div>           
					<div id="result"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once('../includes/fetch/ajaxSearchOrder.php'); ?>
<?php require_once ('../includes/footer.php'); ?>
</body>
</html>
