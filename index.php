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
                    <h2>Cuisines</h2>
                    <hr class="star-primary">
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-4 portfolio-item">
                    <a href="cuisines.php?cuisines=Indian" class="portfolio-link">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-2x"></i>
								<p>Indian</p>
                            </div>
                        </div>
                        <img src="img/indian_food.jpg" style='width:360px; height:240px; border-radius: 25px; border: 2px solid rgba(44, 62, 80, 0.5);' class="img-responsive" alt="IndianFood">
                    </a>
                </div>

                <div class="col-sm-4 portfolio-item">
                    <a href="cuisines.php?cuisines=chinese" class="portfolio-link" >
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-2x"></i>
								<p>Chinese</p>
                            </div>
                        </div>
                        <img src="img/chinese_chopstick.jpg" style='width:360px; height:240px; border-radius: 25px; border: 2px solid rgba(44, 62, 80, 0.5);' class="img-responsive" alt="ChineseFood">
                    </a>
                </div>

                <div class="col-sm-4 portfolio-item">
                    <a href="cuisines.php?cuisines=dessert" class="portfolio-link">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-2x"></i>
								<p>Desserts</p>
                            </div>
                        </div>
                        <img src="img/icecream.jpg" style='width:360px; height:240px; border-radius: 25px; border: 2px solid rgba(44, 62, 80, 0.5);' class="img-responsive" alt="Desserts">
                    </a>
                </div>

                <div class="col-sm-4 portfolio-item">
                    <a href="cuisines.php?cuisines=breakfast" class="portfolio-link">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-2x"></i>
								<p>Breakfast</p>
                            </div>
                        </div>
                        <img src="img/egg_breakfast.jpg" style='width:360px; height:240px; border-radius: 25px; border: 2px solid rgba(44, 62, 80, 0.5);' class="img-responsive" alt="Breakfast">
                    </a>
                </div>

                <div class="col-sm-4 portfolio-item">
                    <a href="cuisines.php?cuisines=lunch" class="portfolio-link">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-2x"></i>
								<p>Lunch</p>
                            </div>
                        </div>
                        <img src="img/lunch.jpg" style='width:360px; height:240px; border-radius: 25px; border: 2px solid rgba(44, 62, 80, 0.5);' class="img-responsive" alt="Lunch">
                    </a>
                </div>

                <div class="col-sm-4 portfolio-item">
                    <a href="cuisines.php?cuisines=dinner" class="portfolio-link">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-2x"></i>
								<p>Dinner</p>
                            </div>
                        </div>
                        <img src="img/dinner.jpg" style='width:360px; height:240px; border-radius: 25px; border: 2px solid rgba(44, 62, 80, 0.5);' class="img-responsive" alt="Dinner">
                    </a>
                </div>

				<div class="col-sm-4 portfolio-item">
                    <a href="cuisines.php?cuisines=beverage" class="portfolio-link">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-2x"></i>
								<p>Beverages</p>
                            </div>
                        </div>
                        <img src="img/beverage.jpg" style='width:360px; height:240px; border-radius: 25px; border: 2px solid rgba(44, 62, 80, 0.5);' class="img-responsive" alt="Beverages">
                    </a>
                </div>

				<div class="col-sm-4 portfolio-item">
                    <a href="cuisines.php?cuisines=snack" class="portfolio-link">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-2x"></i>
								<p>Snacks</p>
                            </div>
                        </div>
                        <img src="img/index_nachoo.jpg" style='width:360px; height:240px; border-radius: 25px; border: 2px solid rgba(44, 62, 80, 0.5);' class="img-responsive" alt="Snacks">
                    </a>
                </div>

				<div class="col-sm-4 portfolio-item">
                    <a href="cuisines.php?cuisines=chaat" class="portfolio-link">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-2x"></i>
								<p>Chaats</p>
                            </div>
                        </div>
                        <img src="img/panipuri.jpg" style='width:360px; height:240px; border-radius: 25px; border: 2px solid rgba(44, 62, 80, 0.5);' class="img-responsive" alt="Chaats">
                    </a>
                </div>
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
    <script src="js/login.js"></script>
    <script src="js/freelancer.min.js"></script>

</body>
</html>