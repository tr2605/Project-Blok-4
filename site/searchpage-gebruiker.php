<?php

require 'database.php';
if(empty($_POST['zoekterm'])){
    header("location: admin-dashboard.php");
    exit;
}

$sql = "SELECT * FROM tools WHERE tool_name LIKE '%$zoekterm%'";
$result = mysqli_query($conn, $sql);
$zoeker = mysqli_fetch_assoc($result, MYSQLI_ASSOC);
if(!is_array($zoeker)){
    header("location: tools-overzicht.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>