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
</head>

<body id="page-top" class="index">
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
				<a class="navbar-brand" href="#page-top">
				<img src="img\spoon-and-fork.png" alt="Chow down" width="45" height="43"></a>
                <a class="navbar-brand" href="#page-top">~ eAt It Or BeAt It! ~</a>
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
					<li class="page-scroll">
                        <a href="#" onclick="logout()">Logout</a>
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
                        <span class="name" >~ eAt It Or BeAt It! ~</span>
                        <hr class="star-light">
                        <span class="skills">Authentic Indian and Chinese Delicacies </span>
						</br>
						</br>
						<form method="POST" name="search_form" action="search_admin.php#portfolio" id="search_form">
					        <div class="col-lg-4 col-lg-offset-4">
                                <input type="text" name="search_food" class="form-control" placeholder="Search" id="search_food">
								<p class="help-block text-danger"></p>
							</div>
							<div class="form-group col-xs-1">
                                <button type="submit" class="btn btn-success btn-lg" style="display: inline;">Search</button>
                            </div >
					    </form>
				   </div>
               </div>
           </div>
        </div>
    </header>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/login.js"></script>
    <script src="js/freelancer.min.js"></script>
</body>
</html>