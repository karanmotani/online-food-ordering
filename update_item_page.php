<?php
session_start();
?>

<?php
    $item_desc_box=$_POST['item_desc_box'];
    $item_name_loc=$_POST['item_name_box'];
    
    $dbc = mysqli_connect('localhost','root','root','food');
    if(mysqli_connect_errno())
    { 
       echo "not connected:" . mysqli_connect_errno();
    }
	$id="";
	$_SESSION["sess_item_id_for_update"]="";
    $query_id="SELECT item_id FROM food_item where item_name = Rtrim(Ltrim('$item_name_loc'))"; 
	$get_id= mysqli_query($dbc,$query_id);
    if(mysqli_num_rows($get_id))
		{ 
	        while($r = mysqli_fetch_assoc($get_id))
			{
                $id=$r["item_id"];
				
			}
        }       
    $_SESSION["sess_item_id_for_update"]=$id;
	$query_get_details="SELECT item_name,description,price,stock,type,image from food_item 
                        JOIN category where food_item.item_id=$id and category.item_id=$id";
	$get_details = mysqli_query($dbc,$query_get_details);
	$item_name_from_DB="";
    $item_desc_from_DB="";
	$item_price_from_DB="";
    $item_stock_from_DB="";
	$item_type_from_DB="";
    $item_image_from_DB="";
	if(mysqli_num_rows($get_details))
		{ // if one or more rows are returned do following
	        while($r = mysqli_fetch_assoc($get_details))
			{
                //$id=$r["item_id"];
				$item_name_from_DB=$r["item_name"];
                $item_desc_from_DB=$r["description"];
	            $item_price_from_DB=$r["price"];
                $item_stock_from_DB=$r["stock"];
	            $item_type_from_DB=$r["type"];
                $item_image_from_DB=$r['image'];
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
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	
    <title>eAt It Or BeAt It!</title>

	<link rel="icon" href="img/giphy.gif" />
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/freelancer.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">    
</head>

<body id="page-top" class="index">
 <section id="add_item">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Update Item</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <form name="add_new_item" method="POST" enctype="multipart/form-data" action="update.php" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <h4>Item Name</h4>
                                <input type="text" class="form-control" value="<?php echo $item_name_from_DB ?>"  id="item_name_update" name="item_name_update" required data-validation-required-message="Please enter item name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <h4>Price</h4>
                                <input type="number" class="form-control"  value="<?php echo $item_price_from_DB ?>"  id="price" name="price" required data-validation-required-message="Please enter price.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <h4>Description</h4>
                                <input type="text" class="form-control" value="<?php echo $item_desc_from_DB ?>" id="item_desc" name="item_desc" required data-validation-required-message="Please enter item description.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>	
						<div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <h4>Type</h4>
						        <select id="choose_type" name="choose_type" style="inline">
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
                                <h4>Stock</h4>
                                <input type="number" class="form-control" value="<?php echo $item_stock_from_DB ?>" id="stock" name="stock" required data-validation-required-message="Please enter stock."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 portfolio-item">
                                <label>Select image to upload:</label>
                                <input type="file" name="image" id="fileToUpload">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
						<p class="help-block text-danger"></p>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg" >Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
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