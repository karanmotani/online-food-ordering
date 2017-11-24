<?php
include "User.php";
session_start();
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

if(empty($_POST['password'])  	||
   empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['address'])     ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$password = strip_tags(htmlspecialchars($_POST["password"]));
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$address = strip_tags(htmlspecialchars($_POST['address']));

$query1 = "select * from user where email = '$email_address';";
$match1_e = mysqli_query($con,$query1) or die('MySQL query error');
$match2_e = mysqli_fetch_array($match1_e);

if ($match2_e)
{
    echo 'Email ID already exists';
    return false;
}
else
{
    $id = '';
    $roles = '';
    $md5pass = md5($password);
    $sql = "insert into user (fullname, email, phone, password) values ('$name','$email_address','$phone','$md5pass');";
    $result = mysqli_query($con,$sql) or die('MySQL query error');
    $sql = "insert into location (street, apt, city, state, country, zip) values ('$address','','Richardson','Texas','USA', '75080');";
    $result = mysqli_query($con,$sql) or die('MySQL query error');
    $result = mysqli_query($con, "SELECT max(id) FROM location");
    if($row = mysqli_fetch_array($result))
    {
        $locationid =$row['max(id)'];
    }
    $result1 = mysqli_query($con, "select id from user where email = '$email_address'");
    if($row = mysqli_fetch_array($result1))
    {
        $id =$row['id'];
    }
    $sql = "insert into location_mappings (location_id, user_id) values ('$locationid','$id');";
    $result = mysqli_query($con,$sql) or die("SQL failure");

    $sql = "select roles from user where id = '$id';";

    $result = mysqli_query($con,$sql);

    if($row = mysqli_fetch_array($result)) {
      $roles = $row['roles'];
    }


    $_SESSION['user'] = $name; 
    $_SESSION['roles'] = $row['roles']; 
    $_SESSION['email_id'] = $email_address;

    echo 'Registration successful, redirecting to the homepage.';
    return true;
}
mysqli_close($con);	
?>