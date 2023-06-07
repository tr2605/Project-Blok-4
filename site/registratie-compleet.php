<?php
require 'database.php';
$voornaam        = $_POST ['voornaam'];
$tussenvoegsels   = $_POST ['tussenvoegsels'];
$achternaam      = $_POST ['achternaam'];
$geslacht        = $_POST ['geslacht'];
$gebruikersnaam  = $_POST ['username'];
$email           = $_POST ['email'];
$wachtwoord      = $_POST ['wachtwoord'];
$role            = $_POST ['role'];

$hashed_password = password_hash($wachtwoord, PASSWORD_DEFAULT);

$sql = "INSERT INTO Users (voornaam, tussenvoegsels, achternaam, geslacht,
                    gebruikersnaam, email, wachtwoord, role)
        VALUES ( '$voornaam', '$tussenvoegsels', '$achternaam','$geslacht',
                '$gebruikersnaam', '$email', '$hashed_password','$role')";
if (mysqli_multi_query($conn, $sql)) {
    //echo "Successfully added person"; 
    header("location: inloggen.php");
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
