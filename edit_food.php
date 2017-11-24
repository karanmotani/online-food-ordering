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
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
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
        $("#header").load("user_header1.php");
        $("#footer").load("user_footer.php"); 
    });
    </script>
</head>

<body id="page-top" class="index">

    <div id="header"></div>
    <section id="add_item">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>ADD ITEM</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <form name="add_new_item" id="add_item_form" method="POST" enctype="multipart/form-data" action="add_item_page.php" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Item Name</label>
                                <input type="text" class="form-control" placeholder="Name" id="item_name_update" name="item_name_update" required data-validation-required-message="Please enter item name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Price</label>
                                <input type="number" class="form-control" placeholder="Price" id="price" name="price" required data-validation-required-message="Please enter price.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Description</label>
                                <input type="text" class="form-control" placeholder="Item Description" id="item_desc" name="item_desc" required data-validation-required-message="Please enter item description.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
						<div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <h4>Type</h4>
						        <select id="type" name="type" style="inline">
                                    <option value="indian">indian</option>
                                    <option value="chinese">chinese</option>
                                    <option value="dessert">dessert</option>
                                    <option value="breakfast">breakfast</option>
                                    <option value="lunch">lunch</option>
                                    <option value="dinner">dinner</option>
                                    <option value="beverage">beverage</option>
                                    <option value="snack">snack</option>
                                    <option value="chaat">chaat</option>
                                </select> 
		                    <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Stock</label>
                                <textarea type="number" class="form-control" placeholder="Stock" id="stock" name="stock" required data-validation-required-message="Please enter stock."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
					<div class="row">
                        <div class="col-sm-4 portfolio-item">
                                <label>Select image to upload:</label>
                                <input type="file" name="image" id="image">
                                <p class="help-block text-danger"></p>
                        </div>
                    </div>
						<p class="help-block text-danger"></p>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Update</button>
                            </div>
                        </div>
                    </form>

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
    <script src="js/contact_me.js"></script>
    <script src="js/freelancer.min.js"></script>
</body>
</html>