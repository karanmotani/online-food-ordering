<?php 
session_start();
?>

<?php
    $item_name_up=$_POST['item_name_update'];
    $item_price_up=$_POST['price'];
	$item_desc_up=$_POST['item_desc'];
	$item_type_up=$_POST['choose_type'];
	$item_stock_up=$_POST['stock'];
	// $item_image_up=$_POST['image'];
	$check=getimagesize($_FILES['image']['tmp_name']);
	if($check!=False){
	  $image=$_FILES['image']['tmp_name'];
	  $imgContent = addslashes(file_get_contents($image));  
	}

	if(is_null($imgContent))
		$flag = true;
	else
		$flag = false;

	$id=$_SESSION["sess_item_id_for_update"];
	
	$dbc = mysqli_connect('localhost','root','root','food');

	if(mysqli_connect_errno())
    {
            echo "not connected:" . mysqli_connect_errno();
    }

    if ($flag == true) {
    $query_up="UPDATE food.food_item SET item_name='$item_name_up', price='$item_price_up', 
	            description='$item_desc_up', stock='$item_stock_up'
				WHERE item_id=$id";
    }

    else {
	$query_up="UPDATE food.food_item SET item_name='$item_name_up', price='$item_price_up', 
	            description='$item_desc_up', stock='$item_stock_up', image='$imgContent'
				WHERE item_id=$id";
	}
    $up_value = mysqli_query($dbc,$query_up);
	$query_up_category="UPDATE food.category SET type='$item_type_up' 
	                     WHERE item_id=$id";
    $add_category = mysqli_query($dbc,$query_up_category);    
	echo "<script>
          alert('$item_name_up successfully updated');
          window.location.href='stock.php';
          </script>";
?>