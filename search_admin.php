<?php
session_start();
?>

<?php

$ount = 0;
// $search=$_POST['search_food'];
$lim = $_GET['page'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search=$_POST['search_food'];
    $cuisine=$_POST['search_food1'];
}
else {
    $search = $_SESSION['search'];
    $cuisine = $_SESSION['search1'];
}

if ($lim == null)
    $lim = 0;
$ount = $_SESSION['ount'];



$min_length = 0;
$dbc = mysqli_connect('localhost','root','root','food');
if(mysqli_connect_errno())
{
        echo "not connected:" . mysqli_connect_errno();
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

    <title>Hunger Station!</title>

	<link rel="icon" href="img/giphy.gif" />
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/freelancer.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
	<link href="css/my_css.css" rel="stylesheet">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script> 
    $(function()
	{
        //$("#header").load("admin_header.php"); 
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
                    <h2>Search Results</h2>
                    <hr class="star-primary">
                    <form id='pageForm'>
                        <input type='HIDDEN' id='page' value=<?php echo "'".$lim."'"; ?>>
                        <input type='button' class='btn btn-xs' onclick='previousPage()' value='Previous Page'>
                        <span id='itemCount'> </span>
                        <input type='button' id='nxtPage' class='btn btn-xs' onclick='nextPage()' value='Next Page'>
                        <hr />
                    </form>
                </div>
            </div>
            <div class="row">
<?php
  
    if(strlen($search) >= $min_length)
	{ // if query length is more or equal minimum length then
        $search = htmlspecialchars($search); 

        $query = "";
        if($search=="" && $cuisine=="") {
                $query="SELECT item_id,item_name, description,stock,image 
                FROM food_item limit  " . $lim . ", 12 ";
                
                $query1="SELECT item_id,item_name, description,stock,image
                FROM food_item ";
            }

            else if($search=="" && $cuisine!="") {
                $query="SELECT food_item.`item_id`, item_name, description,stock,image FROM food_item 
                INNER JOIN category ON food_item.`item_id`=category.`item_id`
                and category.`type`='$cuisine' limit  " . $lim . ", 12 ";
                
                $query1="SELECT food_item.`item_id`, item_name, description,stock,image FROM food_item 
                INNER JOIN category ON food_item.`item_id`=category.`item_id`
                and category.`type`='$cuisine'";
            }

            else if($search!="" && $cuisine=="") {
                $query="SELECT food_item.`item_id`, item_name, description,stock,image FROM food_item 
                WHERE ((`item_name` LIKE '%".$search."%') OR (`description` LIKE '%".$search."%')) 
                limit  " . $lim . ", 12 ";
                
                $query1="SELECT food_item.`item_id`, item_name, description,stock,image FROM food_item 
                WHERE ((`item_name` LIKE '%".$search."%') OR (`description` LIKE '%".$search."%'))";
            }

            else if($search!="" && $cuisine!="") {
                $query="SELECT food_item.`item_id`, item_name, description,stock,image FROM food_item 
                INNER JOIN category ON food_item.`item_id`=category.`item_id` 
                and category.`type`='$cuisine' 
                and ((`item_name` LIKE '%".$search."%') OR (`description` LIKE '%".$search."%')) 
                limit  " . $lim . ", 12 ";
                
                $query1="SELECT food_item.`item_id`, item_name, description,stock,image FROM food_item 
                INNER JOIN category ON food_item.`item_id`=category.`item_id` 
                and category.`type`='$cuisine'
                and ((`item_name` LIKE '%".$search."%') OR (`description` LIKE '%".$search."%'))";
            }

        // $query="SELECT item_name, description, image 
        //         FROM food_item 
        //         WHERE (`item_name` 
        //         LIKE '%".$search."%') OR (`description` LIKE '%".$search."%')" ;
		$search_results=mysqli_query($dbc,$query);
        $numberResults = mysqli_query($dbc,$query1);
        $ount = (ceil(mysqli_num_rows($numberResults)));

        $_SESSION['ount'] = $ount;
        $_SESSION['search']=$search;
        $_SESSION['search1']=$cuisine;
			   if(mysqli_num_rows($search_results))
		{ // if one or more rows are returned do following
            while($r = mysqli_fetch_assoc($search_results))
			{
                $item_name=$r['item_name'];
				$item_desc=$r['description'];

                $item_image=$r['image'];

                $image = base64_encode($item_image);
                $dispImg = "<img src='data:image/jpg;base64,{$image}' style='width:360px; height:240px; border-radius: 25px; border: 2px solid rgba(44, 62, 80, 0.5);' class='img-responsive' alt=''>";

			?>	
				<div class="col-sm-4 portfolio-item">
                    <!-- <img src="img/<?php echo $item_name ?>.jpg" style='width:360px;height:240px;' class="img-responsive" alt=""></br> -->
                    <?php echo $dispImg; ?><br />
                    <form method="POST" action="update_item_page.php"novalidate>
					<input class="textbox" name="item_desc_box" id="item_desc_box" type="text" readonly="true" value= "<?php echo $item_desc ?>" />
					<input class="itembox" name="item_name_box" size="2" id="item_name_box" type="text" readonly="true" value= "<?php echo $item_name ?>" />
				    <button type="submit" class="btn btn-success btn-lg" style="display: center;width:100%">UPDATE</button>
					</form>
					<form action="delete_item.php" method='POST'>
					<input class="itembox" name="item_name_box" id="item_name_box" type="text" readonly="true" value= "<?php echo $item_name ?>" />
				    <button type="submit" class="btn btn-success btn-lg" style="display: center;width:100%">DELETE</button>
					</form>
				</div>
				  <!--img src="img/'.$_SESSION["sess_power_animal"].'.jpeg" alt="">';-->
			<?php	     
			}
             
        }else
		{ // if there is no matching rows do following
            echo "No results";
        }
	}
		else
    { // if query length is less than minimum
        echo "Minimum length is ".$min_length;
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