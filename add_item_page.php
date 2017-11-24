<?php

$add_item_name=$_POST['item_name_update'];
$price=$_POST['price'];
$item_desc=$_POST['item_desc'];
$type=$_POST['type'];
$stock=$_POST['stock'];
$status="a";
$check=getimagesize($_FILES['image']['tmp_name']);
if($check!=False){
  $image=$_FILES['image']['tmp_name'];
  $imgContent = addslashes(file_get_contents($image));  
}

$total=0;
    $dbc = mysqli_connect('localhost','root','root','food');
    if(mysqli_connect_errno())
    {
            echo "not connected:" . mysqli_connect_errno();
    }
	
	$query_add="INSERT INTO food.food_item (item_name, price, description, stock, status, image)
                 	VALUES ('$add_item_name', '$price', '$item_desc', '$stock', '$status','$imgContent')";
    $add = mysqli_query($dbc,$query_add);

	$query_get_item_id="Select item_id from food.food_item where item_name='$add_item_name'";
    $get_item_id = mysqli_query($dbc,$query_get_item_id);

    if(mysqli_num_rows($get_item_id))
		{ // if one or more rows are returned do following
            while($r = mysqli_fetch_assoc($get_item_id))
			{
                $new_item_get_id=$r['item_id'];
			}
        }       

	$query_add_category="INSERT INTO food.category (item_id, type)
                 	     VALUES ('$new_item_get_id', '$type')";
					
    $add_category = mysqli_query($dbc,$query_add_category);
    // window.location.href='edit_food.php#add_item';
	echo "<script>
          alert('$add_item_name successfully added');
          window.location.href='all_items.php';
          </script>";

?>