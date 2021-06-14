<?php 
require_once ('header.php');
?>
<?php
$num_per_page=7;
	if(isset($_GET["page"]))
	{
		$page=filter_var($_GET["page"]);
	}
	else
	{
		$page=1;
	}
$start_from=($page-1)*7;
$con=db_open();
$output = '';
			try {
			$sql = "SELECT * FROM categories    ";
			$query1 = $con->prepare($sql);
			$query1->bindParam(':cat_id',$cat_id);
			$query1->execute(array(':cat_id' => $cat_id));
			$result1 = $query1->fetchAll();
			}
			catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
				die();
			}
?>	
<div class="logo">
<label><h3>Επιλέξτε Κατηγορία:</h3></label> 
       <select id="catList" class="btn btn-default">
		<option value="0">Όλες - Κατηγορίες</option>
       <?php
	   foreach((array)$result1 as $row1)
       {
		   $catid = isset($_GET['categories']) ? filter_var($_GET['categories']) : 0;
			$selected = ($catid == $row1['cat_id']) ? " selected" : "";
			echo "<option$selected value=".$row1['cat_id'].">".$row1['cat_name']."</option>";
	   }
		?>
	  </select>
	   </div>
	   	 <div class="col-md-12"> 
		  <a href="#addproduct" data-toggle="modal" class="pull-right2 btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Προϊόν</a>
		</div>
	   <div class="gen">
	   	<table class="menutable">
			<thead>
				<th>Εικόνα</th>
				<th>Όνομα Προϊόντος</th>
				<th>Τιμή</th>
				<th>Ενέργειες</th>
			</thead>
			<tbody>
				<?php
					$where = "";
					if(isset($_GET['categories']))
					{
						$catid=filter_var($_GET['categories']);
						$where = " WHERE product.product_cat_id = $catid";
					}
					try {
					$sql2="select * from product left join categories on categories.cat_id=product.product_cat_id  $where  order by categories.cat_id asc, cat_name asc limit $start_from,$num_per_page";
					$query2 = $con->prepare($sql2);
					$query2->bindParam(':cat_name',$cat_name);
					$query2->bindParam(':cat_id',$cat_id );
					$query2->bindParam(':product_id',$product_id );
					$query2->bindParam(':product_name ',$product_name);
					$query2->bindParam(':product_cat_id ',$product_cat_id);
					$query2->bindParam(':quantity ',$quantity);
					$query2->bindParam(':value',$value);
					$query2->bindParam(':image',$image);
					$query2->execute(array(':cat_name' => filter_var($cat_name),':cat_id' => $cat_id,':product_id' => $product_id,':product_name' => filter_var($product_name),':product_cat_id' => $product_cat_id,':quantity' => $quantity,':value' => $value,':image' => $image));
					$count=$query2->fetchAll();
					}
					catch(PDOException $e) {
						echo $sql2 . "<br>" . $e->getMessage();
						die();
					}
					 foreach($count as $row){
						?>
						<tr>
							<td><img class="category_image" src="https://zafora.ece.uowm.gr/~ece00592/eBuzzer/includes/product/<?php  echo $row['image']; ?>"  /> </td>
							<td><?php echo $row['product_name']; ?></td>
							<td><?php echo number_format($row['value'], 2); ?>€</td>
							<td>
								<a href="#editproduct<?php echo $row['product_id']; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Επεξεργασία</a> || <a href="#deleteproduct<?php echo $row['product_id']; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Διαγραφή</a>
								<?php include('../includes/product/editproduct.php'); ?>
							</td>
						</tr>
						<?php
					}
				 ?>
			</tbody>
		</table>
      	<?php include('../includes/product/addproduct.php'); ?>
		
<script type="text/javascript">
	$(document).ready(function(){
		$("#catList").on('change', function(){
			if($(this).val() == 0)
			{
				window.location = 'product.php';
			}
			else
			{
				window.location = 'product.php?categories='+$(this).val();
			}
		});
	});
