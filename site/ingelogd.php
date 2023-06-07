<?php
require'database.php';
if($_SERVER["REQUEST_METHOD"] !=="POST"){
    header($_SERVER["SERVER_PROTOCOL"] . " 405 Method Not Allowed", true, 405);
    
    include '405.php';
    exit;}
    
    $password = $_POST['wachtwoord'];
    $email = $_POST['email'];
    $sql = "SELECT * FROM Users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $users = mysqli_fetch_assoc($result);
    
    
    if(!is_array($users))
    {
        exit;
    }
    
    
    if(password_verify($password, $users['wachtwoord'])){
    
        session_start();
    
        $_SESSION['isIngelogd']     = true;
        $_SESSION['voornaam']       = $users['voornaam'];
        $_SESSION['role']           = $users['role'];
        $_SESSION['ID']   = $users['ID'];
    
        if($users['role'] == 'administrator'){
            header("location: admin-dashboard.php");
            exit;
        }
    
        if($users['role'] == 'manager'){
            header("location: manager-dashboard.php");
            exit;
        }
    
        if($user['role'] == 'regular'){
            header("location: klant-dashboard.php");
            exit;
        }
    
    }
?>
