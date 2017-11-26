<?php
include "User.php";
session_start();
$userEmail = $_SESSION["userEmail"];
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

// if(empty($_POST['password'])  	||
//    empty($_POST['name'])  		||
//    // empty($_POST['email']) 		||
//    empty($_POST['phone']) 		||
//    empty($_POST['address'])     ||
 //   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
 //   {
	// echo "No arguments Provided!";
	// return false;
 //   }
	
$password = strip_tags(htmlspecialchars($_POST["password"]));
$name = strip_tags(htmlspecialchars($_POST['name']));
// $email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$address = strip_tags(htmlspecialchars($_POST['address']));

// $query1 = "select * from user where email = '$email_address';";
// $match1_e = mysqli_query($con,$query1) or die('MySQL query error');
// $match2_e = mysqli_fetch_array($match1_e);

// if ($match2_e)
// {
//     echo 'Email ID already exists';
//     return false;
// }
// else

    // echo '<script type="text/javascript">alert("'. $userEmail . $name . $phone . $address . $password .'");</script>';

    $md5pass = md5($password);
    $sql = "UPDATE user set fullname=\"$name\", phone=\"$phone\", password=\"$md5pass\"
            WHERE EMAIL = \"$userEmail\";";
    $result = mysqli_query($con,$sql) or die('MySQL query error');

    $query = "  SELECT * 
            FROM user
            WHERE EMAIL=\"$userEmail\";";

    // echo '<script type="text/javascript">alert("'. $userEmail .'");</script>';

    $result11 = mysqli_query($con, $query) or die('MySQL query error');
    $r = mysqli_fetch_array($result11);
    

    $sql = "UPDATE location set street = \"$address\" where ID =".$r['ID'];
    $result = mysqli_query($con,$sql) or die('MySQL query error');

    $_SESSION['user'] = $name; 

    echo 'Update successful, redirecting to the homepage.';
    return true;
mysqli_close($con);	
?>