</script>	
</div>  
<div class="failed" id="failed-class">
<span class="msg_failed" id="failed_message" >
<?php if(isset($_SESSION['neditp'])) {
		if ($_SESSION['neditp'] == 1 || $_SESSION['neditp'] == 2 || $_SESSION['neditp'] == 3) {
			?><script>
				var element = document.getElementById('failed-class');
				element.style.opacity = "1";
                setTimeout(function(){  
                    $('failed').fadeOut("Slow"); 
					element.style.opacity = "0";
                    }, 5000);  
			</script> <?php
			if ($_SESSION['neditp'] == 1) {
				echo "Πρόβλημα, στην επεξεργασία του προϊόντος";	
			}
			
			if ($_SESSION['neditp'] == 2) {
				echo "Πρόβλημα, δεν καταχωρήθηκε το όνομα στην επεξεργασία του προϊόντος";		
			}
			if ($_SESSION['neditp'] == 3) {
				echo "Πρόβλημα, δεν δώθηκε τιμή στην επεξεργασία του προϊόντος";		
			}
			unset($_SESSION['neditp']);
		}
}

if(isset($_SESSION['naddp'])) {
		if ($_SESSION['naddp'] == 0 || $_SESSION['naddp'] == 1 || $_SESSION['naddp'] == 2) {
			?><script>
				var element = document.getElementById('failed-class');
				element.style.opacity = "1";
                setTimeout(function(){  
                    $('failed').fadeOut("Slow"); 
					element.style.opacity = "0";
                    }, 5000);  
			</script> <?php
			if ($_SESSION['naddp'] == 0) {
				echo "Πρόβλημα, στην προσθήκη του προϊόντος";	
			}
			
			if ($_SESSION['naddp'] == 1) {
				echo "Πρόβλημα, δεν καταχωρήθηκε το όνομα στην επεξεργασία του προϊόντος";		
			}
			if ($_SESSION['naddp'] == 2) {
				echo "Πρόβλημα, δεν δώθηκε τιμή στην επεξεργασία του προϊόντος";		
			}
			unset($_SESSION['naddp']);
		}
}		
if(isset($_SESSION['ydelp'])) {
	if ($_SESSION['ydelp'] == 0 ) {
			?><script>
				var element = document.getElementById('failed-class');
				element.style.opacity = "1";
                setTimeout(function(){  
                    $('failed').fadeOut("Slow"); 
					element.style.opacity = "0";
                    }, 5000);  
			</script> <?php
				echo "Πρόβλημα, στην διαγραφή του προϊόντος";	
				unset($_SESSION['ydelp']);
			}
}
?>
</span>
</div>		
<div class="success" id="success-class">
<span class="msg" id="success_message" >
<?php if(isset($_SESSION['yeditp'])) {
		if ($_SESSION['yeditp']==1) {
			?><script>
				var element = document.getElementById('success-class');
				element.style.opacity = "1";
                setTimeout(function(){  
                   $('success').fadeOut("Slow"); 
						element.style.opacity = "0";
                    }, 5000);  
			</script> <?php
		echo "Η επεξεργασία του προϊόντος πραγματοποιήθηκε με επιτυχία";
		unset($_SESSION['yeditp']);
		}
	}
	
	 if(isset($_SESSION['yaddp'])) {
		if ($_SESSION['yaddp']==1) {
			?><script>
				var element = document.getElementById('success-class');
				element.style.opacity = "1";
                setTimeout(function(){  
                   $('success').fadeOut("Slow"); 
						element.style.opacity = "0";
                    }, 5000);  
			</script> <?php
		echo "Επιτυχής προσθήκη του προϊόντος";
		unset($_SESSION['yaddp']);
		}
	}
	
	 if(isset($_SESSION['ydelp'])) {
		if ($_SESSION['ydelp']==1) {
			?><script>
				var element = document.getElementById('success-class');
				element.style.opacity = "1";
                setTimeout(function(){  
                   $('success').fadeOut("Slow"); 
						element.style.opacity = "0";
                    }, 5000);  
			</script> <?php
		echo "Επιτυχής διαγραφή του προϊόντος";
		unset($_SESSION['ydelp']);
		}
	}
?>
</span>
</div>
<?php 
$rs_result=$query2->rowCount();
$total_records=$query2->columnCount();
$total_pages=ceil($total_records/$num_per_page);
?>
<div class="viewpage">
<?php
	if($page>1)
    {
		echo "<a href='product.php?page=".($page-1)."' class='btnview viewbutton '>Προηγούμενη</a>";
    }
  for($i=1;$i<=$total_pages;$i++)
    {
		if($page>1) {
        echo "<a href='product.php?page=".$i."'>".$i."</a>" ;
		}
    }
	
	if($i>$page) {
	if ($rs_result>=$num_per_page) 
    {
		echo "<a href='product.php?page=".($page+1)."' class='btnview viewbutton'>Επόμενη</a>";
    }
    }
    ?>
</div>
 <?php require_once ('../includes/footer2.php'); ?>
</body>
</html>	
 