<?php
session_start();
if(!isset($_SESSION['isIngelogd'])){
    header("location: hoofdpagina.php");
    exit;
}


if($_SESSION['role'] != 'administrator'){
    header("location: hoofdpagina.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time();?>">

</head>
<body>
<?php include('nav.php')?>
<br>
maak account aan <a href="registratie.php">account aanmaken</a>
<br>
<a class="home" href="logout.php">logout</a>
<br>
<a class="home" href="overzicht-medewerkers.php">overzicht</a>
</body>
</html>