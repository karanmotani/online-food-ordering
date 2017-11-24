<?php
session_start();
?>

<?php
$page_count = 8;
$total=0;
$ount = 0;

$lim = $_GET['page'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search=$_POST['search_food'];
    $cuisine=$_POST['search_food1'];
}
else {
    $search = $_SESSION['search'];
    $cuisine = $_SESSION['search1'];
    $category = $_SESSION['category'];
}
if ($lim == null)
    $lim = 0;
$ount = $_SESSION['ount'];

?>

<?php
$page_count = 8;
$item_search=$_POST['search_food'];
$dbc = mysqli_connect('localhost','root','root','food');
$total=0;

    if(mysqli_connect_errno())
    {
            echo "not connected:" . mysqli_connect_errno();
    }	    
    if ($_GET['cuisines']){
        $category=$_GET['cuisines'];
    }
    else{
        $category=$_SESSION['category'];
    }
    // $cuisines=$category;
	$query_items="SELECT food_item.item_id, item_name, description, stock,image FROM food_item 
	INNER JOIN category ON food_item.item_id=category.item_id 
	and category.type='$category' and (stock>=1 and status='a') limit  " . $lim . ", 13";
    
    $query1 = "SELECT food_item.item_id, item_name, description, stock,image FROM food_item 
    INNER JOIN category ON food_item.item_id=category.item_id 
    and category.type='$category' and (stock>=1 and status='a')";
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

            <!-- <div class="row">
                <div class="col-lg-12 text-center">
                    <h2><?php echo $_GET['cuisines']; ?></h2>
                    <hr class="star-primary">
                </div>
            </div> -->


            <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2><?php echo $_GET['cuisines']; ?></h2>
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
                $numberResults = mysqli_query($dbc,$query1);
                $ount = (ceil(mysqli_num_rows($numberResults)));

                $_SESSION['ount'] = $ount;
                $_SESSION['search']=$search;
                $_SESSION['search1']=$cuisine;
                $_SESSION['category']=$category;
                

			    if(mysqli_num_rows($all_items))
		        { // if one or more rows are returned do following             
                    while($r = mysqli_fetch_assoc($all_items))
			        {
                        $item_id=$r['item_id'];
                        $item_name=$r['item_name'];
				        $item_desc=$r['description'];
                        $item_stock=$r['stock'];
                        $item_image=$r['image'];

                        $image = base64_encode($item_image);
                        $dispImg = "<img src='data:image/jpg;base64,{$image}' style='width:360px;height:240px;' class='img-responsive' alt=''>";
			?>	
				<div class="col-sm-4 portfolio-item">
				<form method="post" action="cart.php?action=add&code=<?php echo $item_id; ?>">
                    <!-- <img src="img/<?php echo $item_name ?>.jpg" style='width:360px;height:240px;' class="img-responsive" alt=""></br> -->
                    <?php echo $dispImg; ?><br />
                    
                    <center><button type="submit" class="btn btn-success btn-lg" style="display: center;"><i class="fa fa-plus" aria-hidden="true"></i></button>
					<span>
                        <?php echo $item_desc ?> &nbsp; 
                        <strong>
                            Quantity:&nbsp;
                        </strong>
                    </span>
                    <!-- <input class="box"type="text" name="quantity" value="1" size="2" /> -->
                
                    <select name="quantity">
                        <?php
                            $cpp = 1;
                            while($item_stock!=0) {
                        ?>
                                <option value="<?php echo($cpp);?>"><?php echo($cpp);?></option>
                        <?php
                                $cpp += 1;
                                $item_stock -= 1;
                            }
                        ?>
                    </select>
                </center>

				</form>
				</div>                
			<?php	     
			        }
                } 
		    ?>   
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
    <script type="text/javascript">var ount = "<?= $ount ?>";</script>
    <script src="js/page1.js"></script>
	<script src="js/freelancer.min.js"></script>
</body>
</html>