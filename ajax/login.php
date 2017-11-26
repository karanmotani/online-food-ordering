<?php
session_start(); 
$action = $_GET['action']; 
if ($action == 'login') { 
    $email = stripslashes(trim($_POST['email'])); 
    $password = stripslashes(trim($_POST['password'])); 
    if (empty ($email)) { 
        $arr['success'] = 0; 
        $arr['msg'] = 'Email cannot be blank.  Redirecting to home page!';  
        echo json_encode($arr);
        exit; 
    } 
    if (empty ($password)) { 
        $arr['success'] = 0; 
        $arr['msg'] = 'Password cannot be blank.  Redirecting to home page!';  
        echo json_encode($arr);
        exit; 
    } 
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "root";
    $dbname = "food";
    $con = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
    if (!$con)
    {
        $arr['success'] = 0; 
        $arr['msg'] = 'Connection failure.  Redirecting to home page!';  
        echo json_encode($arr);
        exit;
    }
    $md5pass = md5($password);
    $result = mysqli_query($con, "select fullname, password, roles from user where email='$email'");
    if($result->num_rows == 0) 
    {
        $arr['success'] = 0; 
        $arr['msg'] = "User not found. Redirecting to home page!";  
        echo json_encode($arr);
        exit;
    }
    $userData = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if($md5pass != $userData['password'])
    {
        $arr['success'] = 0; 
        $arr['msg'] = 'Incorrect password. Redirecting to home page!'; 
    }
    else { 
        $_SESSION['user'] = $userData['fullname']; 
        $_SESSION['roles'] = $userData['roles'];
        $_SESSION['userEmail'] = $email;  
        
            $arr['success'] = 1; 
            $arr['msg'] = $userData['roles']; 
            $arr['user'] = $_SESSION['user']; 
    }
    echo json_encode($arr); 
} 
elseif ($action == 'logout') {
    unset($_SESSION); 
    session_destroy(); 
    echo '1';
}
?>
