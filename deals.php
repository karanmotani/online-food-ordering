<?php
session_start();
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
	
	<link rel="icon" href="img/giphy.gif" />
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/freelancer.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
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
                    <h2>Specials</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <br>
            <div class="row">
                <center>
                <div style="display: inline-block; margin-right: 150px;">
                    <img src="img/c3.jpg" class="img-responsive" alt="" style="height: 250px; width: 400px;"></br>
                    <p><strong>USE CODE : HSOFF50</strong></p>	
                    <p><strong>To get 50% discount!</strong></p>					
                </div>
				<div style="display: inline-block;">
                    <img src="img/free_delivery.png" class="img-responsive" alt="" style="height: 250px; width: 400px;"></br>
                    <p><strong>USE CODE : HSFREEDEL</strong></p>
                    <p><strong>To get <font color="red">FREE</font> Delivery!</strong></p>				
				</div>       
                <br><hr><br>
                <div style="display: inline-block; margin-right: 150px;">
                    <img src="img/c2.jpg" alt="" style="height: 450px; width: 350px;">
                    <p><strong>USE CODE : HSGET15</strong></p>
                    <p><strong>To get 15% discount!</strong></p>
                </div>
                <div style="display: inline-block;">
                    <img src="img/easter.jpg" alt="" style="height: 450px; width: 350px;"></br>
                    <p><strong>USE CODE : HSEAS50</strong></p>
                    <p><strong>To get 50% Off this EASTER!</font></strong></p>               
                </div> 
                </center>                     
		    </div>
        </div>
    </section>
    <div id="footer"></div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/freelancer.min.js"></script>
</body>
</html>
