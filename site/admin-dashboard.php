<?php
session_start();
if(!isset($_SESSION['isIngelogd'])){
    header("location: hoofdpagina.php");
    exit;}
    if (!isset($_SESSION['adminID']) || empty($_SESSION['adminID'])) {
        // User is not logged in as an admin, redirect to inloggen.php
        header("Location: inloggen.php");}
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
<?php include('nav-admin.php')?>
<br>
<h1><script type="text/javascript" src="script.js"></script></h1>
<br><a class="home" href="registratie.php">account aanmaken</a>

<a class="home" href="logout.php">logout</a>
<br>
<a class="home" href="overzicht-medewerkers.php">overzicht werkers</a>
<a class="home" href="overzicht-adressen.php">overzicht adressen</a>
</body>
</html>