<?php
session_start();

if(isset($_POST["action"]))
{
	if($_POST["action"] == "add")
	{
		if(isset($_SESSION["shopping_cart"]))
		{
			$is_available = 0;
			foreach($_SESSION["shopping_cart"] as $keys => $values)
			{
				if($_SESSION["shopping_cart"][$keys]['product_id'] == filter_var($_POST["product_id"]))
				{
					if(($_SESSION["shopping_cart"][$keys]['product_checkvalue'] == $_POST["product_checkvalue"]) && ($_SESSION["shopping_cart"][$keys]['product_id'] == filter_var($_POST["product_id"]))) 
					{
						
						$_SESSION["shopping_cart"][$keys]['product_quantity'] = $_SESSION["shopping_cart"][$keys]['product_quantity'] + filter_var($_POST["product_quantity"]);
					}
					else 
					{
						$_SESSION["shopping_cart"][$keys]['product_id'] = $_SESSION["shopping_cart"][$keys]['product_id'] + filter_var($_POST["product_quantity"])+ filter_var($_POST["product_checkvalue"]);
					}
					$is_available++;
				}
			}
			if($is_available == 0)
			{
				$item_array = array(
					'product_id'               =>     filter_var($_POST["product_id"]),  
					'product_name'             =>     filter_var($_POST["product_name"]),  
					'product_price'            =>     filter_var($_POST["product_price"]),  
					'product_quantity'         =>     filter_var($_POST["product_quantity"]),
					'product_checkvalue'       =>     filter_var($_POST["product_checkvalue"])
				);
				$_SESSION["shopping_cart"][] = $item_array;
				$_SESSION["alright"] = 1;
			}
		}
		else
		{
			$item_array = array(
				'product_id'               =>     filter_var($_POST["product_id"]),  
				'product_name'             =>     filter_var($_POST["product_name"]),  
				'product_price'            =>     filter_var($_POST["product_price"]),  
				'product_quantity'         =>     filter_var($_POST["product_quantity"]),
				'product_checkvalue'       =>     filter_var($_POST["product_checkvalue"])
			);
			$_SESSION["shopping_cart"][] = $item_array;
			$_SESSION["alright"] = 1;
		}
		
	}

	if($_POST["action"] == 'remove')
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["product_id"] == filter_var($_POST["product_id"]))
			{
				unset($_SESSION["shopping_cart"][$keys]);
			}
		}
	}
	if($_POST["action"] == 'empty')
	{
		unset($_SESSION["shopping_cart"]);
		
	}
	

}

?>