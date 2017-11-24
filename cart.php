<?php
session_start();
$dbc = mysqli_connect('localhost','root','root','food');
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
            $query = "SELECT * FROM food_item WHERE item_id='" . $_GET["code"] . "'";
            $result = mysqli_query($dbc, $query);
            while($row=mysqli_fetch_assoc($result)) {
                $resultset[] = $row;
            }
            $item_quantity = $resultset[0]["stock"];
            echo $item_quantity;
            $productByCode = $resultset;
			$itemArray = array($productByCode[0]["item_id"]=>array('item_name'=>$productByCode[0]["item_name"], 'item_id'=>$productByCode[0]["item_id"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));
			if(!empty($_SESSION["cart_item"])) {
			    $xxx=0;
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["item_id"] == $_SESSION["cart_item"][$k]["item_id"])
								{
                                    $_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
                                    $xxx=1;
                                }
					}
                if ($xxx==1){
                    $xxx=$xxx;
                } else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
	break;

	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $_SESSION["cart_item"][$k]["item_id"])
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;

	case "empty":
		unset($_SESSION["cart_item"]);
	break;

    case "update":
        $query = "SELECT * FROM food_item WHERE item_id='" . $_GET["code"] . "'";
        $result = mysqli_query($dbc, $query);
        while($row=mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
        }
        $item_quantity = $resultset[0]["stock"];
        echo $item_quantity;
        $productByCode = $resultset;
        $itemArray = array($productByCode[0]["item_id"]=>array('item_name'=>$productByCode[0]["item_name"], 'item_id'=>$productByCode[0]["item_id"], 'quantity'=>$_GET["quantity"], 'price'=>$productByCode[0]["price"]));
        if(!empty($_SESSION["cart_item"])) {
            $xxx=0;
                foreach($_SESSION["cart_item"] as $k => $v) {
                        if($productByCode[0]["item_id"] == $_SESSION["cart_item"][$k]["item_id"])
                            {
                                $_SESSION["cart_item"][$k]["quantity"] = $_GET["quantity"];
                                $xxx=1;
                            }
                }
            if ($xxx==1){
                $xxx=$xxx;
            } else {
                $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
            }
        } else {
            $_SESSION["cart_item"] = $itemArray;
        }
    break;  
}
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

    <title>Shopping Cart</title>

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
<div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>Shopping Cart</h2>
                        <hr class="star-primary">
                    </div>
                </div>
<div id="shopping-cart">
<div class="txt-heading"><strong>Shopping Cart</strong><a id="btnEmpty" href="cart.php?action=empty">Empty Cart</a></div>
<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>	
<table cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th><center><strong>Name</strong></center></th>
<th><center><strong>Quantity</strong></center></th>
<th><center><strong>Price / Unit</strong></center></th>
<th><center><strong>Price</strong></center></th>
<th><center><strong>Action</strong></center></th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
		?>
				<tr>
                <td><center><strong><?php echo ucfirst($item["item_name"]); ?></strong></center></td>
                <!-- <td><center><?php echo $item["quantity"]; ?></center></td> -->
		<td><center><?php echo '<input type="number" class="cartQuantity" id="'. $item["item_id"] ."@".$item["item_name"].'" name="quantity" value="'.$item["quantity"].'" min="1" max="'.$item_quantity.'" style="width:50px;">'; ?></center></td>
				<td><center><?php echo "$".$item["price"]; ?></center></td>
				<td><center><?php echo "$".$item["price"]*$item["quantity"]; ?></center></td>
				<td><center><a href="cart.php?action=remove&code=<?php echo $item["item_id"]; ?>" class="btnRemoveAction">Remove Item</a><center></td>
				</tr>
				<?php
        $item_total += ($item["price"]*$item["quantity"]);
		}
		?>
<tr>
</br>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
</tr>
<tr>
</br>
<td></td>
<td></td>
<td></td>
<td></td>
<td align=center><strong>Total:</strong> <?php echo "$".$item_total; ?></td>
</tr>
</tbody>
</table>
<button class='btn' onclick="history.go(-1)">Continue Shopping</button>
</br>
</br>
<form action="checkout.php#portfolio" method='POST'>
	<button class='btn btn-danger' >CheckOut</button>
</form>
<?php
}
else
echo "<button class='btn' onclick='location.href=\"index.php\"'>Continue Shopping</button>"
?>
</div>
</br>
</br>
<div id="footer"></div>
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/register.js"></script>
    <script src="js/login.js"></script>
    <script src="js/freelancer.min.js"></script>
    <script src="js/cartUpdate.js"></script>
</body>
</html>