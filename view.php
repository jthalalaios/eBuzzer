<?php 
// access = everyone, view all items for shoping
require_once ('includes/header.php');
require_once ('includes/functions.php');
?>
<?php
$num_per_page=7;
	if(isset($_GET["page"]))
	{
		$page=filter_var($_GET["page"],FILTER_SANITIZE_NUMBER_INT);
	}
	else
	{
		$page=1;
	}
$start_from=($page-1)*7;
$con=db_open();
$output = '';
			try 
			{
				$sql = "SELECT * FROM categories  ";
				$query1 = $con->prepare($sql);
				$query1->execute(array());
				$result1 = $query1->fetchAll();
			}
			catch(PDOException $e) 
			{
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
			$catid = isset($_GET['categories']) ? $_GET['categories'] : 0;
			$selected = ($catid == $row1['cat_id']) ? " selected" : "";
			echo "<option$selected value=".$row1['cat_id'].">".$row1['cat_name']."</option>";
	   }
	?>
	</select>
</div>
<div class="gen">
	<table class="menutable">
		<thead>
			<th>Εικόνα</th>
			<th>Όνομα Προϊόντος</th>
			<th>Τιμή</th>
		</thead>
		<tbody>
		<?php
			if(isset($_GET['categories']))
			{
				$catid=filter_var($_GET['categories']);
			}
					if(isset($_GET['categories']))
					{
					$catid=filter_var($_GET['categories'],FILTER_SANITIZE_NUMBER_INT);
					
					try {
					$sql2="select * from product left join categories on categories.cat_id=product.product_cat_id  where product_cat_id=:product_cat_id  limit $start_from,$num_per_page";
					$query2 = $con->prepare($sql2);
					$query2->execute(array(':product_cat_id' => $catid));
					$count=$query2->fetchAll();
					}
					catch(PDOException $e) 
					{
						echo $sql2 . "<br>" . $e->getMessage();
						die();
					}
					}
					else
					{
						try 
						{
						$sql2="select * from product left join categories on categories.cat_id=product.product_cat_id   limit $start_from,$num_per_page";
						$query2 = $con->prepare($sql2);
						$query2->bindParam(':cat_name',$cat_name);
						$query2->bindParam(':cat_id',$cat_id );
						$query2->bindParam(':product_id',$product_id );
						$query2->bindParam(':product_name ',$product_name);
						$query2->bindParam(':product_cat_id ',$product_cat_id);
						$query2->bindParam(':quantity ',$quantity);
						$query2->bindParam(':value',$value);
						$query2->bindParam(':image',$image);
						$query2->execute(array(':cat_name' => $cat_name,':cat_id' => $cat_id,':product_id' => $product_id,':product_name' => $product_name,':product_cat_id' => $product_cat_id,':quantity' => $quantity,':value' => $value,':image' => $image));
						$count=$query2->fetchAll();
						}
						catch(PDOException $e) 
						{
							echo $sql2 . "<br>" . $e->getMessage();
							die();
						}
					}
			
			foreach($count as $row){
			?>
				<tr>
				<td><img class="category_image" src="https://zafora.ece.uowm.gr/~ece00592/eBuzzer/includes/product/<?php  echo $row['image']; ?>"  /> </td>
				<td><?php echo $row['product_name']; ?></td>
				<td><?php echo number_format($row['value'], 2); ?>€</td>
				</tr>
				<?php
					}
				 ?>
		</tbody>
	</table>
      	
<script type="text/javascript">
	$(document).ready(function(){
		$("#catList").on('change', function(){
			if($(this).val() == 0)
			{
				window.location = 'view.php';
			}
			else
			{
				window.location = 'view.php?categories='+$(this).val();
			}
		});
	});
</script>	
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
		echo "<a href='view.php?page=".($page-1)."' class='btnview viewbutton '>Προηγούμενη</a>";
    }
  for($i=1;$i<=$total_pages;$i++)
    {
		if($page>1) {
        echo "<a href='view.php?page=".$i."'>".$i."</a>" ;
		}
    }
	
	if($i>$page) {
	if ($rs_result>=$num_per_page) 
    {
		echo "<a href='view.php?page=".($page+1)."' class='btnview viewbutton'>Επόμενη</a>";
		for($i=1;$i<=$total_pages;$i++)
    {
		if($page>=1) {
        echo "<a href='view.php?page=".$i."'>".$i."</a>" ;
		}
    }
    }
    }
	if ($page<=0) {
		returntostart("view.php");
	}
	if ($page>$total_pages) {
		returntostart("view.php");
	}
    ?>
</div>
</body>
</html>	
 