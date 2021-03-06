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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Exo|Kavoon" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Chango" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <script type="text/javascript" src="js/login.js"></script>
</head>

<body id="page-top" class="index">
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <div class="navbar-header page-scroll">
                <a class="navbar-left" href="index.php">
                    <img src="img\logo1.png" alt="Hunger Station!" 
                        style="margin-right: 10px; height: 55px; width: 110px;">
                </a>
            </div>
            
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="all_items.php#portfolio">All Items</a>
                    </li> 
                    <li class="page-scroll">
                        <a href="edit_food.php#add_item">Add Item</a>
                    </li>
                    <?php

                    if(isset($_SESSION['user']) && (trim($_SESSION['user']) != '')) {
                        echo "<li class='page-scroll' style='border: 1px solid white; border-radius:15px;'><a>Hi ".$_SESSION['user']."!</a></li>";
                        echo "<li class='page-scroll'><a href='javascript:void(0)' onclick='logout();'>Logout</a></li>";
                    }
                    else {
                        echo "<li class='page-scroll'><a href='javascript:void(0)' data-toggle='modal' data-target='#loginFrame'>Login</a></li>";
                        echo "<li class='page-scroll'><a href='register.php'>Register</a></li>";
                    }
                    ?>		
                    <li class="page-scroll">
                        <a href="stock.php">Inventory</a>
                    </li>			
                </ul>
            </div>
        </div>
    </nav>
    
    <header>
        <div class="container">
            <div class="row">
                <div class="bgimg">
                    <div class="intro-text">
                        <span class="name" style="text-shadow: -1px 0 cyan, 0 1px cyan, 1px 0 grey, 0 -1px grey; font-family: 'Chango', cursive; letter-spacing: 1px; font-size: 70px;">Hunger Station</span>
                        <hr class="star-light">
                        <span class="skills">Authentic Indian and Chinese Delicacies </span>
                        <form method="POST" name="search_form" action="search_admin.php#portfolio" id="search_form">
                            <div class="col-lg-2 col-lg-offset-2 styled-select slate">
                                <select name="search_food1">
                                    <option value="" selected>Select Cuisine</option>
                                    <option value="indian">Indian</option>
                                    <option value="chinese">Chinese</option>
                                    <option value="breakfast">Breakfast</option>
                                    <option value="lunch">Lunch</option>
                                    <option value="chaat">Chaats</option>
                                    <option value="dinner">Dinner</option>
                                    <option value="dessert">Desserts</option>
                                    <option value="snack">Snacks</option>
                                    <option value="beverage">Beverages</option>
                                </select>
                            </div>

                            <div class="col-lg-4 col-xs-1">
                                <input type="text" name="search_food" class="form-control" placeholder="Search" id="search_food" style='margin-top:25px;'>
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="form-group col-xs-1">
                                <button type="submit" class="btn btn-success btn-lg" 
                                        style='margin-top:25px;display: inline;height:35px;width:130px;font-size:1.2em;background-color: #2E8B57; padding: 0 20px;'> Search
                                </button>
                            </div >
                        </form>
                    </div>
                </div>
            </div>
        </div>
   </header>
   
   <div class="modal fade" id="loginFrame" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Login</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4 col-lg-offset-2">
                            <label>Email Address</label>
                            <input type="email" class="form-control" placeholder="Email Address" id="loginemail" required data-validation-required-message="Please enter your email address.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="col-lg-4">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="password" id="loginpassword" required data-validation-required-message="Please enter the right password.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type='button' class='btn btn-default' data-dismiss='modal'>Cancel</button>
                    <button type='button' class='btn btn-success' onclick='login()'>Login</button>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>