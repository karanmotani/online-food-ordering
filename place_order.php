<?php
session_start();
//require_once("dbcontroller.php");
//$db_handle = new DBController();
$dbc = mysqli_connect('localhost','root','root','food');
$email=$_SESSION['user'];
$_SESSION["totalNoItems"] = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Checkout</title>
	<link rel="icon" href="img/giphy.gif" />
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/freelancer.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <link href="css/cart.css" type="text/css" rel="stylesheet" />
    <script> 
    $(function()
	{
        $("#header").load("user_header.php"); 
        $("#footer").load("user_footer.php"); 
    });
    </script> 
</head>
<body id="page-top" class="index">
    <div id="header"></div>
<?php
    
	
	if(isset($_SESSION["cart_item"]))
	{
	$item_total = 0;
	$item_name_inventory="";
	$order_id=0;
	$stock="";
	$stock_DB="";
	$qty="";
	echo $email;
	$item_id=0;
	$balance=0;
	foreach ($_SESSION["cart_item"] as $item)
	{
		$qty=$item["quantity"]; 
	    $price=$item["price"];
		$balance+=$qty*$price;
	}
		$query_insert_orders="INSERT INTO food.orders (email, total_amt, order_date)
                 	         VALUES ('$email', '$balance',(now()))"; 
	    $get_insert_orders= mysqli_query($dbc,$query_insert_orders);		
		$query_get_order_id="SELECT max(order_id) FROM food.orders"; 
	    $get_order_id= mysqli_query($dbc,$query_get_order_id);
		
		if(mysqli_num_rows($get_order_id))
		{ // if one or more rows are returned do following
	        while($r = mysqli_fetch_assoc($get_order_id))
			{
                $order_id=$r["max(order_id)"];
			}
        }
		echo $order_id;
	
    foreach ($_SESSION["cart_item"] as $item)
	{
		$item_name_inventory=$item["item_name"]; 
		$qty=$item["quantity"]; 
	    $price=$item["price"]; 
		echo $item_name_inventory;		 
		echo $qty;
		
		$item_total += ($item["price"]*$item["quantity"]);
		
		
		$query_stock="SELECT item_id,stock FROM food.food_item where item_name = Rtrim(Ltrim('$item_name_inventory'))"; 
	    $get_stock= mysqli_query($dbc,$query_stock);
	
        if(mysqli_num_rows($get_stock))
		{ // if one or more rows are returned do following
	        while($r = mysqli_fetch_assoc($get_stock))
			{
                $stock_DB=$r["stock"];
				$item_id=$r["item_id"];
			}
        }
		
		
		
		echo $stock_DB;
		$stock=$stock_DB-$qty;
		echo $stock;
				
		$query_stock_update="UPDATE food.food_item SET stock='$stock'
			                 WHERE item_name='$item_name_inventory'"; 
	    $get_stock_update= mysqli_query($dbc,$query_stock_update);
		$query_insert_order_items="INSERT INTO food.order_items (order_id, item_id,items_price,qty)
                 	               VALUES ('$order_id', '$item_id','$price','$qty')"; 
	    $get_insert_order_items= mysqli_query($dbc,$query_insert_order_items);
	}
		foreach($_SESSION["cart_item"] as $k => $v)
		{
			unset($_SESSION["cart_item"][$k]);				
			if(empty($_SESSION["cart_item"]))
			unset($_SESSION["cart_item"]);
		}
		
		echo "<script>
              alert('Order Placed! Your FOOD will arrive in 45 minutes');
              window.location.href='index.php#portfolio';
             </script>";
}
?>
</body>
</html>