<?php
session_start();
?>

<?php
if($_SESSION['roles'] != 01) {
    Header("HTTP/1.1 303 See Other");
    Header("Location: index.php");
    exit;
}

$page_count = 8;
$ount = 0;
$item_search=$_POST['search_food'];
$dbc = mysqli_connect('localhost','root','root','food');
$total=0;

if(mysqli_connect_errno())
{
    echo "not connected:" . mysqli_connect_errno();
}
$lim = $_GET['page'];

if ($lim == null)
    $lim = 0;
$ount = $_SESSION['ount'];

$query_items="SELECT item_id,item_name, description,image FROM food_item where status='a' limit  " . $lim . ", 12 ";
$query1 = "SELECT item_id,item_name, description,image FROM food_item where status='a'";
$all_items = mysqli_query($dbc,$query_items);
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
    <link href="css/my_css.css" rel="stylesheet">
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
	<section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>All Items</h2>
                    <hr class="star-primary">
                    <form id='pageForm'>
                        <input type='HIDDEN' id='page' value=<?php echo "'".$lim."'"; ?>>
                        <input type='button' class='btn btn-xs' onclick='previousPage()' value='Previous Page'>
                        <span id='itemCount'> </span>
                        <input type='button' id='nxtPage' class='btn btn-xs' onclick='nextPage()' value='Next Page'>
                    </form>
                </div>
            </div>
            <div class="row">
                <br>

                <?php

                $numberResults = mysqli_query($dbc,$query1);
                $ount = (ceil(mysqli_num_rows($numberResults)));

                $_SESSION['ount'] = $ount;
                $_SESSION['search']=$search;

                if(mysqli_num_rows($all_items))
		{ // if one or more rows are returned do following
            while($r = mysqli_fetch_assoc($all_items))
            {
                $item_id=$r['item_id'];
                $item_name=$r['item_name'];
                $item_desc=$r['description'];
                $item_image=$r['image'];

                $image = base64_encode($item_image);
                $dispImg = "<img src='data:image/jpg;base64,{$image}' style='width:360px; height:240px; border-radius: 25px; border: 2px solid rgba(44, 62, 80, 0.5);' class='img-responsive' alt=''>";

                /*

                $image = base64_encode($_SESSION['sessionAvatar']);
                $dispImg = "<img src='data:image/png;base64,{$image}' style=' height: 100px; width: 100px;'>";

                */

                ?>	
                <div class="col-sm-4 portfolio-item">
                    <!-- <img src="img/<?php echo $item_name ?>.jpg" class="img-responsive" alt=""></br> -->
                    <!-- <img src="<?php $dispImg; ?>" class="img-responsive" alt=""></br> -->
                    <?php echo $dispImg; ?><br />
                    <form method="POST" action="update_item_page.php"novalidate>
                       <input class="textbox" name="item_desc_box" id="item_desc_box" type="text" readonly="true" value= "<?php echo $item_desc ?>" />
                       <input class="itembox" name="item_name_box" size="2" id="item_name_box" type="text" readonly="true" value= "<?php echo $item_name ?>" />
                       <button type="submit" class="btn btn-success btn-lg" style="display: center;width:100%">Update</button>
                   </form>
                   <form action="delete_item.php" method='POST'>
                       <input class="itembox" name="item_name_box" id="item_name_box" type="text" readonly="true" value= "<?php echo $item_name ?>" />
                       <button type="submit" class="btn btn-success btn-lg" style="display: center;width:100%">Delete</button>
                   </form>
               </div>
               <?php	     
           }
       } 
       ?>    
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
<script type="text/javascript">var ount = "<?= $ount ?>";</script>
<script src="js/page1.js"></script>
<script src="js/freelancer.min.js"></script>
</body>
</html>