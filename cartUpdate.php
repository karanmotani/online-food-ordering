<?php

session_start();
$dbc = mysqli_connect('localhost','root','root','food');

if(!empty($_GET["action"])) {

    $query = "SELECT * FROM food_item WHERE item_id = '" . $_GET["code"] . "'";
    $result = mysqli_query($dbc, $query);
    while($row=mysqli_fetch_assoc($result)) {
        $resultset[] = $row;
    }
    $item_quantity = $resultset[0]["stock"];
    // echo $item_quantity;
    $productByCode = $resultset;
    $itemArray = array($productByCode[0]["item_id"]=>array('item_name'=>$productByCode[0]["item_name"], 'item_id'=>$productByCode[0]["item_id"], 'quantity'=>$_GET["quantity"], 'price'=>$productByCode[0]["price"]));
    
    if(!empty($_SESSION["cart_item"])) {
        $xxx=0;
        foreach($_SESSION["cart_item"] as $k => $v) {
            if($productByCode[0]["item_id"] == $_SESSION["cart_item"][$k]["item_id"]) {
                $_SESSION["cart_item"][$k]["quantity"] = $_GET["quantity"];
                $xxx=1;
            }
        }
        
        if ($xxx==1) {
            $xxx=$xxx;
        } 

        else {
            $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
        }

    } 

    else {
        $_SESSION["cart_item"] = $itemArray;
    }

    $arr = array();
    $arr[0] = $productByCode[0]["price"];
    $arr[1] = $_GET["quantity"];

    echo json_encode($arr);
    return true;
}
?>