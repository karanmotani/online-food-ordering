<?php
session_start();
$userEmail = $_SESSION["userEmail"];
// echo '<script type="text/javascript">alert("'. $userEmail .'");</script>';
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "food";

$con = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

if (!$con)
{
    echo "Connection failure. ";
    return false;
}

$query = "  SELECT * 
            FROM user
            WHERE EMAIL=\"$userEmail\";";

$result = mysqli_query($con, $query) or die('MySQL query error');
$r = mysqli_fetch_array($result);

$query1 = "SELECT STREET
            FROM location
            WHERE ID=".$r['ID'];

$result1 = mysqli_query($con, $query1) or die('MySQL query error');
$r1 = mysqli_fetch_array($result1);
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
    <link rel="stylesheet" href="css/passwordscheck.css" />
    <link rel="stylesheet" href="css/userExists.css" />
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="js/passwordscheck.js"></script>
    <script src="js/userExists.js"></script>

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
    <section id="Register">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Profile</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email Address</label>
                                Email:
                                <input type="email" class="form-control" placeholder="Email Address" 
                                value="<?php echo $r['EMAIL'];?>" id="email" disabled>
                                <p class="help-block text-danger"></p>
                                <span id='exists'></span>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Update Password</label>
                                Password:
                                <input type="password" class="form-control" placeholder="Password" id="password" name="password" required data-validation-required-message="Please enter your password.">
                                <p class="help-block text-danger"></p>
                                <span id='result'></span>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Confirm Password</label>
                                Confirm Password:
                                <input type="password" class="form-control" placeholder="Confirm Password" name="confirmpassword" data-validation-matches-match="password" data-validation-matches-message="The password does not match.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Name</label>
                                Name:
                                <input type="text" class="form-control" value="<?php echo $r['FULLNAME'];?>" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Phone Number</label>
                                Phone:
                                <input type="tel" class="form-control" value="<?php echo $r['PHONE'];?>" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                                <span id='prettyNumber'></span>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Address</label>
                                Address:
                                <input type="text" class="form-control" value="<?php echo $r1['STREET'];?>" placeholder="Address" id="address" required data-validation-required-message="Please enter address."></input>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
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
    <script src="js/profile.js"></script>
    <script src="js/login.js"></script>
    <script src="js/freelancer.min.js"></script>
    <script type="text/javascript" src="js/prettyPhoneNumber.js"></script>
</body>
</html>
