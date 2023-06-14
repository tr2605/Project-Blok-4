<?php
session_start();
if(!isset($_SESSION['isIngelogd'])){
    header("location: hoofdpagina.php");
    exit;}
    if (!isset($_SESSION['managerID']) || empty($_SESSION['managerID'])) {
        // User is not logged in as an admin, redirect to inloggen.php
        header("Location: inloggen.php");}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager page</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time();?>">
</head>
<body>
<?php include('nav-manager.php')?>
<a class="home" href="logout.php">logout</a><br>
<a class="home" href="overzicht-adressen-manager.php">overzicht adressen</a>
</html>