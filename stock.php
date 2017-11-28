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

$ount = $_SESSION['ount'];

$query_items="SELECT item_id,item_name,stock,description,image FROM food_item where status='a'";
$query1 = "SELECT item_id,item_name,stock,description,image FROM food_item where status='a'";
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

    <title>eAt It Or BeAt It!</title>

    <link rel="icon" href="img/giphy.gif" />
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/freelancer.min.css" rel="stylesheet">
    <link href="css/my_css.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

     <style>
        th, td {
                margin: 10px;
                padding: 8px;
                text-align: center;
                border-bottom: 1px solid #ddd;
                
            }
            table {
                border-collapse: collapse;
                width: 75%;
            }
    </style>

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
                <div class="text-center">
                    <h2>Inventory</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <!-- <br> -->

                <?php

                $numberResults = mysqli_query($dbc,$query1);
                $ount = (ceil(mysqli_num_rows($numberResults)));

                $_SESSION['ount'] = $ount;
                $_SESSION['search']=$search;
                $counterId = 0;
                if(mysqli_num_rows($all_items))
		{ // if one or more rows are returned do following
            ?> 
            <center>

            <table>
                <h3>Stock</h3>
                <!-- <img src="img/<?php echo $item_name ?>.jpg" class="img-responsive" alt=""></br> -->
                <!-- <img src="<?php $dispImg; ?>" class="img-responsive" alt=""></br> -->
                
               <!--  <tr>
                    <td>Sr No</td>
                    <td>Image</td>
                    <td>Name</td>
                    <td>Stock</td>
                    <td>Update</td>
                    <td>Delete</td>
                </tr> -->

            <?php
            while($r = mysqli_fetch_assoc($all_items))
            {
                $item_id=$r['item_id'];
                $item_name=$r['item_name'];
                $item_desc=$r['description'];
                $item_stck=$r['stock'];
                $item_image=$r['image'];

                $image = base64_encode($item_image);
                $dispImg = "<img src='data:image/jpg;base64,{$image}' style='width:65px; height:40px; border-radius: 50px; border: 2px solid rgba(44, 62, 80, 0.5);' class='img-responsive' alt=''>";

                ?>	
                
                    <tr>
                    <?php $counterId += 1;?>
                    <form method="POST" action="update_item_page.php" novalidate>
                        <td>
                            <input class="itembox" size ="1" name="item_name_box" id="item_name_box" type="text" readonly="true" value= "<?php echo $item_name; ?>" />

                            <input class="textbox" size="2" name="item_name_box1" id="item_name_box1" type="text" readonly="true" value= "<?php echo $counterId; ?>" />
                        </td>

                        <td>
                            <center><?php echo $dispImg;?></center>
                        </td>

                        <td>
                           <center><input class="textbox" size="25" name="item_desc_box" id="item_desc_box" type="text" readonly="true" value= "<?php echo $item_desc; ?>" /></center>
                       </td>

                       <td>
                           <center>
                            <input class="textbox nature" size="2" name="item_stock" id="<?php echo $item_id; ?>" type="text" value= "<?php echo $item_stck; ?>" style='border: 1px solid black; border-radius: 5px;' />
                            <sup><i class="fa fa-pencil-square-o" aria-hidden="true"></i></sup>
                          </center>
                       </td>

                       <td>
                       <button type='submit' class="btn btn-light btn-lg" style="display: center; border: none; border-radius: 10px;"><i class="glyphicon glyphicon-pencil"></i></button>
                       <!-- <button type="submit" class="btn btn-success btn-lg" style="display: center;width:100%">Update</button> -->
                        </td>
                    </form>
                   <form action="delete_item.php" method='POST'>
                       <input class="itembox" name="item_name_box" size="1" id="item_name_box" type="text" readonly="true" value= "<?php echo $item_name ?>" />
                       <td>
                        <button type="submit" class="btn btn-danger btn-lg" style="display: center;border-radius: 10px;"><i class="glyphicon glyphicon-remove"></i></button>
                       <!-- <button type="submit" class="btn btn-success btn-lg" style="display: center;width:100%">Delete</button>
 -->                   </td>
                   </form>
               </tr>
               
               <?php	     
           }
           ?>
           </table>
           </center>
           <?php
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
<script src="js/freelancer.min.js"></script>
<script type="text/javascript" src='js/stockUpdate.js'></script>
</body>
</html>