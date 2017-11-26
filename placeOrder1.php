<?php 
	session_start();
	$totalPrice = $_POST['totalPrice'];
	$promoFlag = $_POST['promoFlag'];
	$_SESSION['totalPrice'] = $totalPrice;
	$_SESSION['promoFlag'] = $promoFlag;
?>