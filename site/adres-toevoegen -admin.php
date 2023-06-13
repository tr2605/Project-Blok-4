<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adress toevoegen</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time();?>">

</head>

<body>
    <div class="container">
<h2>voeg een adres toe</h2>

<form action="adres-verwerk-admin.php" method="post">
    <div class="form-group">
        <label for="omschrijving">omschrijving</label>
        <input type="text" name="omschrijving" id="omschrijving">
    </div>
    <div class="form-group">
        <label for="straat">straat</label>
        <input type="text" name="straat" id="straat">
    </div>
    <div class="form-group">
        <label for="huisnummer">huisnummer</label>
        <input type="text" name="huisnummer" id="huisnummer">
    </div>
    <div class="form-group">
        <label for="postcode">postcode</label>
        <input type="text" name="postcode" id="postcode">
    </div>
    <div class="form-group">
        <label for="plaats">plaats</label>
        <input type="text" name="plaats" id="plaats">
    </div>
    <div class="form-group">
        <label for="land">land</label>
        <input type="text" name="land" id="land">
    </div>
    <div class="form-group">
        <label for="telefoonnummer">telefoonnummer</label>
        <input type="text" name="telefoonnummer" id="telefoonnummer">
    </div>
    <div class="form-group">
        <label for="mobielnummer">mobielnummer</label>
        <input type="text" name="mobielnummer" id="mobielnummer">
    </div>
    <div class="form-group">
        <label for="notitie">notitie</label>
        <input type="text" name="notitie" id="notitie">
    </div>
    <div class="form-group">
        <label for="toevoegdatum">toevoegdatum</label>
        <input type="text" name="toevoegdatum" id="toevoegdatum">
    </div>
    <button type="submit">Verzend</button>
</div>
</form> 
</body>
</html>