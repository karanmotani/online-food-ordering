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

    <title>eAt It Or BeAt It!</title>
	
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
            <div class="row">
			    <div class="col-sm-5 portfolio-item">
                    <img src="img/students-offer.jpg" class="img-responsive" alt="">
					<p><strong>USE CODE : STDNT121</strong></p>
					<p><strong>To get 25% cash back</strong></p>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <img src="img/mon.jpg" class="img-responsive" alt=""></br>
                    <p><strong>USE CODE : MONOFF</strong></p>	
                    <p><strong>To get 50% cash back</strong></p>					
                </div>
				<div class="col-sm-3 portfolio-item">
                    <img src="img/free_delivery.png" class="img-responsive" alt=""></br>
                    <p><strong>USE CODE : FREEDEL</strong></p>				
				</div>                               
		    </div>
        </div>
    </section>
    <div id="footer"></div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>
    <script src="js/freelancer.min.js"></script>
</body>
</html>
