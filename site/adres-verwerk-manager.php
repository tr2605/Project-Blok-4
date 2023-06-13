<?php

require "database.php";

$omschrijving   = $_POST ['omschrijving'   ];
$straat         = $_POST ['straat'         ];
$huisnummer     = $_POST ['huisnummer'     ];
$postcode       = $_POST ['postcode'       ];
$plaats         = $_POST ['plaats'         ];
$land           = $_POST ['land'           ];
$telefoonnummer = $_POST ['telefoonnummer' ];
$mobielnummer   = $_POST ['mobielnummer'   ];
$notitie        = $_POST ['notitie'        ];
$toevoegdatum   = $_POST ['toevoegdatum'   ];

$sql = "INSERT INTO Adres (omschrijving, straat, huisnummer, postcode,
                           plaats, land, telefoonnummer, mobielnummer, notitie, toevoegdatum)
        VALUES ( '$omschrijving', '$straat', '$huisnummer','$postcode',
                '$plaats','$land','$telefoonnummer', '$mobielnummer','$notitie','$toevoegdatum')";

//  if($_SERVER['REQUEST METHOD'] != "POST"){
//      header($_SERVER["SERVER_PROTOCOL"] . " 405 Method Not Allowed", true, 405);
//      include '405.php';
//      exit;
// }

if(mysqli_query($conn, $sql))
    header("location: manager-dashboard.php");
else ?>
    <h2><?php echo "Er is iets mis gegaan, check of je alles (correct) hebt ingevuld."?></h2>