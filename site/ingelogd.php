<?php
    require 'database.php';
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
        $_SESSION['adminID']       = $users['adminID'];
        $_SESSION['managerID']       = $users['managerID'];
        $_SESSION['regularID']       = $users['regularID'];
   
        $_SESSION['ID']   = $users['ID'];
    
        if (!is_null($users['adminID'])) {
            header("Location: admin-dashboard.php");
            exit;
        }
    
        if (!is_null($users['managerID'])) {
            header("Location: manager-dashboard.php");
            exit;
        }
    
        if (!is_null($users['regularID'])) {
            header("Location: klant-dashboard.php");
            exit;
        }
    
    }
    else{
        echo" Verkeerde passwoord of email";
    }
?>
