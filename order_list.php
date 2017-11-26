<?php
session_start();
$dbc = mysqli_connect('localhost','root','root','food');
?>

<?php
if (!isset($_SESSION["user"])) {
	echo "<script language='javascript'>";
	echo "location='index.php'";
	echo "</script>";
	exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Order History</title>
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
	<section id="portfolio">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2>My Orders</h2>
					<hr class="star-primary">
				</div>
			</div>

			<div id="shopping-cart">
				<div class="txt-heading"><h4><center>Orders</center></h4></div>
				<?php
				if(isset($_SESSION['user'])){
					?>	
					<table cellpadding="10" cellspacing="1" align="right">
						<tbody>
							<tr>
								<th><center><strong>Name</strong></center></th>
								<th><center><strong>Quantity</strong></center></th>
								<th><center><strong>Price</strong></center></th>
								<th><center><strong>Total</strong></center></th>
								<th><center><strong>Status for Next Order</strong></center></th>
								<th><center><strong>Date</strong></center></th>

							</tr>	
							<?php		

							$order_id=0;
							$item_id=0;
							$items_price=0;
							$qty=0;
							$item_name="";
							$email=$_SESSION['user'];
							$query_select_order_id="SELECT order_id, order_date, total_amt, promoFlag FROM food.orders WHERE email='$email' order by order_id desc"; 
							$get_select_order_id= mysqli_query($dbc,$query_select_order_id);

							if(mysqli_num_rows($get_select_order_id))
		{ // if one or more rows are returned do following
			while($r = mysqli_fetch_assoc($get_select_order_id))
			{
				echo "<tr>
				<td><center>Order Number: ".$r["order_id"]."</center></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td><center>".$r["order_date"]."</center></td></tr>";

				$order_id=$r["order_id"];
				$tot_amt1 = $r["total_amt"];
				$promoFlag = $r["promoFlag"];
				
				$query_select_order_items="SELECT item_id,items_price,qty FROM food.order_items 
				WHERE order_id= '$order_id'"; 
				$get_select_order_items= mysqli_query($dbc,$query_select_order_items);
				
				if(mysqli_num_rows($get_select_order_items))
		            { // if one or more rows are returned do following
		            	$megatots = 0;
		            	while($r = mysqli_fetch_assoc($get_select_order_items))
		            	{
		            		$tots = 0;
		            		$item_id=$r["item_id"];
		            		$items_price=$r["items_price"];
		            		$qty=$r["qty"];
		            		$tots += $items_price*$qty;
		            		$megatots += $tots;

		            		$query_select_items_name="SELECT item_name,status,stock FROM food.food_item 
		            		WHERE item_id= '$item_id'"; 
		            		$get_select_items_name= mysqli_query($dbc,$query_select_items_name);

		            		if(mysqli_num_rows($get_select_items_name))
		                    { // if one or more rows are returned do following
		                    	$countyy = mysqli_num_rows($get_select_items_name);
		                    	$countyz = 0;
		                    	while($r = mysqli_fetch_assoc($get_select_items_name))
		                    	{
		                    		$countyz += 1;
		                    		$item_name=$r["item_name"];
		                    		$item_status=$r["status"];
		                    		$item_stock=$r["stock"];

		                    		?>
		                    		<tr>
		                    			<td width="25%"><center><strong><?php echo ucfirst($item_name); ?></strong></center></td>
		                    			<td width="10%"><center> <?php echo $qty; ?></center></td>
		                    			<td width="10%"><center> <?php echo "$".$items_price; ?></center></td>
		                    			<?php if($countyz==$countyy){ ?>
		                    			<td width="15%"><center><?php echo "$".$tots ?></center></td>
		                    			<td width="25%"><center><strong><?php if($item_status=="a" && $item_stock>0){echo "In Stock";}
		                    			else if($item_status=="a" && $item_stock<=0){echo "Not in Stock";} else {echo "Discontinued";} ?></strong></center></td>
		                    			<?php } 
		                    			else {?>
		                    			<td width="25%"></td>
		                    			<?php } ?>
		                    			<td width="15%"></td>
		                    		</tr>


		                    		<?php }

		                    	} 						
		                    }
		                }
		                ?> 
		                <tr>
		                	<td></td>
		                	<td></td>
		                	<td></td>
		                	<td><center><?php echo "------------";?></center></td>
		                	<td></td>
		                	<td></td>
		                </tr>
		                <tr>
		                	<td></td>
		                	<td></td>
		                	<td><center></center></td>
		                	<td>
		                		<center>
		                			<strong>
		                				<?php echo "$".$tot_amt1; ?>
		                			</strong>
		                		</center>
		                	</td>
		                	<td><center>
		                		<sup style="color: red;">
		                			<?php if($promoFlag==1) {echo '&#10039;'; ?>
		                		</sup>
		                		<i style="color: #006400;">Promo Code Applied</i>
		                		<?php } ?>
		                	</center></td>
		                	<td></td>
		                </tr>
		                <tr>
		                	<td><?php echo "--------------------"; ?></td>
		                	<td><?php echo "--------"; ?></td>
		                	<td><?php echo "--------"; ?></td>
		                	<td><?php echo "------------"; ?></td>
		                	<td><?php echo "--------------------"; ?></td>
		                	<td><?php echo "------------"; ?></td>
		                </tr>
		                <?php
		            }
		        }
		    }
		    ?>
		</tbody>
	</table>
</div>
</div>
</section>
<div id="footer"></div>
<div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
	<a class="btn btn-primary" href="#page-top">
		<i class="fa fa-chevron-up"></i>
	</a>
</div>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="js/jqBootstrapValidation.js"></script>
<script src="js/register.js"></script>
<script src="js/login.js"></script>
<script src="js/freelancer.min.js"></script>
</body>
</html>