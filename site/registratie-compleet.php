<?php
require 'database.php';
$voornaam        = $_POST['voornaam'];
$tussenvoegsels   = $_POST['tussenvoegsels'];
$achternaam      = $_POST['achternaam'];
$geslacht        = $_POST['geslacht'];
$gebruikersnaam  = $_POST['username'];
$email           = $_POST['email'];
$wachtwoord      = $_POST['wachtwoord'];
$omschrijving   = $_POST['omschrijving'];
$straat         = $_POST['straat'];
$huisnummer     = $_POST['huisnummer'];
$postcode       = $_POST['postcode'];
$plaats         = $_POST['plaats'];
$land           = $_POST['land'];
$telefoonnummer = $_POST['telefoonnummer'];
$mobielnummer   = $_POST['mobielnummer'];
$toevoegdatum   = $_POST['toevoegdatum'];
$notitie        = $_POST['notitie'];
$role           = $_POST['role'];



//ifs of switch

//rol bekend?
//insert rol tabel
// $id = mysqli_insert_id($conn)


//insert users
$hashed_password = password_hash($wachtwoord, PASSWORD_DEFAULT);
// Assuming you have the role value stored in the $role variable

$sql = "";

if ($role == "Administrator") {

    $sql = "INSERT INTO Administrator (is_actief)
            VALUES (1)";
    mysqli_query($conn, $sql);
    $id_role = mysqli_insert_id($conn);

    

    $sql = "INSERT INTO Adres(omschrijving, straat, huisnummer, postcode, plaats, land, telefoonnummer, mobielnummer, notitie, toevoegdatum)
            VALUES ('$omschrijving', '$straat', '$huisnummer', '$postcode', '$plaats', '$land', '$telefoonnummer', '$mobielnummer', '$notitie', '$toevoegdatum')";
    mysqli_query($conn, $sql);
    $adresID = mysqli_insert_id($conn);


    $sql = "INSERT INTO Users (voornaam, tussenvoegsels, achternaam, geslacht, gebruikersnaam, email, wachtwoord, adresID, adminID)
            VALUES ('$voornaam', '$tussenvoegsels', '$achternaam', '$geslacht', '$gebruikersnaam', '$email', '$hashed_password', $adresID, $id_role)";
    mysqli_query($conn, $sql);
    header('location: inloggen.php');
} elseif ($role == "Manager") {

    
    $sql .= "INSERT INTO Manager (aantal_mensen, afdeling) VALUES (1, 1)";
    mysqli_query($conn, $sql);
    $id_role = mysqli_insert_id($conn);

    $sql = "INSERT INTO Adres(omschrijving, straat, huisnummer, postcode, plaats, land, telefoonnummer, mobielnummer, notitie, toevoegdatum)
    VALUES ('$omschrijving', '$straat', '$huisnummer', '$postcode', '$plaats', '$land', '$telefoonnummer', '$mobielnummer', '$notitie', '$toevoegdatum')";
    mysqli_query($conn, $sql);
    $adresID = mysqli_insert_id($conn);


    $sql = "INSERT INTO Users (voornaam, tussenvoegsels, achternaam, geslacht, gebruikersnaam, email, wachtwoord, adresID, managerID)
    VALUES ('$voornaam', '$tussenvoegsels', '$achternaam', '$geslacht', '$gebruikersnaam', '$email', '$hashed_password', $adresID, $id_role)";
    mysqli_query($conn, $sql);
    header('location: inloggen.php');
} elseif ($role == "Regular") {
    "Set timezone = " . date_default_timezone_set("Europe/Amsterdam");
    $dateStamp = date("d-m-Y H:i:s");   

    //Insert logic for Regular table here
    $sql .= "INSERT INTO Regular (wanneer_gebruiker) VALUES ('$dateStamp')";
    mysqli_query($conn, $sql);
    $id_role = mysqli_insert_id($conn);

    $sql = "INSERT INTO Adres(omschrijving, straat, huisnummer, postcode, plaats, land, telefoonnummer, mobielnummer, notitie, toevoegdatum)
    VALUES ('$omschrijving', '$straat', '$huisnummer', '$postcode', '$plaats', '$land', '$telefoonnummer', '$mobielnummer', '$notitie', '$toevoegdatum')";
    mysqli_query($conn, $sql);
    $adresID = mysqli_insert_id($conn);



    $sql = "INSERT INTO Users (voornaam, tussenvoegsels, achternaam, geslacht, gebruikersnaam, email, wachtwoord, adresID, regularID)
    VALUES ('$voornaam', '$tussenvoegsels', '$achternaam', '$geslacht', '$gebruikersnaam', '$email', '$hashed_password', $adresID, $id_role)";
    mysqli_query($conn, $sql);
    header('location: inloggen.php');
} else {
    echo ('vul een rol in');
}

// $sql = "INSERT INTO Administrator(is_actief)
// VALUES('$is_actief')";

// $id_role = mysqli_insert_id($conn);



// $sql.="INSERT INTO Adres(omschrijving, straat, huisnummer, postcode, plaats, land, telefoonnummer, mobielnummer, notitie, toevoegdatum ) VALUES('$omschrijving', '$straat', '$huisnummer', '$postcode', '$plaats', '$land', '$telefoonnummer', '$mobielnummer', '$notitie', '$toevoegdatum')";
// $id_adres = mysqli_insert_id($conn);

// $sql .= "INSERT INTO Users (voornaam, tussenvoegsels, achternaam, geslacht,
//                     gebruikersnaam, email, wachtwoord, adresID, adminID )
//         VALUES ( '$voornaam', '$tussenvoegsels', '$achternaam','$geslacht',
//                 '$gebruikersnaam', '$email', '$hashed_password', $adres_id, $id_role)";


mysqli_close($conn);
