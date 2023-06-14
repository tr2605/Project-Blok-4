<?php   
session_start();
if(!isset($_SESSION['isIngelogd'])){
    header("location: hoofdpagina.php");
    exit;}
    if (!isset($_SESSION['regularID']) || empty($_SESSION['regularID'])) {
        // User is not logged in as an admin, redirect to inloggen.php
        header("Location: inloggen.php");}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>regular page</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time();?>">
</head>
<body>
<?php include('nav-klant.php')?>
<a class="home" href="logout.php">logout</a><br>
<a class="home" href="overzicht-adressen-regular.php">overzicht adressen</a>
</body>
</html>