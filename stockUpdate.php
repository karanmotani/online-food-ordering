<?php

	$dbc = mysqli_connect('localhost','root','root','food');
    if(mysqli_connect_errno())
    { 
       echo "not connected:" . mysqli_connect_errno();
    }

    $stockID = $_POST['stockID'];
    $stock = $_POST['stock'];


    $query="UPDATE food.food_item SET stock='$stock'
				WHERE item_id=$stockID";
	$result = mysqli_query($dbc, $query);

	$sql = "SELECT item_name
			FROM food_item
			WHERE item_id=$stockID";

	$result = mysqli_query($dbc, $sql);

	$r = mysqli_fetch_array($result);

	echo ($r['item_name']." Stock Updated to ".$stock);

?>