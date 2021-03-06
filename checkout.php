<?php
session_start();
$dbc = mysqli_connect('localhost','root','root','food');

if (!isset($_SESSION["user"])) {
    echo "<script language='javascript'>";
    echo "alert(\"Please login to Checkout!\");";
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
    <title>Hunger Station!</title>
    <link rel="icon" href="img/giphy.gif"/>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/freelancer.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <link href="css/cart.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/passwordscheck.css">
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
            <h2>Checkout</h2>
            <hr class="star-primary">
        </div>
    </div>
    <div id="shopping-cart">
        <div class="txt-heading">Checkout</div>
        <?php
        if(isset($_SESSION["cart_item"])){
            $item_total = 0;
            ?>	
            <table cellpadding="10" cellspacing="1" align="right">
                <tbody>
                    <tr>
                        <th><center><strong>Name</strong></center></th>
                        <th><center><strong>Quantity</strong></center></th>
                        <th><center><strong>Price</strong></center></th>
                    </tr>	
                    <?php		
                    foreach ($_SESSION["cart_item"] as $item) {
                        ?>
                        <tr>
                           <td><center><strong><?php echo $item["item_name"]; ?></strong></center></td>
                           <td><center><?php echo $item["quantity"]; ?></center></td>
                           <td><center><?php echo "$".$item["price"]; ?></center></td>
                       </tr>
                       <?php
                       $item_total += ($item["price"]*$item["quantity"]);
                   }

                   $subTotal = $item_total;
                   $tax = $subTotal * 0.08;
                   $delivery = 3.99;
                   $gTotal = $subTotal + $tax + $delivery;

                   ?>

                   <tr>
                        <td></td>
                        <td></td>
                       <td><center><?php echo "----------------"; ?></center></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><center><strong>SubTotal: </strong>$<?php echo $subTotal; ?></center></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td><center><strong>Tax: </strong>$<?php echo $tax; ?></center></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td><center><strong>Delivery: </strong>$<nature id='delivery'><?php echo $delivery; ?></nature></center></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td><center><?php echo "----------------"; ?></center></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td><center><strong>Net Total: </strong>$<nature id='gTotal'><?php echo $gTotal; ?></nature></center></td>
                    </tr>

            </tbody>
        </table>
        <?php
    }
    else
        echo "<button class='btn' onclick='location.href=\"index.php\"'>Continue Shopping</button>"
    ?>
    </div>
    <br/>
    <br/>
<section id="Register">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <form name="payment" method = "POST" id="payment" action="place_order.php">				
                  <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <h4>Promo Code: </h4>
                        <input style='display: inline; width: 98%;' type="text" class="form-control"  name="promoCode" id="promoCode" placeholder="Enter Valid Promo Code">
                        <p style='display: inline; width: 2%;' class="help-block text-danger" id='promo'></p>
                    </div>
                </div>
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <h4>Name on Card: </h4>
                        <input type="text" class="form-control"  name="name_on_card" id="name_on_card" data-validation-required-message="Please enter Name" placeholder="Enter name on Card" required>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <h4>Card Number: </h4>
                        <input type="number" class="form-control" id="card_number" name="card_number" required data-validation-required-message="Please enter Valid Card Number" placeholder="Enter 16 digit Card Number" size="16">
                        <p class="help-block text-danger"></p>
                        <span id='checkValidCard'></span>
                    </div>
                </div>
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <h4>Expiration Date: </h4>
                        <select id="type" name="type" style='display: inline;' required>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>

                        </select> 

                        <select id="type" name="type" style='display: inline;' required>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                        </select> 
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
            <!-- </form> -->
            <p class="help-block text-danger"></p>
            <button class='btn' onclick="history.go(-1)">Continue Shopping</button>
        </br>
    </br>
    <!-- <form action="place_order.php" method='POST'> -->
       <button id='check1' class='btn btn-danger'>Place Order</button>
   </form>
</div>
</div>
</div>
</section>
<p class="help-block text-danger"></p>
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
<script type="text/javascript" src="js/promo.js"></script>
</body>
</html>