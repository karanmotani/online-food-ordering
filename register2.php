<?php 

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

if($_SERVER["REQUEST_METHOD"] == "POST") {
	$email = $_POST["email"];

	$query = "select * 
			from user 
			where email = '$email';";

	// $result = mysqli_query($con,$sql) or die('MySQL query error'); 

	$match1_e = mysqli_query($con,$query) or die('MySQL query error');
	$match2_e = mysqli_fetch_array($match1_e);

	if ($match2_e)
	{
	    // echo 'Email address exists, please use a different Email address to register. ';
	    echo 'Email ID already exists';
	    return true;
	}
	// else {
	// 	// return false;
	// }

}

?>