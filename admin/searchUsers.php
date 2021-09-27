<?php 
require_once ('header.php');
require_once('../includes/js/messages.js');
?>
<div class="container">
<div class="success_edit" id="success_class">
	<span class="msg" id="success_message" >
	<?php 
	if(isset($_SESSION['ychange'])) 
	{
		echo '<script type="text/javascript">success_message();</script>';
		if ($_SESSION['ychange']==1) 
		{
			echo "Η επεξεργασία των στοιχείων του χρήστη, πραγματοποιήθηκε με επιτυχία!";
			unset($_SESSION['ychange']);
		}
	}
	if(isset($_SESSION['ydeluser'])) 
	{
		echo '<script type="text/javascript">success_message();</script>';
		if ($_SESSION['ydeluser']==1) 
		{
			echo "Η διαγραφή του χρήστη, πραγματοποιήθηκε με επιτυχία!";
			unset($_SESSION['ydeluser']);
		}
	}
	?>
	</span>
</div>	
<div class="failed" id="failed_class">
	<span class="msg_failed" id="failed_message" >
	<?php 
	if(isset($_SESSION['nchange'])) 
	{
		echo '<script type="text/javascript">error_message();</script>';
		if ($_SESSION['nchange'] ==1) 
		{
			echo "Πρόβλημα στην επεξεργασία των στοιχείων του χρήστη!";
		}
		unset($_SESSION['nchange']);
	}
		if(isset($_SESSION['ndeluser'])) 
	{
		echo '<script type="text/javascript">error_message();</script>';
		if ($_SESSION['ndeluser'] ==0) 
		{
			echo "Πρόβλημα στην επεξεργασία των στοιχείων του χρήστη!";
		}
		unset($_SESSION['ndeluser']);
	}
	?>
	</span>
</div></div>
<div class="page">
<div class="news-letter">
	<div class="logo">
		<h1>Αναζήτηση Χρήστη: </h1>
		<div class="form-group">
			<div class="input-group">
				<input type="text" name="search_text" id="search_text" placeholder="Εισάγετε Username / ID" class="form-control" />
			</div>
        </div>           
	</div>
	<div id="result"></div>
</div>
</div>
<div class="page3">
<div class="news-letter">   
<?php require_once('../includes/fetch/showUsers.php'); ?>
	</div>
</div></div>
<div class="viewpage_search_users">
<?php
	if($page>1)
    {
		echo "<a href='searchUsers.php?page=".($page-1)."' class='btnview viewbutton '>Προηγούμενη</a>";
    }
  for($i=1;$i<=$total_pages;$i++)
    {
		if($page>1) {
        echo "<a href='searchUsers.php?page=".$i."'>".$i."</a>" ;
		}
    }
	
	if($i>$page) {
	if ($rs_result>=$num_per_page) 
    {
		echo "<a href='searchUsers.php?page=".($page+1)."' class='btnview viewbutton'>Επόμενη</a>";
		for($i=1;$i<=$total_pages;$i++)
    {
		if($page>=1) {
        echo "<a href='searchUsers.php?page=".$i."'>".$i."</a>" ;
		}
    }
    }
    }
	if ($page<=0) {
		returntostart("searchUsers.php");
	}
	if ($page>$total_pages) {
		returntostart("searchUsers.php");
	}
    ?>
</div>
<?php 
require_once('../includes/js/searchUser.js');  
require_once ('../includes/footer.php'); 
?>
</body>
</html>
